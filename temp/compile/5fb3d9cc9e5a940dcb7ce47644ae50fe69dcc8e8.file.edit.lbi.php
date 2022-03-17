<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:00
         compiled from "plugin\reward\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:3091260dfbbb8f03ed2-86025199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fb3d9cc9e5a940dcb7ce47644ae50fe69dcc8e8' => 
    array (
      0 => 'plugin\\reward\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3091260dfbbb8f03ed2-86025199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb90422f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb90422f')) {function content_60dfbbb90422f($_smarty_tpl) {?><div class="col-md-4">
    <label name="reward_lable"  class="col-md-6 control-label">允许打赏</label>
    <div name="reward_wrap"  class="col-md-6" data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="允许浏览者打赏"<?php }?>>
     <input id="reward" name="switch_checkbox" class="form-control" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>disabled<?php }?>/>
</div>
</div>
<script>
	$(function(){
		//向main_edit.js 注册初始化方法
		plugins_init_function.push(reward_init);
		plugins_config_get_function.push(reward_get);
	})
	function reward_init(){
    	$("#reward").bootstrapSwitch('state', panoConfig.reward=='1' ? true : false);
	}
	function reward_get(panoConfig){
	    panoConfig.reward =  $("#reward").bootstrapSwitch('state') ? 1 : 0;
	}
</script>
<?php }} ?>