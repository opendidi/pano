<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\footmarker\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:882060dfbbb90a6c49-45767007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '627126f69e314940a0955c4ea56dbc297e7420f4' => 
    array (
      0 => 'plugin\\footmarker\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '882060dfbbb90a6c49-45767007',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb9103f1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb9103f1')) {function content_60dfbbb9103f1($_smarty_tpl) {?> <div class="col-md-4">
      <label class="col-md-6 control-label">足迹</label>
    <div class="col-md-6" data-toggle="tooltip"  <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="是否显示足迹"<?php }?>>
        <input id="footmark" name="switch_checkbox" class="form-control" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>disabled<?php }?>/>
    </div>
</div>
<script>
	$(function(){
		//向main_edit.js 注册初始化方法
		plugins_init_function.push(footmark_init);
		plugins_config_get_function.push(footmark_get);
	})
	function footmark_init(){
		$("#footmark").bootstrapSwitch('state', panoConfig.footmark=='1'?true:false);
	}
	function footmark_get(panoConfig){
		panoConfig.footmark = $("#footmark").bootstrapSwitch('state')?1:0;
	}
</script><?php }} ?>