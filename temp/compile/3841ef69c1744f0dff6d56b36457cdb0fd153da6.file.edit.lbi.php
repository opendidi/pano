<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:00
         compiled from "plugin\custom_logo\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1539260dfbbb8e7b919-76736408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3841ef69c1744f0dff6d56b36457cdb0fd153da6' => 
    array (
      0 => 'plugin\\custom_logo\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1539260dfbbb8e7b919-76736408',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb8e7ef3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb8e7ef3')) {function content_60dfbbb8e7ef3($_smarty_tpl) {?> <button type="button" class="btn btn-custom-logo"  data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="为全景加入左上角自定义LOGO" onclick="openLogo()"<?php }?>>自定义LOGO</button><?php }} ?>