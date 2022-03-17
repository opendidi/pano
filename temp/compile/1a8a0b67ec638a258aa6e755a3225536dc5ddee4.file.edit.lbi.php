<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\showviewnum\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1862460dfbbb9185470-28828999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a8a0b67ec638a258aa6e755a3225536dc5ddee4' => 
    array (
      0 => 'plugin\\showviewnum\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1862460dfbbb9185470-28828999',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb918d1f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb918d1f')) {function content_60dfbbb918d1f($_smarty_tpl) {?> <div class="col-md-4">
     <label name="namehot"  class="col-md-6 control-label">隐藏人气</label>
    <div name="namehot"  class="col-md-6" data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="隐藏人气"<?php }?>>
        <input id="showviewnum" name="switch_checkbox" class="form-control" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>disabled<?php }?>/>
    </div>
</div>
<script>
	$(function(){
		//向main_edit.js 注册初始化方法
		plugins_init_function.push(showviewnum_init);
		plugins_works_get_function.push(showviewnum_get);
	})
	function showviewnum_init(){
    	$("#showviewnum").bootstrapSwitch('state', worksmain.hideviewnum_flag=='1'?true:false);
	}
	function showviewnum_get(worksMaindata){
	    worksMaindata.hideviewnum_flag =  $("#showviewnum").bootstrapSwitch('state')?1:0;
	}
</script>
<?php }} ?>