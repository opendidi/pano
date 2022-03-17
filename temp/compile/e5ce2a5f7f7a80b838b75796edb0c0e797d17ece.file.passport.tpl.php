<?php /* Smarty version Smarty-3.1.7, created on 2022-01-22 11:28:02
         compiled from "D:/VR/VR0001/template\default\passport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1099061eb79c2bd1562-20019424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5ce2a5f7f7a80b838b75796edb0c0e797d17ece' => 
    array (
      0 => 'D:/VR/VR0001/template\\default\\passport.tpl',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1099061eb79c2bd1562-20019424',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'module' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_61eb79c2bf1fa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61eb79c2bf1fa')) {function content_61eb79c2bf1fa($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/library/passport_header.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/passport/".($_smarty_tpl->tpl_vars['module']->value).".lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/library/footer.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }} ?>