var work_view_uuid;
var pk_works_main;
var mapModalEl;
var _user_view_uuid;
var _name;
var _userList;
var plugins_init_function = new Array();//接收显示时的init方法
var startscene;
$(function () {
    var href = window.location.href;
    work_view_uuid = href.substring(href.lastIndexOf("/") + 1);
    if(work_view_uuid.indexOf("?")!=-1){
        work_view_uuid = work_view_uuid.substring(0,work_view_uuid.indexOf("?"));
		startscene = getQueryString('scene');
    }

    if(getWorkPrivacyFlag()=='0'){
        initPano();
    }else{
        $("#privacyPwdModal").modal("show");
    }

    $("#qrCodeModal").modal('hide');

   

    _U.mapMarkModal({callback:function(data){
        $(mapModalEl).data("locationData",data);
    }});

    $(document).on('keydown', '#privacyPwd', function (event) {
        if (event.keyCode == 13) {
            $('#pwdConfirmBtn').click();
        }
        event.stopPropagation();
    });
    $(document).on('click', '#pwdConfirmBtn', function (event) {
        checkPrivacyPwd();
    });
});

function getQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}
//krpano loadcomplete调用
function showPanoBtns(sceneCount){
    if (sceneCount > 1) {
        $(".vrshow_container_3_min .img_desc_container_min:eq(0)").show();
    }else{
        $(".vrshow_container_3_min .img_desc_container_min:eq(0)").hide();
    }
    //$("#panoBtns").show();
}


function fullscreen(el){
    if($(el).hasClass('btn_fullscreen')){
        launchFullScreen(document.getElementById('fullscreenid'));
        var krpano = document.getElementById('krpanoSWFObject');
        krpano.call("skin_showthumbs(false);");
    }else{
        exitFullscreen();
    }
    toggleFullscreenBtn(el);
}

function launchFullScreen(element) {
    if(element.requestFullscreen) {
        element.requestFullscreen();
    } else if(element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
    } else if(element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
    } else if(element.msRequestFullscreen) {
        element.msRequestFullscreen();
    }
}

function exitFullscreen() {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    }
    else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    }
    else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
    }
    else if (document.msExitFullscreen) {
        document.msExitFullscreen();
    }
}

function toggleFullscreenBtn(el){
    if($(el).hasClass("btn_fullscreen")){
        $(el).removeClass("btn_fullscreen");
        $(el).addClass("btn_fullscreen_off");
    }else{
        $(el).removeClass("btn_fullscreen_off");
        $(el).addClass("btn_fullscreen");
    }
}

function toggleBtns(flag){
    if(flag){
        $("#panoBtns").show();
    }else{
        $("#panoBtns").hide();
        var krpano = document.getElementById('krpanoSWFObject');
        krpano.call('skin_showthumbs(false);');
    }
}

function showWebVR(){
    var krpano = document.getElementById('krpanoSWFObject');
    var webvr = krpano.get("webvr");
    webvr.entervr();
}



function showthumbs(){
    var krpano = document.getElementById('krpanoSWFObject');
    krpano.call("skin_showthumbs();");
}



function hidePictext() {
    $('#pictextModal').modal('hide');
    toggleBtns(true);
}

function showPictext(title,content) {
    toggleBtns(false);
    //var data = $("body").data("panoData");
    // $('#pictextWorkName').text('');
    // $('#pictextContent').text('');
    $('#pictextWorkName').text(title);
    $('#pictextContent').html(imgtext_decode(content));
    //$('#pictextContent').append(content);
    $('#pictextModal').modal("show");
}

//krpano调用 初始化高级设置
function initAdvancedSetting(sceneName){
    //initViewSetting(sceneName);
    initEffectSetting(sceneName);
    //initHotspotSetting(sceneName);
    initSandTableSetting(sceneName);
    initTourGuideSetting(sceneName);
	if(global_scenechoose == true){
		var krpano = document.getElementById('krpanoSWFObject');
		krpano.call('open_show_scene_thumb();');
	}
	$("#panoBtns").show();
	var krpano = document.getElementById('krpanoSWFObject');
	krpano.call('set(layer[skin_loadingtext].html,get:skin_settings.loadingtext);');
    //作者信息 TODO
    // initAuthourInfo(sceneName);
    //初始化视频热点
    var krpano = document.getElementById('krpanoSWFObject');
    init_video_tie(krpano,sceneName,video_tie_hotspot_data,false);
}

