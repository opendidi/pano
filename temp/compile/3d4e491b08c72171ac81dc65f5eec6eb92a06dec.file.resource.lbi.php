<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\showvrglass\template\resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:269815b457aa9287b32-78542884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d4e491b08c72171ac81dc65f5eec6eb92a06dec' => 
    array (
      0 => 'plugin\\showvrglass\\template\\resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269815b457aa9287b32-78542884',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa928ad7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa928ad7')) {function content_5b457aa928ad7($_smarty_tpl) {?><script>
$(function(){
	plugins_init_function.push(showvrglass_init);
})
function showvrglass_init(data,settings){
	settings['skin_settings.webvr'] = data.hidevrglasses_flag==1 ? false : true;
}
function showWebvrBtn(){
    $('.btn_vrmode').show();
}
</script><?php }} ?>