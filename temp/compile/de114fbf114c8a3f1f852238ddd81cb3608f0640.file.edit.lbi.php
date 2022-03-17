<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:00
         compiled from "plugin\custom_user\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1988060dfbbb8e836d1-71511409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de114fbf114c8a3f1f852238ddd81cb3608f0640' => 
    array (
      0 => 'plugin\\custom_user\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1988060dfbbb8e836d1-71511409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb8e86cc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb8e86cc')) {function content_60dfbbb8e86cc($_smarty_tpl) {?> <button type="button" class="btn btn-custom-logo"  data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="为全景加入左上角自定义作者名" onclick="openUserModal()"<?php }?> >自定义作者名</button><?php }} ?>