function initTourGuideSetting(sceneName){
    var krpano = document.getElementById('krpanoSWFObject');
    var tourGuideObj = $("body").data("panoData").tour_guide;
    if(tourGuideObj.points.length > 0){
        $('#panoBtns .vrshow_tour_btn').show();
    }else{
        $('#panoBtns .vrshow_tour_btn').hide();
    }
}

var lsTourGuideObj = null;
var is_tour_guide = false;
var tour_guide_current = 1;
function startTourGuide(){
    toggleBtns(false);
	is_tour_guide = true;
    $("#tour_btn_wrap").show();
    lsTourGuideObj = $("body").data("panoData").tour_guide;
    var krpano = document.getElementById('krpanoSWFObject');
    //krpano.call('showlog(true)');
    var curSceneName = krpano.get('xml.scene');
    var firstPoint = lsTourGuideObj.points[0];
    if(lsTourGuideObj.useStartImg){
        krpano.call('show_tour_guide_alert('+lsTourGuideObj.startImgUrl+');');
    }
    if(firstPoint.sceneName != curSceneName){
        krpano.call('loadscene('+firstPoint.sceneName+', null, MERGE);');
		setTimeout(function(){
            krpano.call('skin_showthumbs(false);');
        },500);
    }
    var curfov = krpano.get('view.fov');
    krpano.call('lookto('+firstPoint.ath+','+firstPoint.atv+','+curfov+',smooth(720,-720,720),true,true,js(looktoCallBack('+tour_guide_current+')));');
}

function looktoCallBack(idx){
	idx = parseInt(idx);
    tour_guid_msc_stop();
    tour_guide_current =idx;
    var krpano = document.getElementById('krpanoSWFObject');
    if(idx < lsTourGuideObj.points.length){
        var pointObj = lsTourGuideObj.points[idx];
		if (pointObj.musicSrc) {
            tour_guid_msc_play(pointObj.musicSrc);
        }
        var curSceneName = krpano.get('xml.scene');
        var curfov = krpano.get('view.fov');
        if(pointObj.sceneName != curSceneName){
            krpano.call('loadscene('+pointObj.sceneName+', null, MERGE);');
			setTimeout(function(){
                krpano.call('skin_showthumbs(false);');
            },500);
            krpano.call('lookto('+pointObj.ath+','+pointObj.atv+','+curfov+',smooth(720,-720,720),true,true,js(looktoCallBack('+(idx+1)+')));');
        }else{
            krpano.call('lookto('+pointObj.ath+','+pointObj.atv+','+curfov+',tween(easeInOutQuad,'+parseInt(pointObj.moveTime)+'),true,true,js(looktoCallBack('+(idx+1)+')));');
        }
    }else{
		tour_guid_stop();
    }
}
function tour_guid_pause(obj){
    var krpano = document.getElementById('krpanoSWFObject');
    if (is_tour_guide) {
         is_tour_guide = false;
         $(obj).html('播放');
         krpano.call('stoplookto();');
        tour_guid_msc_toggle();

    }else{
        is_tour_guide = true;
        $(obj).html('暂停');
        var pointObj = lsTourGuideObj.points[tour_guide_current-1];
        var curfov = krpano.get('view.fov');
        krpano.call('lookto('+pointObj.ath+','+pointObj.atv+','+curfov+',smooth(720,-720,720),true,true,js(looktoCallBack('+tour_guide_current+')));');
    }
}

function tour_guid_stop(){
    var krpano = document.getElementById('krpanoSWFObject');
    krpano.call('stoplookto();');
    if(lsTourGuideObj.useEndImg){
        krpano.call('show_tour_guide_alert('+lsTourGuideObj.endImgUrl+');');
    }
    tour_guide_current = 1;
    $("#tour_btn_wrap").hide();
    toggleBtns(true);
    tour_guid_msc_toggle();

}

function tour_guid_msc_play(src){
    var audio = document.getElementById('guide_audio');
    if (audio) {
        audio.pause();
        audio.parentNode.removeChild(audio);
    }
    audio = document.createElement('audio');
    audio.id = 'guide_audio';
    audio.src = src;
    audio.autoplay = true;
    document.getElementById("tour_guide_audio_wrap").appendChild(audio);
}

