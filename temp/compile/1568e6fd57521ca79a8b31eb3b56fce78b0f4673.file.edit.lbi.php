<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\profile\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1261560dfbbb9200af5-15500786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1568e6fd57521ca79a8b31eb3b56fce78b0f4673' => 
    array (
      0 => 'plugin\\profile\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1261560dfbbb9200af5-15500786',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb922941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb922941')) {function content_60dfbbb922941($_smarty_tpl) {?><div class="col-md-4">
     <label class="col-md-6 control-label">隐藏简介</label>
    <div class="col-md-6" data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="在全景页面显示项目简介"<?php }?>>
        <input id="profile" name="switch_checkbox" class="form-control" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>disabled<?php }?>/>
    </div>
</div>

<script>
	$(function(){
		//向main_edit.js 注册初始化方法
		plugins_init_function.push(profile_init);
		plugins_works_get_function.push(profile_get);
	})
	function profile_init(){
		$("#profile").bootstrapSwitch('state', worksmain.hideprofile_flag=='1'?true:false);
	}
	function profile_get(worksMaindata){
		worksMaindata.hideprofile_flag = $("#profile").bootstrapSwitch('state')?1:0;
	}
</script><?php }} ?>