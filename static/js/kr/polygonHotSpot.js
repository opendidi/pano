
var polygon_params={};
polygon_params.points=new Array();
/**
*krpano 
*/
var krpano_Id;
/**
*总数据
*/
var total_data=null;
/*
*设置多边形热点参数数据
*@param params 参数列表  部分选填
*@param l_params 附加参数  选填
*@param isclick 是否允许点击 选填 默认为true
*/
function setPolygonParams(params,l_params,isclick=false){
	params.l_params=l_params;
	params.isclick=isclick;
    if(typeof(params.points)=="undefined" || params.points==null){
    	params.points=new Array();
    }
	polygon_params=params;
}

/*
*创建多边形热点
*@param krpano krpano对象 必填
*@param params 参数列表  部分选填
*@param isdraw 是否绘制  选填
*@param callback 回调函数  参数:hot：返回创建成功后的热点对象,如果创建失败,返回null
*/
function createPolygonHotSpot(krpano,params,isdraw=true,callback=null){
	var hotspotName=params.name;
	krpano.call('addPolygonHotSpot("'+hotspotName+'","'+params.isclick+'","'+params.l_params+'","false")');
	$("#restart_polygon").show();
	$("#end_polygon").show();
	if(typeof(params.points)=="undefined" || params.points==null){
    	params.points=new Array();
    }
	if(params.points.length>0){
		bind_HotSpot_Points(krpano,hotspotName,params.points);
	}
	if(isdraw){
		//绑定当前画布的点击事件
		bind_single_click();
	}
	if(callback){
		 var hot= krpano.get("hotspot["+hotspotName+"]");
		 callback(hot);
	}
}

/*
*获取鼠标点击的坐标
*@param krpano krpano对象 必填
*@return param={ath,atv}
*/
function getCur_mouse_loc(krpano){
	var param={};
	param.mouseX=krpano.get('mouse.x');
	param.mouseY=krpano.get('mouse.y');
	return param;
}
/*
*坐标转换 屏幕坐标转空间坐标
*@param krpano krpano对象 必填
*@param ath 水平坐标  必填
*@param atv 垂直坐标  必填
*@return param={ath,atv}
*/
function ScreenToPanos(krpano,ath,atv){
	krpano.set("curscreen_x",ath);
    krpano.set("curscreen_y", atv);
    krpano.call("screentosphere(curscreen_x, curscreen_y, curscreen_ath, curscreen_atv);");
    var params={};
    params.ath = krpano.get("curscreen_ath");
    params.atv = krpano.get("curscreen_atv");
    return params;
}

/**
*获取当前的krpano对象
*@obj 当前画布id
*/
function getPolygonKrpano(obj){
  if(typeof(obj)=="undefined"||obj==null) obj=krpano_Id;
  var krpano = document.getElementById(obj);
  return krpano;
}
/**
* 绑定画布单击事件
*@obj_id 当前画布id
*/
function bind_single_click(obj_id){
	if(typeof(obj_id)=="undefined"||obj_id==null||obj_id=="")obj_id="settingPano";
	$("#"+obj_id).bind("click",func_click);
	// document.getElementById(obj_id).addEventListener('click',func_click,false);
}
/**
* 单击事件
*/
function func_click(){
	var krpano=getPolygonKrpano();
	var m=getCur_mouse_loc(krpano);
	var param=ScreenToPanos(krpano,m.mouseX,m.mouseY);
	polygon_params.points.push(param);
	if(polygon_params){
		var hotspotName=polygon_params.name;
		var hot= krpano.get("hotspot["+hotspotName+"]");
		if(hot){
            krpano.call('removehotspot('+hotspotName+');');
			krpano.call('addPolygonHotSpot("'+hotspotName+'","'+polygon_params.isclick+'","'+polygon_params.l_params+'","false")');
		}
		$.each(polygon_params.points,function(i,point){
			 krpano.set('hotspot['+hotspotName+'].point['+i+'].ath',point.ath);
			 krpano.set('hotspot['+hotspotName+'].point['+i+'].atv',point.atv);
		})
	}
}
/*
*绑定热点坐标
*@param krpano krpano对象 必填
*@param hotspotName 热点名称  必填
*@param points 坐标点集合  必填
*/
function bind_HotSpot_Points(krpano,hotspotName,points){
	$.each(points,function(i,point){
		 krpano.set('hotspot['+hotspotName+'].point['+i+'].ath',point.ath);
		 krpano.set('hotspot['+hotspotName+'].point['+i+'].atv',point.atv);
	})
}

