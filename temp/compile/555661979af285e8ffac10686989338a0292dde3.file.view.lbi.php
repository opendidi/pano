<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\bgmusic\template\view.lbi" */ ?>
<?php /*%%SmartyHeaderCode:159225b457aa91d1fd6-17486774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '555661979af285e8ffac10686989338a0292dde3' => 
    array (
      0 => 'plugin\\bgmusic\\template\\view.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159225b457aa91d1fd6-17486774',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa91df9f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa91df9f')) {function content_5b457aa91df9f($_smarty_tpl) {?><!-- <style>
.btn_bgmusic {
    background: url("/plugin/bgmusic/images/bgmusic-open.png") no-repeat;
}

.btn_bgmusic_off {
    background: url("/plugin/bgmusic/images/bgmusic-close.png") no-repeat;
}
</style>
 --><div class="btn_bgmusic" onClick="pause_bgMusic(this)" style="display:none"></div>
<script>
	$(function(){
		plugins_init_function.push(bgmusic_init);
	})
	function bgmusic_init(data,settings){
		 //背景音乐
        var musicObj = data.bg_music;
        if (musicObj.isWhole=='1') {
            if (musicObj.useMusic=='1') {
                settings["onstart"] += "playsound(bgmusic, '" + musicObj.mediaUrl + "', 0);";
            }
        } else {
            $(musicObj.sceneSettings).each(function (idx) {
                if (this.useMusic=='1') {
                    settings['scene[scene_' + this.imgUuid + '].bgmusic'] = this.mediaUrl;
                }
            });
        }
       settings["events[skin_events].onloadcomplete"]+="js(toggleMusicBtn(get(xml.scene)));";
	}
	function toggleMusicBtn(sceneName) {
	    var musicObj = $("body").data("panoData").bg_music;
	    if (musicObj.isWhole=='1') {
	        if (musicObj.useMusic=='1') {
	            $('.btn_bgmusic,.btn_bgmusic_off').show();
	        } else {
	            $('.btn_bgmusic,.btn_bgmusic_off').hide();
	        }
	    } else {
	        var imgUuid = sceneName.substring(sceneName.indexOf("_") + 1, sceneName.length).toLowerCase();
	        $(musicObj.sceneSettings).each(function (idx) {
	            if (imgUuid == this.imgUuid) {
	                if (this.useMusic=='1') {
	                    $('.btn_bgmusic,.btn_bgmusic_off').show();
	                } else {
	                    $('.btn_bgmusic,.btn_bgmusic_off').hide();
	                }
	            }
	        });
	    }
	}
	function pause_bgMusic(el) {
	    var krpano = document.getElementById('krpanoSWFObject');
	    // krpano.call("pausesoundtoggle(bgmusic);pausesoundtoggle(bgm);");
	    krpano.call("pausesoundtoggle(bgmusic);pausesoundtoggle(bgm);");
	    toggleMusic(el);
	}
	function toggleMusic(el) {
	    if ($(el).hasClass("btn_bgmusic")) {
	        $(el).removeClass("btn_bgmusic");
	        $(el).addClass("btn_bgmusic_off");
	    } else {
	        $(el).removeClass("btn_bgmusic_off");
	        $(el).addClass("btn_bgmusic");
	    }
	}
</script><?php }} ?>