/**
* 生成随机数
*@len 长度 
*/
function generator_radom_str(len){
    if(typeof(len)=="undefined"||len==null||len=="") len=6;
   return generic_radom_str(len);
}
// var krpano=null;
/**
* 视频贴片数据集合
*/
var video_tie_hotspot={};
video_tie_hotspot.scene=new Array();
video_tie_hotspot.scene.hotspot=new Array();
/**
* 当前视频热点名称
*/
var hotspotName;
$(function(){
     //选择视频后关闭监听
     $('#video_tie_Modal').on("hide.zui.modal",function(){
      var $tie= $("#video_choose_ok_tie");
      var name=$tie.data("name");
	  var cover = $tie.data("cover");
      var loc=$tie.data("location");
      var lujin = $tie.data("lujin");
	  var autoplay = 'true';
     if(!loc || loc.length<=0){return;}
     if(!lujin || lujin.length<=0){return;}
    var krpano = getKrpano();
    //获取当前场景
    var sceneName = krpano.get('xml.scene');
    // console.log(sceneName);
    var obj=null;
    var hot=get_video_tie_hotspotByUrl(sceneName,loc,function(scene,hot,index){obj=scene;});

    var $btn=$("#video_tie_Modal .modal-footer button");
    var tag=$btn.data('tag');
    // console.log("tag:"+tag);
    if(typeof(tag)!="undefined" && tag!=null && tag==1){
        //修改
       var name=$btn.data('hot').name;
       $btn.removeData('tag');
       $btn.removeData('hot');
       // console.log("热点名称:"+name);
       set_videourl_hotspot_video_tie(krpano,name,loc);
       get_video_tie_hotspotByName(sceneName,name,function(scene,hots,index){
          if(hots!=null){
            hots.videourl=loc;
            console.log(JSON.stringify(video_tie_hotspot));
            bind_video_tie_tip(sceneName);
          }
       })
    }
    else if(hot==null){
         //添加
         //启动视频热点设置界面
        hotspotName="hotspot_"+generator_radom_str();
        krpano.set("curscreen_x", ($('#settingPano').width()-50) / 2);
        krpano.set("curscreen_y", ($('#settingPano').height()-50) / 2);
        krpano.call("screentosphere(curscreen_x, curscreen_y, curscreen_ath, curscreen_atv);");
        ath = krpano.get("curscreen_ath");
        atv = krpano.get("curscreen_atv");
        krpano.call('addvideo_tie_hotspot("'+loc+'","'+hotspotName+'","'+name+'","'+ath+'","'+atv+'",0,0,0,0,0,true,2000,'+autoplay+',200,200,true,"'+cover+'","'+lujin+'")');
        
        var hotspot = krpano.get("hotspot['"+hotspotName+"']");
		if(hotspot!=null){
        var scene=recordhotspot(hotspot,lujin,sceneName,'video',autoplay);
        if(obj==null){
            video_tie_hotspot.scene.push(scene);
        }
        else{
            obj.hotspot.push(scene.hotspot[0]);
        }
        //绑定热点列表
        bind_video_tie_tip(sceneName);
        console.log(JSON.stringify(video_tie_hotspot));
		}
      else{
          alert("创建视频热点失败");
      }
    }
      //清除数据
      $tie.data('name','');
      $tie.data('location','');
      $tie.html('');
    });
});
/**
*判断当前传入的场景下是否存在传入的热点名称
*@sceneName 场景名称
*@hotspotName 热点名称
*@callback 回调函数 返回两个参数数据 scene:当前传入场景对象数据 ;hotspot:当前传入场景、热点下的热点数据 ; index:当前传入热点索引 ;
*@return 返回热点数据
*/
function get_video_tie_hotspotByName(sceneName,hotspotName,callback){
   var scene=get_video_tie_scene(sceneName);
   var flag=false;
   var hotspot=null;
   var index=-1;
   if(scene!=null){
       $.each(scene.hotspot,function(i,item){
            if(item && item.name==hotspotName) {
                 flag=true;
                 hotspot=item;
                 index=i;
                 return false;
            }
       })
   }
   if(callback){
      callback(scene,hotspot,index);
   }
   return hotspot;
}
/**
* 获取视频贴片热点数据
*@sceneName 场景名称
*@videourl 视频url地址
*@callback 回调函数 返回三个参数数据 scene:当前传入场景数据对象 ; hotspot:热点数据 ; index:当前传入热点索引 ;
*@return 返回热点数据
*/
function get_video_tie_hotspotByUrl(sceneName,videourl,callback){
  var scene=get_video_tie_scene(sceneName);
  var hotspot=null;
  var index=-1;
  if(scene!=null){
     $.each(scene.hotspot,function(i,item){
       if(item && item.videourl==videourl){
            hotspot=item;
            index=i;
            return false;
       }
    });
  }
  if(callback){
    callback(scene,hotspot,index);
  }
  return hotspot;
}
/**
*初始化视频热点数据
*@krpano 
*@sceneName 场景名称
*@video_tie_hotspot 视频贴片数据
*@flag 
*/
function init_video_tie(krpano,sceneName,video_tie,flag){
    if(typeof(video_tie)=="undefined"||video_tie==null)return;
    $.extend(true,video_tie_hotspot,video_tie);//深度拷贝
    // video_tie_hotspot=video_tie;
    if(typeof(video_tie_hotspot.scene)=="undefined" || video_tie_hotspot.scene==null){
        video_tie_hotspot={};
        video_tie_hotspot.scene=new Array();
        video_tie_hotspot.scene.hotspot=new Array();
    }
    var scene=video_tie_hotspot.scene;
    if(typeof(flag)=="undefined"||flag==null||flag.length<=0)flag=true;
    $.each(scene,function(i,s){
        if(s.name==sceneName){
            $.each(s.hotspot,function(j,h){
                if (typeof(h.type)!='undefined'&&h.type!=null&&h.type=='img') {
                  krpano.call('addimg_tie_hotspot("'+h.videourl+'","'+h.name+'","'+h.hotspottitle+'","'+h.ath+'","'+h.atv+'","'+h.rx+'","'+h.ry+'","'+h.rz+'",0,0,true,"'+h.depth+'",true,"'+h.width+'","'+h.height+'","'+flag+'")');
                }else{
                  krpano.call('addvideo_tie_hotspot("'+h.videourl+'","'+h.name+'","'+h.hotspottitle+'","'+h.ath+'","'+h.atv+'","'+h.rx+'","'+h.ry+'","'+h.rz+'",0,0,true,"'+h.depth+'",'+h.autoplay+',"'+h.width+'","'+h.height+'","'+flag+'","'+h.posterurl+'","'+h.locationurl+'")');
                }
            });
            return false;
        }
     });
    if(flag){
      //初始化视频贴片设置
      //$("#panoSettingModal .pano-setting-container button:eq(5)").click();
	  bind_video_tie_tip(sceneName);
    }
}
/**
*获取所有场景 
*@sceneName 场景名称
*/
function getScenes(sceneName){
    var krpano=getKrpano();
    var sceneObj = krpano.get('scene');
    var sceneArr = sceneObj.getArray ? sceneObj.getArray() : sceneObj.indexmap;
    console.log("场景count:"+sceneObj.length);
    if(sceneName){
        var item;
         $(sceneArr).each(function(idx){
            if(this.name == sceneName){
                item=this;
                return false;
            }
        });
        return item;
    }
    else{
        return sceneArr;
    }
}
/**
* 获取当前场景
*/
function getCurrScene(){
   var krpano=getKrpano();
  return krpano.get('xml.scene');
}
/**
*获取指定的场景数据
*@sceneName 场景名称
*@callback 回调函数 返回两个参数数据 index:当前传入场景索引 ;scene:当前传入场景数据对象
*return 返回场景数据
*/
function get_video_tie_scene(sceneName,callback){
    var obj=null;
    var index=-1;
    $.each(video_tie_hotspot.scene,function(i,item){
       if(item && item.name==sceneName){
            obj=item;
            index=i;
            return false;
       }
    });
    if(callback){
        callback(index,obj);
    }
    return obj;
}