function tour_guid_msc_toggle(status){
    var audio = document.getElementById('guide_audio');
    if (audio) {
        if (status == 'play') {
            audio.play();
        }else{
            audio.pause();
        }
    }
}
function tour_guid_msc_stop(){
    var audio = document.getElementById('guide_audio');
    if (audio) {
        audio.pause();
        audio.parentNode.removeChild(audio);
    }
}

function initSandTableSetting(sceneName){
    var krpano = document.getElementById('krpanoSWFObject');
    var sandTableObj = $("body").data("panoData").sand_table;
    var existFlag = false;
    $(sandTableObj.sandTables).each(function(idx){
        if(this.sceneOpt[sceneName]){
            //设置背景图片
            krpano.set("layer[map].url",this.imgPath);
            $.each(this.sceneOpt,function(sceneName,value){
                var spotName = 'spot_'+sceneName;
                addRadarSpot(spotName,value.krpLeft,value.krpTop);
            });
            var hlookatIncre = krpano.get('view.hlookat') - this.sceneOpt[sceneName].hlookat;
            krpano.call('activatespot('+(parseFloat(this.sceneOpt[sceneName].rotate)+parseFloat(hlookatIncre))+');');
            existFlag = true;
            return false;
        }
    });
    if(!existFlag){
        $('.vrshow_radar_btn').hide();
        krpano.set('layer[mapcontainer].visible',false);
    }else{
        $('.vrshow_radar_btn').show();
        if(sandTableObj.isOpen=='1'){
            krpano.set('layer[mapcontainer].visible',true);
        }
    }
}

function toggleKrpSandTable(){
    var krpano = document.getElementById('krpanoSWFObject');
    var isVisible = krpano.get('layer[mapcontainer].visible');
    if(isVisible){
        krpano.set('layer[mapcontainer].visible',false);
    }else{
        krpano.set('layer[mapcontainer].visible',true);
    }
}

function addRadarSpot(name,x,y){
    //console.log(x+','+y);
    var krpano = document.getElementById('krpanoSWFObject');
    krpano.call('addlayer('+name+');');
    krpano.set('layer['+name+'].style','spot');
    krpano.set('layer['+name+'].x',x);
    krpano.set('layer['+name+'].y',y);
    krpano.set('layer['+name+'].parent','radarmask');
    krpano.call('layer['+name+'].loadstyle(spot);');
    //krpano.set('layer['+name+'].keep','true');
    //krpano.set('layer['+name+'].visible','true');
}

