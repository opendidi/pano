<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:00
         compiled from "plugin\project_download\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1032960dfbbb8e8af01-70419876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '857275fd3ac4d5756f5f2c162b6d2cb456749938' => 
    array (
      0 => 'plugin\\project_download\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1032960dfbbb8e8af01-70419876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb8e8e58',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb8e8e58')) {function content_60dfbbb8e8e58($_smarty_tpl) {?> <button type="button" class="btn btn-custom-logo"  data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="下载项目到本地浏览" onclick="openProjectDownModal()"<?php }?> >离线下载</button><?php }} ?>