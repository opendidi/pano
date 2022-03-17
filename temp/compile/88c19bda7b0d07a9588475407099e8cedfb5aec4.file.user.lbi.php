<?php /* Smarty version Smarty-3.1.7, created on 2018-12-10 10:58:14
         compiled from "D:/phpStudy/WWW/vradmin/template\lib\user.lbi" */ ?>
<?php /*%%SmartyHeaderCode:276685b3c443eb1e7d1-11979670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88c19bda7b0d07a9588475407099e8cedfb5aec4' => 
    array (
      0 => 'D:/phpStudy/WWW/vradmin/template\\lib\\user.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276685b3c443eb1e7d1-11979670',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b3c443eb7c3d',
  'variables' => 
  array (
    'act' => 0,
    '_lang' => 0,
    'row' => 0,
    'level_groups' => 0,
    'group' => 0,
    'uid' => 0,
    'levels' => 0,
    'k' => 0,
    'level' => 0,
    'v' => 0,
    'phone' => 0,
    'nickname' => 0,
    'res' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3c443eb7c3d')) {function content_5b3c443eb7c3d($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['act']->value=='profile'){?>
			<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=user" method="post" id="uform" enctype="multipart/form-data">
				<table class="tableBasic" border="0" cellpadding="4" cellspacing="0"  width="100%">
					<tbody>
					<?php if ($_smarty_tpl->tpl_vars['row']->value['pk_user_main']>0){?>
					<tr>
						<th width="120"><i class="require-red">*</i>会员ID：</th>
						<td>
							<?php echo $_smarty_tpl->tpl_vars['row']->value['pk_user_main'];?>

						</td>
					</tr>
					<tr>
						<th width="120"><i class="require-red">*</i>头像：</th>
						<td>
							<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['avatar'];?>
" width="108" height="108">
						</td>
					</tr>
					<?php }?>
						<tr>
							<th width="120"><i class="require-red">*</i>登录手机：</th>
							<td>
								<input class="common-text required" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
" type="text">
								　<span class="red">手机号是用户登录的唯一凭证</span>
							</td>
						</tr>
						<tr>
							<th width="120"><?php if (!$_smarty_tpl->tpl_vars['row']->value['pk_user_main']){?><i class="require-red">*</i><?php }?>登录密码：</th>
							<td>
								<input class="common-text required" name="passwd" type="password">　
								不修改请保持为空
							</td>
						</tr>
						<tr>
							<th><i class="require-red">*</i>昵称：</th>
							<td><input class="common-text required" name="nickname" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['nickname'];?>
" type="text"></td>
						</tr>
						<tr>
							<th><i class="require-red">*</i>账户余额：</th>
							<td><input class="common-text required" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['amount'];?>
" type="text"></td>
						</tr>
						
						<?php if ($_smarty_tpl->tpl_vars['row']->value['pk_user_main']>0){?>
						<tr>
							<th>注册时间：</th>
							<td><?php echo $_smarty_tpl->tpl_vars['row']->value['create_time'];?>
</td>
						</tr>
						<tr>
							<th>最后登录：</th>
							<td><?php echo $_smarty_tpl->tpl_vars['row']->value['last_time'];?>
</td>
						</tr>
						<?php }?>
						<tr>
							<th>用户组：</th>
							<td>
								<select name="level" id="level">
									<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['level_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['group']->value['id']==$_smarty_tpl->tpl_vars['row']->value['level']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['group']->value['level_name'];?>
</option>
									<?php } ?>
								}
								</select>　
								编辑会员用户组后，会员须退出重新登录才能生效
							</td>
						</tr>
						<tr>
							<th>项目数量上限：</th>
							<td>
								<input class="common-text required" name="limit_num" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['limit_num'];?>
" />　
								允许用户发布的全景项目数量上限，为0则不限制；大于0时，用户上传的全景项目将无法删除
							</td>
						</tr>
						<tr>
							<th>屏蔽项目：</th>
							<td><input type="checkbox" name="state" <?php if ($_smarty_tpl->tpl_vars['row']->value['state']==1){?>checked<?php }?> value="1">　<span class="red">屏蔽项目后，该用户发表的所有全景项目都将禁止展现</span></td>
						</tr>
						<tr>
							<th></th>
							<td>
							    <div id="wrong_text" class="warning" style="display:none"></div>
								<div class="clear"></div>
							    <input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['pk_user_main'];?>
">
								<input type="hidden" name="act" value="edit_profile">
								<input type="button" class="btn btn-primary btn6 mr10" value="提交" id="sub_btn" onclick="javascript:ajaxFormSubmit('uform','提交');">
								<input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
							</td>
						</tr>
					</tbody></table>
			</form>
 <?php }else{ ?>
	   <h3>
	   <a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=user&act=profile" class="actionBtn add">添加会员</a>
	   <form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=user" method="post">
			<table>
				<tr>
					<th width="60">会员ID:</th>
					<td>
					   <input  placeholder="请输入会员ID" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" size="10" type="text"/> 
					</td>
					<th width="60">用户组:</th>
					<td>
						<select name="level">
							<option value="0">所有用户</option>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['levels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['level']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
							<?php } ?>
						</select>
					</td>
					<th width="60">手机号:</th>
					<td><input placeholder="请输入会员手机号" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" type="text"></td>
					<th width="60">昵称:</th>
					<td>
					   <input placeholder="请输入会员昵称" name="nickname" value="<?php echo $_smarty_tpl->tpl_vars['nickname']->value;?>
" type="text"/> 
					</td>
					<td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
				</tr>
			</table>
		</form>
		</h3>
		<table  class="tableBasic" border="0" cellpadding="8" cellspacing="0"  width="100%">
			<tr>
				<th class="tc">会员ID</th>
				<th>昵称</th>
				<th>手机号</th>
				<th>用户组</th>
				<th>注册时间</th>
				<th>操作</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['res']->value['res']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['pk_user_main'];?>
</td> 
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['nickname'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['phone'];?>
</td> 
				<td><?php echo $_smarty_tpl->tpl_vars['levels']->value[$_smarty_tpl->tpl_vars['v']->value['level']];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['create_time'];?>
</td> 
				<td><a class="red" href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=user&act=profile&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['pk_user_main'];?>
">编辑</a></td>
			</tr>
			<?php } ?>
		</table>
		<div class="list-page"><?php echo $_smarty_tpl->getSubTemplate ("lib/pages.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
<?php }?>	<?php }} ?>