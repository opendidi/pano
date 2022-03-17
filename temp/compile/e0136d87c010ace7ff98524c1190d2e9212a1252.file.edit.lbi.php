<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:00
         compiled from "plugin\comment\template\edit.lbi" */ ?>
<?php /*%%SmartyHeaderCode:570860dfbbb8ea2149-96557299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0136d87c010ace7ff98524c1190d2e9212a1252' => 
    array (
      0 => 'plugin\\comment\\template\\edit.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '570860dfbbb8ea2149-96557299',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb8eff5f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb8eff5f')) {function content_60dfbbb8eff5f($_smarty_tpl) {?><div class="col-md-4">
     <label class="col-md-6 control-label">显示说一说</label>
    <div class="col-md-6" data-toggle="tooltip" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>title="您当前没有该权限"<?php }else{ ?>title="打开全景时默认显示说一说"<?php }?>>
        <input id="comment" name="switch_checkbox" class="form-control" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['v']->value['level_enable']==0){?>disabled<?php }?>/>
    </div>
</div>

<script>
	$(function(){
		//向main_edit.js 注册初始化方法
		plugins_init_function.push(comment_init);
		plugins_config_get_function.push(comment_get);
	})
	function comment_init(){
		$("#comment").bootstrapSwitch('state', panoConfig.comment=='1'?true:false);
	}
	function comment_get(panoConfig){
		panoConfig.comment = $("#comment").bootstrapSwitch('state')?1:0;
	}
</script><?php }} ?>