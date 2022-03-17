<?php /* Smarty version Smarty-3.1.7, created on 2018-12-10 10:58:20
         compiled from "D:/phpStudy/WWW/vradmin/template\lib\tag.lbi" */ ?>
<?php /*%%SmartyHeaderCode:156645b3c40fd06c352-59192367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15b05a836a951f8618090856d8c25517220e4925' => 
    array (
      0 => 'D:/phpStudy/WWW/vradmin/template\\lib\\tag.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156645b3c40fd06c352-59192367',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b3c40fd0be3d',
  'variables' => 
  array (
    'act' => 0,
    '_lang' => 0,
    'row' => 0,
    'type' => 0,
    'res' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3c40fd0be3d')) {function content_5b3c40fd0be3d($_smarty_tpl) {?><style>
	.del{
		margin-left: 20px;
		color: #c40000;
		cursor: pointer;
	}
</style>
<?php if ($_smarty_tpl->tpl_vars['act']->value=='profile'){?>
			<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=tag" method="post" id="uform" enctype="multipart/form-data">
				<table class="tableBasic" border="0" cellpadding="4" cellspacing="0"  width="100%">
					<tbody>
					<?php if ($_smarty_tpl->tpl_vars['row']->value['id']>0){?>
					<tr>
						<th width="120"><i class="require-red">*</i>标签ID：</th>
						<td>
							<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>

						</td>
					</tr>
					<?php }?>
						<tr>
							<th width="120" height="50"><i class="require-red">*</i>标签名称：</th>
							<td>
								<input class="common-text required" name="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" type="text">
								　<span >请输入1到10位的字符</span>
							</td>
						</tr>
					
						<?php if ($_smarty_tpl->tpl_vars['row']->value['id']>0){?>
							<tr>
								<th height="50">类别：</th>
								<td><?php if ($_smarty_tpl->tpl_vars['row']->value['type']==1){?>图片<?php }else{ ?>视频<?php }?></td>
							</tr>
							<?php }else{ ?>
							<tr>
								<th height="50">选择类别：</th>
								<td>
									<select name="type">
										<option value="1">图片</option>
										<option value="2">视频</option>
									</select>
								</td>
							</tr>
						<?php }?>
						<tr>
							<th width="120" height="50"><i class="require-red">*</i>排序：</th>
							<td>
								<input class="common-text required" name="sort" value="<?php if (!$_smarty_tpl->tpl_vars['row']->value){?>99<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['sort'];?>
<?php }?>" type="text" style="width:46px">　
								<span >排序越小越靠前</span>
							</td>
						</tr>
						
						<tr>
							<th></th>
							<td>
							    <div id="wrong_text" class="warning" style="display:none"></div>
								<div class="clear"></div>
							    <input type="hidden" name="tid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
							     <input type="hidden" name="act" value="doedit">
								<input type="button" class="btn btn-primary btn6 " value="提交" id="sub_btn" onclick="javascript:ajaxFormSubmit('uform','提交');">
								<input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
							</td>
						</tr>
					</tbody></table>
			</form>
 <?php }else{ ?>
	   <h3>
	   <a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=tag&act=profile" class="actionBtn add">添加标签</a>
	   <form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=tag" method="post">
			<table>
				<tr>
					<th width="60">分类:</th>
					<td>
					  <select name="type">
					  		<option value="0">请选择分类</option>
					  		<option value="1" <?php if ($_smarty_tpl->tpl_vars['type']->value==1){?>selected="selected"<?php }?>>图片</option>
					  		<option value="2" <?php if ($_smarty_tpl->tpl_vars['type']->value==2){?>selected="selected"<?php }?>>视频</option>
					  </select>
					</td>
					<td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
				</tr>
			</table>
		</form>
		</h3>
		<table  class="tableBasic" border="0" cellpadding="8" cellspacing="0"  width="100%;">
			<tr>
				<th class="tc">标签ID</th>
				<th>名称</th>
				<th>类别</th>
				<th>排序</th>
				<th>操作</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['res']->value['res']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<tr style="text-align:center;">
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td> 
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td> 
				<td><?php if ($_smarty_tpl->tpl_vars['v']->value['type']==1){?>图片<?php }else{ ?>视频<?php }?></td> 
			    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
</td>
				<td><a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=tag&act=profile&tid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">编辑</a><a onclick="delete_tag(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
)" class="del">删除</a></td>
			</tr>
			<?php } ?>
		</table>
		<div class="list-page"><?php echo $_smarty_tpl->getSubTemplate ("lib/pages.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
		<script>
			function delete_tag(tid){
				  if(confirm("确认删除该标签吗？")){
				  	$.post("/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=tag",
				  		{
				  			"act":"delete",
				  			"tid":tid
				  		},function(data){
				  			data = eval("("+data+")");
				  			if (data.status==1) {
				  			    alert('成功删除标签');
				  			    window.location.reload();
	  						}else{
	  							alert(data.msg);
	  						}
				  		})
				  }
			}
		</script>
<?php }?>	<?php }} ?>