<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:00
         compiled from "plugin\bgmusic\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:2706560dfbbb8e25a24-79389708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31af5126984a73878f72ddb2bbae400c6518607f' => 
    array (
      0 => 'plugin\\bgmusic\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2706560dfbbb8e25a24-79389708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb8e2920',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb8e2920')) {function content_60dfbbb8e2920($_smarty_tpl) {?> <button type="button" class="btn" data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="为全景加入背景音乐" onclick="openMusic()"<?php }?> > 背景音乐设置 </button><?php }} ?>