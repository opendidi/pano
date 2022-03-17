<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\share\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:2084760dfbbb928adf5-60825869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3bcda9c2bd8c830d1dd14f46a8fef15bd5f6156' => 
    array (
      0 => 'plugin\\share\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2084760dfbbb928adf5-60825869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb92b3ab',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb92b3ab')) {function content_60dfbbb92b3ab($_smarty_tpl) {?><div class="col-md-4">
     <label class="col-md-6 control-label">隐藏分享</label>
    <div class="col-md-6" data-toggle="tooltip"  <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="在全景页面显示点赞"<?php }?>>
        <input id="share" name="switch_checkbox" class="form-control" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>disabled<?php }?>/>
    </div>
</div>

<script>
	$(function(){
		//向main_edit.js 注册初始化方法
		plugins_init_function.push(share_init);
		plugins_works_get_function.push(share_get);
	})
	function share_init(){
		$("#share").bootstrapSwitch('state', worksmain.hideshare_flag=='1'?true:false);
	}
	function share_get(worksMaindata){
		worksMaindata.hideshare_flag = $("#share").bootstrapSwitch('state')?1:0;
	}
</script><?php }} ?>