<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\reward\template\resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:303275b457aa92c91c5-18352559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd84af3c41db4cebffbbef7a8e963b67d78490b86' => 
    array (
      0 => 'plugin\\reward\\template\\resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303275b457aa92c91c5-18352559',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa92cc0e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa92cc0e')) {function content_5b457aa92cc0e($_smarty_tpl) {?><script type="text/javascript">
$(function(){
	plugins_init_function.push(reward_init);
})
function reward_init(data){
	 if (data.reward=="1") {
            $(".btn_reward").show();
     }
}
</script><?php }} ?>