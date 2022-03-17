
var obj_token = {};
var ringParams={};
$(function(){

	$('.update_div').on('shown.zui.tab', function(e) {
		$(".chosen-select").chosen({
			 no_results_text: "没有找到",
			 max_selected_options:3,
			 width:"100%"
		});
	});
	
$("#publish_ring").click(function(){
	$(".input-group").removeClass("has-error");
	// console.log(obj_uploader.files);
	ringParams.rname = $.trim($("#rname").val());
	ringParams.link = $.trim($("#link").val());
	ringParams.img_path = $.trim($("input[name='img_path']").val());
	if (ringParams.rname =="") {
		showerr("项目名称不能为空",$("#rname"));
		return false;
	}

	var files =  $('#FImgUpload').fileinput('getFileStack');
	if(files.length<=0){
		$('#FImgUpload').fileinput('_showError','请先上传封面');
		return false;
	}

	var files =  $('#BImgUpload').fileinput('getFileStack');
	if(files.length<=0){
		$('#BImgUpload').fileinput('_showError','请先上传背景');
		return false;
	}
	
	var files =  $('#objImgUpload').fileinput('getFileStack');
	if(files.length<=0){
		$('#objImgUpload').fileinput('_showError','请先上传文件');
		return false;
	}
	if(obj_uploader.files.length<=0){
		alert('请先上传obj文件');
		return false;
	}
	if(obj_uploader.files.length>1){
		alert('只能有一个obj文件');
		return false;
	}
	if(mtl_uploader.files.length<=0){
		alert('请先上传mtl文件');
		return false;
	}
	if(mtl_uploader.files.length>1){
		alert('只能有一个mtl文件');
		return false;
	}
	
	$(this).addClass("disabled");
	ringParams.imgs=new Array();
	obj_uploader.start();
})
	//720环物上传
 $("#objImgUpload").fileinput({
	    language: 'zh',
	    showUpload: false,
	    showRemove: false,
	    showCancel: false,
	    showUploadedThumbs:false,
	    maxFileCount: 50,
	    previewFileType: "image",
	    allowedFileExtensions: ["jpg","jpeg", "png"],
	    msgInvalidFileExtension: '不支持文件类型"{name}"。只支持扩展名为"{extensions}"的文件。',
	    browseClass: "btn btn-primary",
	    browseLabel: "选择本地模型贴图",
	    browseIcon: "<i class=\"icon icon-picture\"></i> ",
	    removeClass: "btn btn-danger",
	    removeLabel: "删除",
	    removeIcon: "<i class=\"icon icon-trash\"></i> ",
	    uploadUrl: up_url,
	    uploadAsync: true,
	    previewSettings: {
	        image: {width: "auto", height: "100px"}
	    },
	    fileActionSettings: {},
	    dropZoneTitle: "拖拽一组/单幅图片或点击下面按钮上传",
	    textEncoding: "UTF-8",
	   uploadExtraData: get_obj_token
	}).on('filepreajax',function(event,previewId,index){
		var files =  $('#objImgUpload').fileinput('getFileStack');
		//构造每次请求的key
		var extraData = $("#objImgUpload").fileinput('uploadExtraData');
		var name =files[index].name;
		extraData.key = obj_token.prefix+name;
		// $("#"+previewId).data("imgname",name);
		$("#"+previewId).data("imgsrc",extraData.key);

	}).on("fileuploaded",function(event, data, previewId, index){
		//单个上传成功，保存key
		var obj = {};
		// obj.index = index;
		// obj.filename = data.files[index].name;
		obj.imgsrc = $("#"+previewId).data("imgsrc");
		// console.log(obj);
		ringParams.imgs.push(obj);
	}).on("filebatchuploadcomplete",function(){
		//全部上传成功
		obj_token = {};
		doRingCommint();
		
	}).on('fileloaded', function(event, file, previewId, index, reader) {
		  var type = file.type;
        if (type!="image/jpeg"&&type!="image/png"){
        	$.zui.messager.show("请选择格式为jpg,png的图片", {placement: 'center', type: 'success', time: '3000', icon: 'check'});
            $("#imgUpload").fileinput("clear");
        }
	}); 


//720环物封面图
 $("#FImgUpload").fileinput({
	    language: 'zh',
	    showUpload: false,
	    showRemove: false,
	    showCancel: false,
	    showUploadedThumbs:false,
	    dropZoneEnabled:false,
	    maxFileCount: 1,
	    previewFileType: "image",
	    allowedFileExtensions: ["jpg","jpeg", "png"],
	    msgInvalidFileExtension: '不支持文件类型"{name}"。只支持扩展名为"{extensions}"的文件。',
	    browseClass: "btn btn-primary",
	    browseLabel: "选择本地封面图",
	    browseIcon: "<i class=\"icon icon-picture\"></i> ",
	    removeClass: "btn btn-danger",
	    removeLabel: "删除",
	    removeIcon: "<i class=\"icon icon-trash\"></i> ",
	    uploadUrl: up_url,
	    uploadAsync: true,
	    previewSettings: {
	        image: {width: "auto", height: "50px"}
	    },
	    fileActionSettings: {},
	    dropZoneTitle: "拖拽单幅图片或点击下面按钮上传",
	    textEncoding: "UTF-8",
	   uploadExtraData: get_obj_token
	}).on('filepreajax',function(event,previewId,index){
		var files =  $('#FImgUpload').fileinput('getFileStack');
		//构造每次请求的key
		var extraData = $("#FImgUpload").fileinput('uploadExtraData');
		var name =files[index].name;
		extraData.key = obj_token.prefix+name;
		// $("#"+previewId).data("imgname",name);
		$("#"+previewId).data("imgsrc",extraData.key);

	}).on("fileuploaded",function(event, data, previewId, index){
		//单个上传成功，保存key
		img_path = $("#"+previewId).data("imgsrc");
		// console.log(obj);
		ringParams.img_path = img_path;
	}).on("filebatchuploadcomplete",function(){
		//全部上传成功
		obj_token = {};
		$("#objImgUpload").fileinput("upload");
		
	}).on('fileloaded', function(event, file, previewId, index, reader) {
		  var type = file.type;
        if (type!="image/jpeg"&&type!="image/png"){
        	$.zui.messager.show("请选择格式为jpg,png的图片", {placement: 'center', type: 'success', time: '3000', icon: 'check'});
            $("#imgUpload").fileinput("clear");
        }
	}); 

	//720环物封面图
 $("#BImgUpload").fileinput({
	    language: 'zh',
	    showUpload: false,
	    showRemove: false,
	    showCancel: false,
	    showUploadedThumbs:false,
	    dropZoneEnabled:false,
	    maxFileCount: 1,
	    previewFileType: "image",
	    allowedFileExtensions: ["jpg","jpeg", "png"],
	    msgInvalidFileExtension: '不支持文件类型"{name}"。只支持扩展名为"{extensions}"的文件。',
	    browseClass: "btn btn-primary",
	    browseLabel: "选择本地背景图",
	    browseIcon: "<i class=\"icon icon-picture\"></i> ",
	    removeClass: "btn btn-danger",
	    removeLabel: "删除",
	    removeIcon: "<i class=\"icon icon-trash\"></i> ",
	    uploadUrl: up_url,
	    uploadAsync: true,
	    previewSettings: {
	        image: {width: "auto", height: "50px"}
	    },
	    fileActionSettings: {},
	    dropZoneTitle: "拖拽单幅图片或点击下面按钮上传",
	    textEncoding: "UTF-8",
	   uploadExtraData: get_obj_token
	}).on('filepreajax',function(event,previewId,index){
		var files =  $('#BImgUpload').fileinput('getFileStack');
		//构造每次请求的key
		var extraData = $("#BImgUpload").fileinput('uploadExtraData');
		var name =files[index].name;
		extraData.key = obj_token.prefix+name;
		// $("#"+previewId).data("imgname",name);
		$("#"+previewId).data("imgsrc",extraData.key);

	}).on("fileuploaded",function(event, data, previewId, index){
		//单个上传成功，保存key
		background = $("#"+previewId).data("imgsrc");
		// console.log(obj);
		ringParams.background = background;
	}).on("filebatchuploadcomplete",function(){
		//全部上传成功
		obj_token = {};
		$("#FImgUpload").fileinput("upload");
		
	}).on('fileloaded', function(event, file, previewId, index, reader) {
		  var type = file.type;
        if (type!="image/jpeg"&&type!="image/png"){
        	$.zui.messager.show("请选择格式为jpg,png的图片", {placement: 'center', type: 'success', time: '3000', icon: 'check'});
            $("#imgUpload").fileinput("clear");
        }
	}); 


})

