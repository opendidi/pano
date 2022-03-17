<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:00
         compiled from "plugin\open_alert\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1714160dfbbb8e6c3d9-38832689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10dc14313ab32988ceed9e054080a9d849e688a2' => 
    array (
      0 => 'plugin\\open_alert\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1714160dfbbb8e6c3d9-38832689',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb8e6fa6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb8e6fa6')) {function content_60dfbbb8e6fa6($_smarty_tpl) {?> <button type="button" class="btn" data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="设置进入全景时显示的提示信息" onclick="openOpen()"<?php }?>>开场提示</button><?php }} ?>