<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\showlogo\template\resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:220935b457aa9297566-02875113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e663afac247e53f1e7e076d31013df561c607f5' => 
    array (
      0 => 'plugin\\showlogo\\template\\resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220935b457aa9297566-02875113',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa92a4bd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa92a4bd')) {function content_5b457aa92a4bd($_smarty_tpl) {?><script>
$(function(){
	plugins_init_function.push(showlogo_init);
})
function showlogo_init(data){
	if(data.hidelogo_flag=='1'){
        $("#logoImg").hide();
    }else{
    	$("#logoImg").show();
    }
}
</script><?php }} ?>