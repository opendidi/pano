<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:33:39
         compiled from "F:/0766city/vradmin/template\lib\reward.lbi" */ ?>
<?php /*%%SmartyHeaderCode:273925b457a9314f657-54733802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f2b851db63e5c3cb764cbda08d04078a4d59872' => 
    array (
      0 => 'F:/0766city/vradmin/template\\lib\\reward.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273925b457a9314f657-54733802',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'uid' => 0,
    'wid' => 0,
    'res' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457a9319749',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457a9319749')) {function content_5b457a9319749($_smarty_tpl) {?><style>
	.num_edit{
		float:right;
		margin-right:10px;
		cursor: pointer;
	}
</style> 
<h3>
<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=reward" method="post">
	<table>
		<tr>
			<th width="60">作者ID:</th>
			<td>
			   <input class="common-text" placeholder="请输入作者ID" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" size="10" type="text"/> 
			</td>
			<th width="60">项目ID:</th>
			<td>
			   <input class="common-text" placeholder="请输入项目ID" name="wid" value="<?php echo $_smarty_tpl->tpl_vars['wid']->value;?>
" type="text"/> 
			</td>
			<td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
		</tr>
	</table>
</form>
</h3>			
<table class="tableBasic" border="0" cellpadding="8" cellspacing="0"  width="100%" >
	<tr>
		<th class="tc">项目ID</th>
		<th>作者ID</th>
		<th>打赏金额</th>
		<th>头像</th>
		<th>昵称</th>
		<th>来源城市</th>
		<th>时间</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['res']->value['res']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	<tr style="text-align: center;">
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['pid'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
</td>
		<td style="width: 80px;" ><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</td>
		<td style="width: 110px;cursor: pointer;"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['head_img'];?>
" width="48"></td>
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['nickname'];?>
</td> 
		<td style="width: 150px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['province'];?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['city'];?>
</td>
		<td style="width: 120px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['create_time'];?>
</td>	 
	</tr>
	<?php } ?>
</table>
<div class="list-page"><?php echo $_smarty_tpl->getSubTemplate ("lib/pages.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
<?php }} ?>