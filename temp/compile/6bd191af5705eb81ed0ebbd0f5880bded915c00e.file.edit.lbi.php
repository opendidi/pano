<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:00
         compiled from "plugin\bgvoice\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:3159960dfbbb8e2d996-37655584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bd191af5705eb81ed0ebbd0f5880bded915c00e' => 
    array (
      0 => 'plugin\\bgvoice\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3159960dfbbb8e2d996-37655584',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb8e30f9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb8e30f9')) {function content_60dfbbb8e30f9($_smarty_tpl) {?> <button type="button" class="btn" data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="为全景加入语音解说" onclick="openVoice()"<?php }?> >语音解说设置</button><?php }} ?>