function initHotspotSetting(sceneName){
    var krpano = document.getElementById('krpanoSWFObject');
	total_data=$("body").data("panoData").hotspot;
    var hotspotObj = ($("body").data("panoData").hotspot)[sceneName];
    if(hotspotObj){
        $.each(hotspotObj,function(key,value){
            if(key == 'scene'){
                $(value).each(function(idx){
					if(this.iconType=="polygon"){
                        setPolygonParams(this,key,true);
                        createPolygonHotSpot(krpano,this,false);
                    }
                    else{
                    	krpano.call('addSceneChangeHotSpot("'+this.imgPath+'","'+ (this.name) +'",'+this.linkedscene+','+(this.ath)+','+(this.atv)+','+this.isDynamic+',false,true)');
					}
                });
            }else if(key == 'link'){
                $(value).each(function(idx){
				if(this.iconType=="polygon"){
                        try{
                            setPolygonParams(this,key,true);
                            createPolygonHotSpot(krpano,this,false);
                        }
                        catch(e){
                            console.log(e);
                            // alert(e);
                        }
                    }
                    else{
                    	krpano.call('addLinkHotSpot("'+this.imgPath+'","'+ (this.name) +'",'+html_encode(this.hotspotTitle)+','+(this.ath)+','+(this.atv)+','+this.isDynamic+',false,true,'+this.link+','+this.isShowSpotName+')');
					}
                });
            }else if(key == 'image'){
                $(value).each(function(idx){
					if(this.iconType=="polygon"){
                        setPolygonParams(this,key,true);
                        createPolygonHotSpot(krpano,this,false);
                    }
                    else{
                    	krpano.call('addImgHotSpot("'+this.imgPath+'","'+ (this.name) +'",'+html_encode(this.hotspotTitle)+','+(this.ath)+','+(this.atv)+','+this.isDynamic+',false,true,'+this.galleryName+','+this.isShowSpotName+')');
					}
                });
            }else if(key == 'text'){
                $(value).each(function(idx){
					if(this.iconType=="polygon"){
                        setPolygonParams(this,key,true);
                        createPolygonHotSpot(krpano,this,false);
                    }
                    else{
                    	krpano.call('addWordHotSpot("'+this.imgPath+'","'+ (this.name) +'",'+html_encode(this.hotspotTitle)+','+(this.ath)+','+(this.atv)+','+this.isDynamic+',false,true,'+html_encode(this.wordContent)+','+this.isShowSpotName+')');
					}
                });
            }else if(key == 'voice'){
                $(value).each(function(idx){
					if(this.iconType=="polygon"){
                        setPolygonParams(this,key,true);
                        createPolygonHotSpot(krpano,this,false);
                    }
                    else{
                    	krpano.call('addVoiceHotSpot("'+this.imgPath+'","'+ (this.name) +'",'+html_encode(this.hotspotTitle)+','+(this.ath)+','+(this.atv)+','+this.isDynamic+',false,true,'+this.musicSrc+','+this.isShowSpotName+')');
					}
                });
            }else if(key == 'around'){
                $(value).each(function(idx){
					if(this.iconType=="polygon"){
                        setPolygonParams(this,key,true);
                        createPolygonHotSpot(krpano,this,false);
                    }
                    else{
                    	krpano.call('addAroundHotSpot("'+this.imgPath+'","'+ (this.name) +'",'+html_encode(this.hotspotTitle)+','+(this.ath)+','+(this.atv)+','+this.isDynamic+',false,true,'+this.aroundPath+','+this.fileCount+','+this.isShowSpotName+')');
					}
                });
            }else if(key == 'imgtext'){
                $(value).each(function(idx){
					if(this.iconType=="polygon"){
                        setPolygonParams(this,key,true);
                        createPolygonHotSpot(krpano,this,false);
                    }
                    else{
                    	krpano.call('addImgTextHotSpot("'+this.imgPath+'","'+ (this.name) +'",'+html_encode(this.hotspotTitle)+','+(this.ath)+','+(this.atv)+','+this.isDynamic+',false,true,'+imgtext_encode(this.imgtext_wordContent)+','+this.isShowSpotName+')');
					}
                });
            }else if(key == 'obj'){
                $(value).each(function(idx){
					if(this.iconType=="polygon"){
                        setPolygonParams(this,key,true);
                        createPolygonHotSpot(krpano,this,false);
                    }
                    else{
                        krpano.call('addObjHotSpot("'+this.imgPath+'","'+ (this.name) +'",'+html_encode(this.hotspotTitle)+','+(this.ath)+','+(this.atv)+','+this.isDynamic+',false,true,'+this.objid+','+this.isShowSpotName+','+(this.type)+')');
					}
                });
            }else if(key == 'video'){
                $(value).each(function(idx){
					if(this.iconType=="polygon"){
                        setPolygonParams(this,key,true);
                        createPolygonHotSpot(krpano,this,false);
                    }
                    else{
                    	krpano.call('addVideoHotSpot("'+this.imgPath+'","'+ (this.name) +'",'+html_encode(this.hotspotTitle)+','+(this.ath)+','+(this.atv)+','+this.isDynamic+',false,true,'+this.location+','+this.isShowSpotName+')');
					}
                });
            }else if(key == 'redpack'){
                $(value).each(function(idx){
				if(this.iconType=="polygon"){
                        setPolygonParams(this,key,true);
                        createPolygonHotSpot(krpano,this,false);
                    }
                    else{
                    	krpano.call('addRedpackHotSpot("'+this.imgPath+'","'+ (this.name) +'",'+html_encode(this.hotspotTitle)+','+(this.ath)+','+(this.atv)+','+this.isDynamic+',false,true,'+this.rpid+','+this.isShowSpotName+')');
                    }
		});
            }
        });
    }
}

function initEffectSetting(sceneName){
    var krpano = document.getElementById('krpanoSWFObject');
    var effectObj = null;
    var effectData = $("body").data("panoData").special_effects;
    $(effectData.effectSettings).each(function(idx){
        if(this.sceneName == sceneName){
            effectObj = this;
            return false;
        }
    });
    if(effectObj){
        if(effectObj.isOpen){
            if(effectObj.effectType == 'sunshine'){
                krpano.call('addLensflares('+effectObj.ath+','+effectObj.atv+')');
            }
			else{
                krpano.call('addEffect("'+effectObj.effectType+'","'+effectObj.effectImgPath+'")');
            }
        }
    }
}

