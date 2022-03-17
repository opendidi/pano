<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\showviewnum\template\resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:56155b457aa93a1d98-76237598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60b832fcf0b374974a012b8fbdd6ec97686f9085' => 
    array (
      0 => 'plugin\\showviewnum\\template\\resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56155b457aa93a1d98-76237598',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa93a4df',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa93a4df')) {function content_5b457aa93a4df($_smarty_tpl) {?><script>
$(function(){
	plugins_init_function.push(showviewnum_init);
})
function showviewnum_init(data){
	if(data.hideviewnum_flag=='1'){
        $("#viewnumDiv").hide();
    }
    
  
}
</script><?php }} ?>