/**
*删除场景数据
*@sceneName 场景名称
*/
function del_video_tie_hotspot_bysname(sceneName){
   get_video_tie_scene(sceneName,function(index,item){
      video_tie_hotspot.scene.splice(i,1);
   });
   console.log(JSON.stringify(video_tie_hotspot));
}
/**
*删除场景下的热点
*@sceneName 场景名称
*@hotspotName 热点名称
*/
function del_video_tie_hotspot_byhotname(sceneName,hotspotName){
   var obj=get_video_tie_scene(sceneName);
   var flag=false;
   if(obj!=null){
       $.each(obj.hotspot,function(i,item){
            if(item && item.name==hotspotName) {
                try{
                     var krpano=getKrpano();
                     krpano.call("removehotspot("+hotspotName+")");//删除热点
					 krpano.call("removehotspot("+hotspotName+'_btn'+")");//删除播放按钮
                     obj.hotspot.splice(i,1);//删除缓存数据
                     flag=true;
                }
                catch(ex){
                    alert(ex.message);
                }
                 return false;
            }
       })
       if(obj.hotspot.length==0){
        //当前场景下热点都删除完了，那就删除当前场景
        del_video_tie_hotspot_bysname(obj.name);
       }
   }
   console.log(JSON.stringify(video_tie_hotspot));
   return flag;
}
/**
*获取当前的krpano对象
*@obj 
*/
function getKrpano(obj){
  if(typeof(obj)=="undefined"||obj==null) obj="panoSettingObject";
  var krpano = document.getElementById(obj);
  return krpano;
}
/**
* 绑定场景热点数据
*@scene 场景名称
*/
function bind_video_tie_tip(sceneName){
    $(".slider .slider-horizontal").css("width","190px");
    var $tbody=$("#first_video_eye .tab_footer table tbody");
     $tbody.html('');
    if(typeof(sceneName)=="undefined"||sceneName==null||sceneName==""){
      return;
    }
   var obj=get_video_tie_scene(sceneName);
   if(obj!=null){
      $.each(obj.hotspot,function(i,item){
          if(typeof(item.type)=="undefined"||item.type==null||item.type=='video'){
          hotspotName=item.name;
          var title=item.videourl;
          var hotspottitle=item.hotspottitle;
		  var autoplay = item.autoplay;
          var len=$(".tie .tab-content #first_video_eye .tab_footer table tbody tr[id="+hotspotName+"]").length;
          if(len<=0){
              var str='<tr id='+hotspotName+' data-scene="'+sceneName+'"><td><input type="radio" onclick="getcheckRadio(this)" data-scene="'+sceneName+'" id="'+hotspotName+'" name="hots"></td>'+
              '<td><span style="width:120px;" title='+title+'>'+hotspottitle+'</span></td><td>'+
			  '<input type="radio" ';
			  if(autoplay=='true'){str += 'checked ';}
			  str += ' onclick="javascript:update_video_tie_value(\''+sceneName+'\',\''+hotspotName+'\',{\'autoplay\':\'true\'});" name="'+hotspotName+'_play">点击播放 &nbsp;<input type="radio" ';
			  if(autoplay=='false'){str += 'checked ';}
			  str += 'onclick="javascript:update_video_tie_value(\''+sceneName+'\',\''+hotspotName+'\',{\'autoplay\':\'false\'});" name="'+hotspotName+'_play">自动</td><td>'+
              '<a href="javascript:void(0)" style="margin-right:10px" title="删除" onclick="del_tie_click(this)"  class="text-danger"><i class="icon-trash"></i></a>'+
              '<a href="javascript:void(0)" title="修改"  onclick="edit_tie_click(this)" class="text-success"><i class="icon icon-edit-sign"></i></a>'+
              '</td></tr>';
             $tbody.append(str);
             var $a=$(".tie .tab-content #first_video_eye .tab_footer table tbody tr[id="+hotspotName+"] td a")
             $a.data('hot',item);
             $a.data('sceneName',sceneName);
             //绑定滑动条数据
             set_Slider(sceneName,hotspotName);
            }  
          }
      });
      //设置radio
      var $radio=$(".tie .tab-content #first_video_eye .tab_footer table tbody tr:last input[type='radio']");
      if($radio.get(0)){
        $radio.get(0).checked="checked";
      }
  }
}
/**
* 绑定场景热点图片贴片数据
*@scene 场景名称
*/
function bind_img_tie_tip(sceneName){
    $(".slider .slider-horizontal").css("width","190px");
    var $tbody=$("#paster_img .tab_footer table tbody");
     $tbody.html('');
    if(typeof(sceneName)=="undefined"||sceneName==null||sceneName==""){
      return;
    }
    var obj = get_video_tie_scene(sceneName);
   if(obj!=null){
      $.each(obj.hotspot,function(i,item){
          if(typeof(item.type)!="undefined"&&item.type!=null&&item.type=='img'){
          hotspotName=item.name;
          var title=item.videourl;
          var hotspottitle=item.hotspottitle;
          var str='<tr id='+hotspotName+' data-scene="'+sceneName+'"><td><input type="radio" onclick="getcheckRadio(this)" data-scene="'+sceneName+'" id="'+hotspotName+'" name="hots"></td>'+
          '<td><span title='+title+'>'+hotspottitle+'</span></td><td>'+
          '<a href="javascript:void(0)" style="margin-right:10px" title="删除" onclick="del_tie_click(this)"  class="text-danger"><i class="icon-trash"></i></a>'+
          // '<a href="javascript:void(0)" title="修改"  data-modalid="#media_icon" data-imgtype="custom" onclick="choose_pasterimg()" class="text-success"><i class="icon icon-edit-sign"></i></a>'+
          '</td></tr>';
         $tbody.append(str);
         var $a=$(".tie .tab-content #paster_img .tab_footer table tbody tr[id="+hotspotName+"] td a")
         $a.data('hot',item);
         $a.data('sceneName',sceneName);
         //绑定滑动条数据
         set_Slider(sceneName,hotspotName,'img');
       }
      });
      //设置radio
      var $radio=$(".tie .tab-content #paster_img .tab_footer table tbody tr:last input[type='radio']");
      if($radio.get(0)){
        $radio.get(0).checked="checked";
      }
  }
}
/**
* 获取当前选择的场景下的热点列表
*@event 当前radio对象
*/
function getcheckRadio(event){
    var $obj=$(event);
    hotspotName=$obj.attr('id');
    var sceneName=$obj.attr('data-scene');
    //绑定滑动条数据
    set_Slider(sceneName,hotspotName);
   console.log(sceneName+"   "+hotspotName);
}
/**
* 删除场景热点数据
*/
function del_tie_click(ele){
    var sceneName=$(ele).data('sceneName');
    var hot=$(ele).data('hot');
  var flag=del_video_tie_hotspot_byhotname(sceneName,hot.name);
  if(flag){
     $(ele).parent().parent().remove();//清除列表
     set_radio_checked();
  }
}
/**
* 修改场景热点数据
*/
function edit_tie_click(ele){
    var sceneName=$(ele).data('sceneName');
    var hot=$(ele).data('hot');
    var $btn=$("#video_tie_Modal .modal-footer button");
    $btn.data('tag',1);
    $btn.data('hot',hot);
    video_tie_click(null);
}
/**
* 构建视频贴片数据格式
*/
function recordhotspot(hs,lujin,sceneName,type,autoplay){
    var scene={};
    scene.name=sceneName;
    scene.hotspot=new Array();
    var hotspot={};
    hotspot.name=hs.name;
    hotspot.videourl=hs.videourl;
    hotspot.locationurl=lujin;
	//hotspot.posturl=hs.cover;
    hotspot.posterurl=hs.posterurl;
    hotspot.hotspottitle=hs.hotspottitle;
    hotspot.ath=hs.ath;
    hotspot.atv=hs.atv;
    hotspot.width=hs.width;
    hotspot.height=hs.height;
    hotspot.rx=hs.rx;
    hotspot.ry=hs.ry;
    hotspot.rz=hs.rz;
    hotspot.depth=hs.depth;
    hotspot.type = type?type:'video';
    if(type=='video'){
     hotspot.videourl=hs.videourl;
     hotspot.posterurl=hs.posterurl;
	 hotspot.autoplay = autoplay;
    }else{
      hotspot.videourl = hs.url;
    }
	
    scene.hotspot.push(hotspot);

    return scene;
}
/**
* 设置radio 选中
*/
function set_radio_checked(){
  var scene= get_video_tie_scene(getCurrScene());
  if(scene!=null && scene.hotspot!=null && scene.hotspot.length>0){
      hotspotName=scene.hotspot[0].name;
      var $radio=$(".tie .tab-content .tab_footer table tbody tr[id="+hotspotName+"] input[type='radio']");
      $radio.removeAttr('checked');
      if($radio.get(0))
        $radio.get(0).checked="checked";
  }
}
/**
*视频贴片弹框
*/
function video_tie_click(event){
   $('#video_tie_Modal').modal('show');
}
/**
* 设置滑动条数据
*@sceneName 场景名称
*@hotspotName 热点名称
*/
function set_Slider(sceneName,hotspotName,type){
    var hotspot=get_video_tie_hotspotByName(sceneName,hotspotName);
      if(hotspot!=null){
          if (type=='img') {
            paster_img_w_Slider.slider("setValue", parseInt(hotspot.width));
            paster_img_h_Slider.slider("setValue", parseInt(hotspot.height));
            paster_img_rx_Slider.slider("setValue", parseInt(hotspot.rx));
            paster_img_ry_Slider.slider("setValue", parseInt(hotspot.ry));
            paster_img_rz_Slider.slider("setValue", parseInt(hotspot.rz));
            paster_img_d_Slider.slider("setValue", parseInt(hotspot.depth));
          }else{
            ex_w_Slider.slider("setValue", parseInt(hotspot.width));
            ex_h_Slider.slider("setValue", parseInt(hotspot.height));
            ex_rx_Slider.slider("setValue", parseInt(hotspot.rx));
            ex_ry_Slider.slider("setValue", parseInt(hotspot.ry));
            ex_rz_Slider.slider("setValue", parseInt(hotspot.rz));
            ex_d_Slider.slider("setValue", parseInt(hotspot.depth));
          }
           
      }
}
/**
* 设置视频贴片热点属性
*@krpano
*@hotspotName 热点名称
*@attr 需要设置的热点属性
*@value 热点属性值
*/
function set_hotspot_video_tie(krpano,hotspotName,attr,value){
    if(typeof(krpano)=="undefined"||krpano==null||krpano=="")return;
    if(typeof(hotspotName)=="undefined"||hotspotName==null||hotspotName=="")return;
    if(typeof(attr)=="undefined"||attr==null||attr=="")return;
    var hot= krpano.get("hotspot["+hotspotName+"]");
    if(hot){
        krpano.set('hotspot['+hotspotName+'].'+attr,value);
    }
    return hot;
}
/**
*设置热点的videourl参数
*@krpano
*@hotspotName 热点名称
*@value 热点属性值
*/
function set_videourl_hotspot_video_tie(krpano,hotspotName,value){
    var hot= krpano.get("hotspot["+hotspotName+"]");
    if(hot){
        del_video_tie_hotspot(krpano,hotspotName);
        hot.videourl=value;
        create_video_tie_hotspot(krpano,hot,true);
    }
    return hot;
}
/**
* 删除热点
*@krpano
*@hotspotName 热点名称
*/
function del_video_tie_hotspot(krpano,hotspotName){
    krpano.call("removehotspot("+hotspotName+")");//删除热点
}
/**
*创建热点
*@krpano
*@hotsopt_config 热点数据
*flag true:可拖动 false:不可拖动
*/
function create_video_tie_hotspot(krpano,hotsopt_config,flag){
  var h=hotsopt_config;
  if(typeof(flag)=="undefined"||flag==null||flag=="")flag=true;
  krpano.call('addvideo_tie_hotspot("'+h.videourl+'","'+h.name+'","'+h.hotspottitle+'","'+h.ath+'","'+h.atv+'","'+h.rx+'","'+h.ry+'","'+h.rz+'","'+h.ox+'","'+h.oy+'",true,"'+h.depth+'",'+h.autoplay+',"'+h.width+'","'+h.height+'","'+flag+'","'+h.posterurl+'")');
}

//获取视频贴片数据 TODO
function build_video_tie_HotspotSetting(){
    return video_tie_hotspot;
}

/**
* 获取拖动热点的位置坐标
*@sceneName 场景名称
*@hsName    热点名称
*@ath 
*@atv 
*@hotspotType
*/
function update_video_tie_pos(sceneName,hsName,ath,atv,hotspotType){
   update_video_tie_value(sceneName,hsName,{'ath':ath,'atv':atv});
}

/**
* 获取拖动热点的位置坐标
*@sceneName 场景名称
*@hsName    热点名称
*@datas  
*/
function update_video_tie_value(sceneName,hsName,datas){
   var hotspot=get_video_tie_hotspotByName(sceneName,hsName);
    if(hotspot!=null){
      for(var key in datas){
        hotspot[key]=datas[key];
      }
   }
   // console.log(JSON.stringify(hotspot));
}

function init_img_tie(){
  bind_img_tie_tip(getCurrScene());
}