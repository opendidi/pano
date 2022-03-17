<?php /* Smarty version Smarty-3.1.7, created on 2018-12-10 10:22:57
         compiled from "D:/phpStudy/WWW/vradmin/template\lib\level.lbi" */ ?>
<?php /*%%SmartyHeaderCode:215445c0dce01283b73-76756555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34fa165cd7685ef97071d6d220d6659f210f83ca' => 
    array (
      0 => 'D:/phpStudy/WWW/vradmin/template\\lib\\level.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215445c0dce01283b73-76756555',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'act' => 0,
    'list' => 0,
    'v' => 0,
    'v2' => 0,
    'level_desc' => 0,
    'plugins' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5c0dce0132def',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c0dce0132def')) {function content_5c0dce0132def($_smarty_tpl) {?><h3>
	<a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=level&act=detail" class="actionBtn add">添加用户组</a>
	<div style="height:36px"></div>
</h3>
<?php if ($_smarty_tpl->tpl_vars['act']->value=='list'){?>
	<table  class="tableBasic" border="0" cellpadding="8" cellspacing="0"  width="100%">
			<tr>
				<th width="80">组ID</th>
				<th width="200">组名称</th>
				<th>模块权限</th>
				<th width="120">操作</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
			 <tr>
				<td width="80"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
<?php if ($_smarty_tpl->tpl_vars['v']->value['id']==1){?>(不可删除)<?php }?></td>
				<td width="200"><?php echo $_smarty_tpl->tpl_vars['v']->value['level_name'];?>
</td>
				<td>
					<?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v']->value['privileges_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
$_smarty_tpl->tpl_vars['v2']->_loop = true;
?>
						<label style="display:inline-table"><input type="checkbox" checked="checked"><?php echo $_smarty_tpl->tpl_vars['v2']->value;?>
　</label>
					<?php } ?>
				</td>
				<td width="120">
				<a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=level&act=detail&level=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">编辑</a>　
				<a href="javascript:;" onClick="javascript:delete_user_level(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
);">删除</a>
				</td>
			</tr>
			<?php } ?>
	</table>
	<script type="text/javascript">
	function delete_user_level(level){
		if(confirm("确认删除该用户组吗？")){
			$.post("/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=level&act=delete",{level:level},function(data){
				var data = json_decode(data);
				alert(data.msg);
				if(data.status==1){
					window.location.reload();
				}
			});
		}
	}
	</script>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['act']->value=='detail'){?>
    <form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=level" id="level_form" method="post" enctype="multipart/form-data">
	<table  class="tableBasic" border="0" cellpadding="4" cellspacing="0"  width="100%">
			<tr>
				<th width="120"><i class="require-red">*</i> 组名称</th>
				<td><input type="text" name="level_name" value="<?php echo $_smarty_tpl->tpl_vars['level_desc']->value['level_name'];?>
"></td>
			 </tr>
			 <tr>	
				<th><i class="require-red">*</i> 组权限</th>
				<td>
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['plugins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
						<label style="display:inline-table"><input type="checkbox" name="privileges[]" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->tpl_vars['level_desc']->value['privileges'])){?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['v']->value['plugin_name'];?>
</label>　
					<?php } ?>
				</td>
			</tr>
			<tr>
				<th></th>
				<td>
					<div id="wrong_text" class="warning" style="display:none"></div>
					<div class="clear"></div>
					<input type="hidden" name="act" value="detail">
					<input type="hidden" name="level" value="<?php echo $_smarty_tpl->tpl_vars['level_desc']->value['id'];?>
">
					<input type="button" class="btn" value="提交" id="sub_btn" onclick="javascript:ajaxFormSubmit('level_form','提交');">
					<input class="btn" onClick="history.go(-1)" value="返回" type="button">
				</td>
			</tr>
	</table>
	</form>
<?php }?><?php }} ?>