function get_token() {
	if (qn_token.prefix) {
		return qn_token;
	}
	  $.ajax({
	  	url:'/get_token.php',
	  	method:'post',
	  	async: false,
	  	data:{'act':"ring_around",'remainTime':remainTime},
	  	success:function(res){
			var obj = eval ("(" + res + ")");
			qn_token.prefix= obj.prefix;
			if (obj.token) 
				qn_token.token = obj.token;
			else if(obj.policy){
				qn_token.policy = obj.policy;
				qn_token.OSSAccessKeyId = obj.accessid;
				qn_token.host = obj.host;
				qn_token.signature = obj.signature;
			}
	 	return qn_token;
	  	}
	  })
}
function get_obj_token() {
	if (obj_token.prefix) {
		return obj_token;
	}
	  $.ajax({
	  	url:'/get_token.php',
	  	method:'post',
	  	async: false,
	  	data:{'act':"ring_around",'remainTime':remainTime},
	  	success:function(res){
			var obj = eval ("(" + res + ")");
			obj_token.prefix= obj.prefix;
			if (obj.token) 
				obj_token.token = obj.token;
			else if(obj.policy){
				obj_token.policy = obj.policy;
				obj_token.OSSAccessKeyId = obj.accessid;
				obj_token.host = obj.host;
				obj_token.signature = obj.signature;
			}
	 	return obj_token;
	  	}
	  })
}

function showerr(content,obj){
	alert_notice(content,'default','top');
	if(obj!=null){
		$(obj).parent(".input-group").addClass("has-error");
	}
}

//edit


function update_ring(id){
    
    ringParams.id = id;
    ringParams.rname = $.trim($("#rname").val());
    ringParams.link = $.trim($("#link").val());
    if (!ringParams.rname||ringParams.rname.length>100) {
        alert_notice('请输入1到100字符的名字');
        return false;
    }
    ringParams.img_path = $("#thumbpath").attr('src');
    if (!ringParams.img_path) {
        alert_notice("请选择封面");
        return false;
    }
	// console.log(music_uploader.files.length);
    if(music_uploader.files.length>0){
    	music_uploader.start();
    }else{
    	doUpdate_ring(ringParams);
    }
   
}

function doUpdate_ring(ringParams){
	console.log(ringParams);
	$.post("/member/ring_around",{
		"act":"edit",
		"ringParams":ringParams,
		"id":ringParams.id
   },function(res){
        if (res.status == 1) {
            alert_notice('更新成功','success');
            window.location.href ="/member/ring_around";
        }else{
            alert_notice(res.msg);
        }
   },'json')
}
function preview_ring(id){
    window.open(host+'/ring/index.html?id='+id);
}
