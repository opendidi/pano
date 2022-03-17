<?php /* Smarty version Smarty-3.1.7, created on 2022-01-22 11:28:13
         compiled from "D:/VR/VR0001/template\default\member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2956861eb79cd3c17d0-89878119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bf967cc45a95757375a9e6c5b0d3d1430221cef' => 
    array (
      0 => 'D:/VR/VR0001/template\\default\\member.tpl',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2956861eb79cd3c17d0-89878119',
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
  'unifunc' => 'content_61eb79cd3debc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61eb79cd3debc')) {function content_61eb79cd3debc($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/library/header.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/member/".($_smarty_tpl->tpl_vars['module']->value).".lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/library/footer.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>