<?php /* Smarty version Smarty-3.1.7, created on 2021-07-21 15:44:04
         compiled from "D:/VR/VR0002/data/static_template/tour\tour.xml" */ ?>
<?php /*%%SmartyHeaderCode:512560f7d0448cc741-84653113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23620e5fd1b8ee54dba2bea4f8e47bd95e2f8e3d' => 
    array (
      0 => 'D:/VR/VR0002/data/static_template/tour\\tour.xml',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '512560f7d0448cc741-84653113',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'custom_right' => 0,
    'v' => 0,
    'k' => 0,
    'scenesRes' => 0,
    'hotspot' => 0,
    'v1' => 0,
    'index' => 0,
    'v2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60f7d044959c3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60f7d044959c3')) {function content_60f7d044959c3($_smarty_tpl) {?><krpano version="1.19" title="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
" debugmode="false">
 
<include url="%SWFPATH%/skin/vtourskin.xml" />
<include url="%SWFPATH%/autorotate.xml" />
<include url="%SWFPATH%/object.xml" />
<contextmenu fullscreen="false" versioninfo="false">
        <item name="logo" caption="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
" separator="true" onclick="openurl('<?php echo $_smarty_tpl->tpl_vars['_lang']->value['host'];?>
')" devices="flash|webgl"/>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['custom_right']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        	<item name="name_<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" caption="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
" onclick="openurl('<?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
')" <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>separator="true"<?php }?>  devices="flash|webgl"/>
        <?php } ?>
</contextmenu>
<events name="musicevents"
    onnewpano="indexoftxt(result, get(scene[get(xml.scene)].bgmusic),sound); if(result GE 0,tween(sound[bgsnd].volume, 0.5)); set(music_bgmusic,get(scene[get(xml.scene)].bgmusic)); if(music_bgmusic,js(openMusicVoiceBtn());playsound(bgm,get(scene[get(xml.scene)].bgmusic),1,tween(sound[bgsnd].volume, 1)););"
    keep="true"/>
 <layer name="open_alert" url="" keep="true" align="center" edge="center" x="0" y="0" maxwidth="160" maxheight="160"
           enabled="false" visible="false"/>
<action name="show_open_alert">set(layer[open_alert].url,%1); set(layer[open_alert].visible,true); delayedcall(5,
    tween(layer[open_alert].alpha,0,1));
</action>
	 <hotspot name="shadelogo" url="" ath="0" atv="90" distorted="true" scale="1.0" rotate="0.0" rotatewithview="true"
         visible="false" keep="true" onloaded="set(hotspot[shadelogo].rotate,get(view.hlookat));"/>
<events name="shadelogorotation" keep="true"
        onviewchange="if(hotspot[shadelogo].rotatewithview, set(hotspot[shadelogo].rotate,get(view.hlookat)) );"/>
<action name="show_shade">
    set(hotspot[shadelogo].url,%1);
    set(hotspot[shadelogo].atv,%2);
    set(hotspot[shadelogo].visible,true);
    set(hotspot[shadelogo].depth,2000);
</action>
<action name="addShade">
    txtadd(shade_name, 'shade_',%1); 
    addhotspot(get(shade_name));
    set(hotspot[get(shade_name)].url,%2); 
    <!-- set(hotspot[get(shade_name)].ath,0);  -->
    set(hotspot[get(shade_name)].atv,%3);
    set(hotspot[get(shade_name)].distorted,true); 
    set(hotspot[get(shade_name)].scale,"1.0");
    set(hotspot[get(shade_name)].rotate,"0.0");
     set(hotspot[get(shade_name)].rotatewithview,"true");
    set(hotspot[get(shade_name)].visible,"true"); 
    set(hotspot[get(shade_name)].keep,"false");
    set(hotspot[get(shade_name)].onloaded,"set(hotspot[get(shade_name)].rotate,get(view.hlookat));");
</action>  
 <action name="startup" autorun="onstart">
 	copy(startscene,scene[0].name); 
    if(device.fullscreensupport == true,js(showFullscreenBtn()););
    if(device.mobile OR device.tablet,js(hideShareAndFootmarkBtn()););
    loadscene(get(startscene), null, MERGE);
    if(startactions !== null, startactions());
 </action>
	 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scenesRes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
  	 <scene name="scene_<?php echo $_smarty_tpl->tpl_vars['v']->value['viewuuid'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['sceneTitle'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['album']){?>album="<?php echo $_smarty_tpl->tpl_vars['v']->value['album'];?>
"<?php }?>   onstart="activatespot(90)" thumburl="<?php echo $_smarty_tpl->tpl_vars['v']->value['imgPath'];?>
?<?php echo time();?>
" lat="" lng="" heading="">
   
		 <view hlookat="0" vlookat="0" fovtype="MFOV" fov="90" fovmin="5" fovmax="120" vlookatmin="-90" vlookatmax="90" limitview="lookat"/>
		<preview url="resource/pano/<?php echo $_smarty_tpl->tpl_vars['v']->value['viewuuid'];?>
/preview.jpg" />
		<image>
			<cube url="resource/pano/<?php echo $_smarty_tpl->tpl_vars['v']->value['viewuuid'];?>
/pano_%s.jpg" />
			<!-- <cube url="resource/pano/<?php echo $_smarty_tpl->tpl_vars['v']->value['viewuuid'];?>
/mobile/pano_%s.jpg" devices="mobile" /> -->
		</image>	
		
	</scene>   
	<?php } ?>

<?php if ($_smarty_tpl->tpl_vars['hotspot']->value!=''){?>
	<?php $_smarty_tpl->tpl_vars["index"] = new Smarty_variable("0", null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hotspot']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?> 
		<?php if ($_smarty_tpl->tpl_vars['v']->value['image']!=''){?> 
			<?php  $_smarty_tpl->tpl_vars['v1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v']->value['image']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v1']->key => $_smarty_tpl->tpl_vars['v1']->value){
$_smarty_tpl->tpl_vars['v1']->_loop = true;
?> 
				<gallery name="<?php echo $_smarty_tpl->tpl_vars['v1']->value['galleryName'];?>
" >
					<?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v1']->value['imgs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
$_smarty_tpl->tpl_vars['v2']->_loop = true;
?> 
				    	<img name="img_<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" url="<?php echo $_smarty_tpl->tpl_vars['v2']->value['src'];?>
" />
				  		<?php $_smarty_tpl->tpl_vars['index'] = new Smarty_variable($_smarty_tpl->tpl_vars['index']->value+1, null, 0);?>
				    <?php } ?>
				  </gallery>
		  	<?php } ?>
		 <?php }?>
	<?php } ?>
<?php }?>		   
	
	
	
</krpano><?php }} ?>