function littlePlaneOpen(sceneName){
    var krpano = document.getElementById('krpanoSWFObject');
    var lookatObj = null;
    var angleData = $("body").data("panoData").angle_of_view;
    $(angleData.viewSettings).each(function(idx){
        if(this.sceneName == sceneName){
            lookatObj = this;
            return false;
        }
    });
    if(lookatObj){
        krpano.set('view.vlookat',lookatObj.vlookat);
        krpano.set('view.hlookat',lookatObj.hlookat);
        krpano.set('view.fov',lookatObj.fov);
        krpano.set('view.fovmax',lookatObj.fovmax);
        if(lookatObj.hlookatmin){
            krpano.set('view.hlookatmin',lookatObj.hlookatmin);
        }
        if(lookatObj.hlookatmax){
            krpano.set('view.hlookatmax',lookatObj.hlookatmax);
        }
        krpano.call('skin_setup_littleplanetintro('+lookatObj.fovmin+','+(-1*lookatObj.vlookatmax)+','+(-1*lookatObj.vlookatmin)+','+(lookatObj.keepView=='1' ? "off" : "0.0")+');');
    }else{
        krpano.call('skin_setup_littleplanetintro(5,-90,90,"0.0");');
    }
}

//场景载入时加载视角设置
function initViewSetting(sceneName){
    var krpano = document.getElementById('krpanoSWFObject');
    var lookatObj = null;
    var angleData = $("body").data("panoData").angle_of_view;
    $(angleData.viewSettings).each(function(idx){
        if(this.sceneName == sceneName){
            lookatObj = this;
            return false;
        }
    });
    if(lookatObj){
        krpano.set('view.vlookat',lookatObj.vlookat);
        krpano.set('view.hlookat',lookatObj.hlookat);
        krpano.set('view.fov',lookatObj.fov);
        krpano.set('view.fovmin',lookatObj.fovmin);
        krpano.set('view.fovmax',lookatObj.fovmax);
        krpano.set('view.vlookatmin',-1*lookatObj.vlookatmax);
        krpano.set('view.vlookatmax',-1*lookatObj.vlookatmin);
        krpano.set('autorotate.horizon',lookatObj.keepView=='1' ? "off" : "0.0");
        if(lookatObj.hlookatmin){
            krpano.set('view.hlookatmin',lookatObj.hlookatmin);
        }
        if(lookatObj.hlookatmax){
            krpano.set('view.hlookatmax',lookatObj.hlookatmax);
        }
    }
}

function loadGallery(){
    var krpano = document.getElementById('krpanoSWFObject');
    var hotspotObj = $("body").data("panoData").hotspot;
    //var xmlStr = '';
    $.each(hotspotObj,function(sceneName,value){
        if(value){
            $(value.image).each(function(idx){
                var xmlStr = '<gallery name="'+this.galleryName+'" title="">';
                $(this.imgs).each(function(idx){
                    xmlStr += '<img name="img'+idx+'" url="'+this.src+'" title="" />';
                });
                xmlStr += '</gallery>';
                krpano.call('loadxml('+xmlStr+');');
            });
        }
    });
}

function reloadGallery(gallery){
	var krpano = document.getElementById('krpanoSWFObject');
	var ua = window.navigator.userAgent.toLowerCase();
	if(typeof(wx)!='undefined' && ua.match(/MicroMessenger/i) == 'micromessenger'){
		//整合gallery的图片到数组 
		var urls = new Array();
		for(var i=0; i<krpano.get('gallery['+gallery+'].img.count'); i++){
			urls.push(krpano.get('gallery['+gallery+'].img['+i+'].url'));
		}
		wx.previewImage({
			current: krpano.get('gallery['+gallery+'].img[0].url'), // 当前显示图片的http链接
			urls: urls // 需要预览的图片http链接列表
		});	
	}
	else{
		toggleBtns();
		krpano.call('show_gallery('+gallery+')');	
	}
}