/**
* 获取热点数据
*@param krpano krpano对象 必填
*@param hot_type 热点类型 选填 
*@param sceneName 场景名称 选填 为空时，即为当前场景
*@param hotspotName 热点名称 选填 
*/
function get_hotspot_data(krpano,hot_type="",sceneName="",hotspotName=""){
	var data=null;
	if(typeof(sceneName)=="undefined"||sceneName==null||sceneName==""){
		sceneName=krpano.get('xml.scene');
	}
	var datas;
	if(total_data==null){
		datas=$('#panoSettingModal .hot').data(sceneName);
	}
	else{
		datas=total_data[sceneName];
	}
	if(hot_type || hotspotName){
		$.each(datas,function(i,item){
			if(i==hot_type){
				if(hotspotName){
					$.each(item,function(j,v){
						if(v.name==hotspotName){
							data=v;
							return false;
						}
					})
				}
				else{
					data=item;
				}
				return false;
			}
		})
	}
	else{
		data=datas;
	}
	return data;
}
/**
*热点点击事件回调
*@param hot 当前点击的热点对象
*@param l_params 附加参数
*/
function dothing(hot,l_params){
	var hotSpotDataKey = ["scene","link","image","text","voice","imgtext","obj",'video'];
	var krpano=getPolygonKrpano();
	l_params=$.trim(l_params);
	var tag_hot=get_hotspot_data(krpano,l_params,null,hot.name);
	switch(l_params){
        case "scene":
  			krpano.call('looktohotspot(get('+hot.name+'));loadscene('+tag_hot.linkedscene+', null, MERGE,BLEND(1));');
            break;
        case "link":
        	window.open(tag_hot.link, "_blank");
            break;
        case "image":
           toggleBtns();
           krpano.call('show_gallery('+tag_hot.galleryName+')');	
            break;
        case "text":
           krpano.call('toggle_word_show(true,'+html_encode(tag_hot.hotspotTitle)+','+html_encode(tag_hot.wordContent)+')');	
            break;
        case "voice":
        	krpano.call('play_hotspot_voice('+tag_hot.musicSrc+')');
            break;
        case "imgtext":
            showPictext(html_encode(tag_hot.hotspotTitle),imgtext_encode(tag_hot.imgtext_wordContent));
            break;
        case "obj":
            obj_buildframes(tag_hot.objid);
            break;
        case "video":
           playvideo(tag_hot.location);
            break;
        case "around":
        	alert("around");
            krpano.call('buildframes('+tag_hot.aroundPath+','+tag_hot.fileCount+','+tag_hot.aroundobjectid+');set(settings.objectid,get(hotspot[get(name)].aroundobjectid));set(settings.objectnum,36);');
            break;
    }
}
/*
 * 重新绘制
*/
function restart_polygon(){
	var krpano=getPolygonKrpano();
	if(polygon_params){
		var hotspotName=polygon_params.name;
		//将原point数据清空
		polygon_params.points = [];
		//将原hotspot删除
		krpano.call('removehotspot('+hotspotName+')');	 
	}
}
/**
*结束绘制
*/
function end_polygon(){
	$("#settingPano").unbind("click",func_click);
	$("#restart_polygon").hide();
	$("#end_polygon").hide();
}

