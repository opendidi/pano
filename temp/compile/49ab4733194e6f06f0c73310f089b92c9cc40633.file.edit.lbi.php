<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:00
         compiled from "plugin\link\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:2391960dfbbb8e35554-83118494%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49ab4733194e6f06f0c73310f089b92c9cc40633' => 
    array (
      0 => 'plugin\\link\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2391960dfbbb8e35554-83118494',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb8e38ba',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb8e38ba')) {function content_60dfbbb8e38ba($_smarty_tpl) {?><button type="button" class="btn" data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?> title="全景中加入站外链接、电话号码或导航" onclick="openLink()"<?php }?>>链接、电话与导航</button><?php }} ?>