function checkPrivacyPwd(){
    if(!$("#privacyPwd").val()){
        _U.toggleErrorMsg("#privacyPwd",'',true);
        return ;
    }
    var sb = _U.getSubmit("/ws/checkPrivacyPwd", null, "ajax", true);
    sb.pushData("view_uuid", work_view_uuid);
    sb.pushData("privacy_password", $("#privacyPwd").val());
    sb.submit(function () {
    }, function (data) {
        if(data.check_flag == true){
            $("#privacyPwdModal").modal("hide");
            initPano();
        } else {
            _U.toggleErrorMsg("#privacyPwd",'密码有误',true);
        }
    });
}

function getWorkPrivacyFlag(){
    var privacy_flag = '0';

    return privacy_flag;
}
//贴片数据
var video_tie_hotspot_data=null;
var global_scenechoose = false;
function initPano(){//TODO
    krpano_Id="krpanoSWFObject";
	
	
	$.post("/tour.php",{
        view_uuid:work_view_uuid,
        act:'initPano'
    }, function (data) {
        if(data.video_tie_hotspot=='' || data.video_tie_hotspot==null)  data.video_tie_hotspot = null;
        video_tie_hotspot_data=JSON.parse(data.video_tie_hotspot);
        data=data.pro;
        
        if(data.pk_works_main == undefined){
            window.location.href = '/404.html';
            return ;
        }
        //微信分享
        // initWxConfig(data);
        // initQQShare(data);
        //存储作者的信息
        // _user_view_uuid = data.user_view_uuid;
        _user_view_uuid = "admin";

        _name = data.name;
        document.title = _name;
        $("body").data("panoData",data);
        pk_works_main = data.pk_works_main;
        var settings = {};
        settings["events[skin_events].onloadcomplete"] = "skin_showloading(false);";
        settings["onstart"] = '';
        
        //是否开始时弹出场景选择
        if (data.scenechoose=='1') {
            //settings["events[skin_events].onloadcomplete"] += "open_show_scene_thumb();";
			global_scenechoose = true;
        }
       
        //统计人气
        if(data.browsing_num!='0'){
            $("#user_viewNum").text(parseInt(data.browsing_num)+1);
        }else{
            $("#user_viewNum").text("1");
        }
        //启动画面
        var loadingObj = data.loading_img;
        if (loadingObj && loadingObj.useLoading) {
            settings["onstart"] += "showloadingimg('" + loadingObj.loadingImgPathWebsite + "','" + loadingObj.loadingImgPathMobile + "');";
        }
        for(var i=0 ; i<plugins_init_function.length;i++){
             plugins_init_function[i](data,settings);
        }
        settings['skin_settings.littleplanetintro'] = data.littleplanet=="1" ? true : false;
        settings['autorotate.enabled'] = data.autorotate=="1" ? true : false;
        if (data.scene_group.sceneGroups.length>0) {
             $(".vrshow_container_3_min .img_desc_container_min:eq(0) img").attr('src',data.scene_group.sceneGroups[0].imgPath);
        }
        embedpano({
            swf: "/tour/tour.swf",
            xml: "/tour/tour.xml.php?view="+work_view_uuid+(startscene?"&startscene="+startscene:""),
            target: "pano",
            html5:'prefer',
            //flash:'only',
            wmode:'opaque-flash',
            mobilescale:0.7,
            vars: settings
        });
	
	},"JSON");
}

//krpano调用


function showFullscreenBtn(){
    $(".btn_fullscreen").show();
}



function radarRotate(sceneName,hlookat){

}

