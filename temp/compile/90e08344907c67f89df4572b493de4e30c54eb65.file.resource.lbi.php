<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\shade_sky_floor\template\resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:2155b457aa93726e1-82457036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90e08344907c67f89df4572b493de4e30c54eb65' => 
    array (
      0 => 'plugin\\shade_sky_floor\\template\\resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2155b457aa93726e1-82457036',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa937647',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa937647')) {function content_5b457aa937647($_smarty_tpl) {?>
<script>
	$(function(){
		plugins_init_function.push(shade_sky_floor_init);
	})
	function shade_sky_floor_init(data,settings){
		if (data.sky_land_shade.isWhole=='1') {//全局遮罩
		    var useShade = data.sky_land_shade.useShade;
		    if (useShade=='1') {
		        var imgPath = data.sky_land_shade.shadeSetting.imgPath;
		        var location = data.sky_land_shade.shadeSetting.location;
		        if (location == 0) {
		            location = -90;
		        } else {
		            location = 90;
		        }
		        settings["events[skin_events].onloadcomplete"] += "show_shade('" + imgPath + "'," + location + ",true);";
		    }
		} else {//单场景遮罩
		    settings["events[skin_events].onloadcomplete"]+="js(getShade(get(xml.scene)));";
		}
	}
	function getShade(sceneName) {
	    var imgUuid = sceneName.substring(sceneName.indexOf('_') + 1).toLowerCase();
	    var panoData = $("body").data("panoData");
	    var shadeSetting = panoData.sky_land_shade.shadeSetting;
	    if (shadeSetting) {
	        for(var i = 0;i < shadeSetting.length ; i++){
	            var obj = shadeSetting[i];
	           if(imgUuid == obj.imgUuid){
	               var useShade = obj.useShade;
	               if (useShade=='1') {
	                   var imgPath = obj.imgPath;
	                   var location = obj.location;
	                   if (location == 0) {
	                       location = -90;
	                   } else {
	                       location = 90;
	                   }
	                   var krpano = document.getElementById('krpanoSWFObject');
	                   krpano.call("addShade('" + imgUuid + "','" + imgPath + "'," + location + ");");
	               }
	           }
	        }
	    }
	}
</script>
<?php }} ?>