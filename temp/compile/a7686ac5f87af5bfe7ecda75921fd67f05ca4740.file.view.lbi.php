<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\bgvoice\template\view.lbi" */ ?>
<?php /*%%SmartyHeaderCode:306255b457aa91f7fd3-47881274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7686ac5f87af5bfe7ecda75921fd67f05ca4740' => 
    array (
      0 => 'plugin\\bgvoice\\template\\view.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '306255b457aa91f7fd3-47881274',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa92023d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa92023d')) {function content_5b457aa92023d($_smarty_tpl) {?><!-- <style>
	.btn_music {
	    background: url("/plugin/bgvoice/images/music-open.png") no-repeat;
	}
	.btn_music_off {
	    background: url("/plugin/bgvoice/images/music-close.png") no-repeat;
	}
</style> -->
<div class="btn_music" style="display:none" onClick="pauseSpeech(this)"></div>
<script>
	$(function(){
		plugins_init_function.push(bgvoice_init);
	})
	function bgvoice_init(data,settings){
		var speechObj = data.speech_explain;
		if(speechObj.isWhole=='1'){
		    if(speechObj.useSpeech=='1'){
		        settings["onstart"] += "playsound(bgspeech, '"+speechObj.mediaUrl+"', 0);";
		    }
		}else{
		    $(speechObj.sceneSettings).each(function(idx){
		        if(this.useSpeech=='1'){
		            settings['scene[scene_'+this.imgUuid+'].bgspeech'] = this.mediaUrl;
		        }
		    });
		}
		settings["events[skin_events].onloadcomplete"]+="js(toggleSpeechBtn(get(xml.scene)));";
	}
	function toggleSpeechBtn(sceneName){
	    var speechObj = $("body").data("panoData").speech_explain;
	    if(speechObj.isWhole=='1'){
	        if(speechObj.useSpeech=='1'){
	            $('.btn_music').show();
	        }else{
	            $('.btn_music').hide();
	        }
	    }else{
	        var imgUuid = sceneName.substring(sceneName.indexOf("_")+1,sceneName.length).toLowerCase();
	        $(speechObj.sceneSettings).each(function(idx){
	            if(imgUuid == this.imgUuid){
	                if(this.useSpeech=='1'){
	                    $('.btn_music').show();
	                }else{
	                    $('.btn_music').hide();
	                }
	            }
	        });
	    }
	}
	function pauseSpeech(el){
	    var krpano = document.getElementById('krpanoSWFObject');
	    krpano.call("pausesoundtoggle(bgspeech);pausesoundtoggle(bgs);");
	    toggleSpeech(el);
	}
	function toggleSpeech(el) {
	    if ($(el).hasClass("btn_music")) {
	        $(el).removeClass("btn_music");
	        $(el).addClass("btn_music_off");
	    } else {
	        $(el).removeClass("btn_music_off");
	        $(el).addClass("btn_music");
	    }
	}
</script><?php }} ?>