function openSpeechVoiceBtn(){
    var voiceOff = $('.btn_music_off');
    voiceOff.removeClass('btn_music_off');
    voiceOff.addClass('btn_music');
}
var player ;
function playvideo(url){
    toggleBtns(false);
    var krpano = document.getElementById('krpanoSWFObject');
    krpano.call("pausesoundtoggle(bgmusic);pausesoundtoggle(bgm);");
    
	$('body').append('<div class="modal" id="video_player_modal" data-backdrop="static" data-keyboard="false" style="z-index:2002">'+
            '<div class="modal-dialog">'+
                '<div class="modal-body" style="padding: 0">'+
                  '  <a href="javascript:;" onClick="close_video_player()" style="position:absolute;color:white;z-index:99999;right:5px;top: 3px;">关闭</a>'+
                  '  <div class="prism-player" id="J_prismPlayer" ></div>'+
               ' </div>'+
           ' </div>'+
       ' </div>');
   
   player = new Aliplayer({
      id: "J_prismPlayer", // 容器id
      source:url,
      autoplay: true,      // 自动播放
      width: "100%",       // 播放器宽度
      height: "400px"      // 播放器高度
    });
   $("#video_player_modal").modal('show');
}
function close_video_player(){
    player.pause();
	player = null;
    var krpano = document.getElementById('krpanoSWFObject');
    krpano.call("pausesoundtoggle(bgmusic);pausesoundtoggle(bgm);");
    toggleBtns(true);
    $("#video_player_modal").modal('hide');
    $("#video_player_modal").remove();
}
function setUrl(scene){
    var params="";
    var state="";
    var index=window.location.href.indexOf('?');
    if(index!=-1){
        //有参数
        var href=window.location.href;
       state = {title:'',url:href.split('?')[0]};
    }
    else{
        state = {title:'',url:window.location.href};
    }
    params="?";
    history.pushState(state,'',params+'scene='+scene);
	//重新实例化微信分享
	set_jssdk_params();
}

//支付相关
function showRwardModal(){
    var krpano = document.getElementById('krpanoSWFObject');
    krpano.call('skin_showthumbs(false);');
    //ajax判断用户是否微信授权
    $.post("/plugin/comment/weixin.php",{"act":"wxcomment","step":"check"},function(result){
        var data = eval('('+result+')');
        if (data.ret==0) {
            window.location.href="/plugin/comment/weixin.php?act=wxcomment&project="+work_view_uuid+"&scene="+krpano.get("xml.scene");
        }
        else{
            get_reward_lists(1);
            $('#rewardModal').modal('show');
        }
    });
}
function confirmReward(){
    var amount = $("#reward_amount").val();
    if (isNaN(amount)) {
        alert_notice('请输入数字金额');
        return false;
    }
    if(amount<0||amount>20000){
        alert_notice('请输入0到20000之间的金额');
        return false;
    }
            
    var pay_type = 'native';
    var ua = navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i)=="micromessenger"){
        pay_type = 'jsapi';
    }
    $.post('/module/payment/reward.php',{
        'amount':amount,
        'uid':pk_user_main,
        'pid':pk_works_main,
        'pay_type':pay_type
    },function(res){
        if (res.status==1) {
            //扫码支付
            if(pay_type=='native'){
                $('#rewardModal').modal('hide');
                showRewardQrCode(res.qrcode_url);
            }
            //公众号支付
            else{
                WeixinJSBridge.invoke(
                    'getBrandWCPayRequest',
                    $.parseJSON(res.jsApiParameters),
                    function(res){
                        if(res.err_code>0){
                            alert(res.err_code+res.err_desc+res.err_msg);
                        }
                        else{
                            $('#rewardModal').modal('hide');
                        }
                    }
                );
            }
        }else{
            alert_notice(res.msg);
        }
    },'json')
    
}
function showRewardQrCode(payUrl){
    $("#rewardQrCodeModal .modal-body img").attr('src',payUrl);
    $("#rewardQrCodeModal").modal('show');
}

//显示领取红包弹框
function show_redpack(rpid,rpname){
    //alert(rpid);
    var ua = navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i)!="micromessenger") {
        alert("请在微信中访问项目");
        return false;
    }
    $("#redpack_title").html(rpname);
    $("#redpack_view").modal('show');
    $("#btn_receive_redpack").unbind('click').click(function(){
        receive_redpack(rpid);
    });
}

//领取红包
function receive_redpack(rpid){   
    var krpano = document.getElementById('krpanoSWFObject');
    //ajax判断用户是否微信授权
    $.post("/plugin/comment/weixin.php",{"act":"wxcomment","step":"check"},function(data){
        if (data.ret==0) {
            window.location.href="/plugin/comment/weixin.php?act=wxcomment&project="+work_view_uuid+"&scene="+krpano.get("xml.scene");
        }else{
            $.post("/tour.php",{act:"receive_redpack",rpid:rpid},function(res){
                if(res.status==1){
                    alert(res.msg);
                    $("#redpack_view").modal('hide');
                    return;
                }
                else{
                    alert(res.msg);
                    $("#redpack_view").modal('hide');
                    return;
                }
            },"Json");
        }
    },"Json");  
}