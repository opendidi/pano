<?php /* Smarty version Smarty-3.1.7, created on 2022-01-22 11:19:55
         compiled from "D:/VR/VR0001/vradmin/template\lib\passwd.lbi" */ ?>
<?php /*%%SmartyHeaderCode:2472061eb77db59d073-62321665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bdc641a8f28d1110ef83178265c2f6732b008c1' => 
    array (
      0 => 'D:/VR/VR0001/vradmin/template\\lib\\passwd.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2472061eb77db59d073-62321665',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_61eb77db5d8b4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61eb77db5d8b4')) {function content_61eb77db5d8b4($_smarty_tpl) {?><div class="main-wrap">

    <div class="result-wrap">
		<div class="result-content">
			<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=passwd" method="post" id="uform" enctype="multipart/form-data">
				<table class="tableBasic" border="0" cellpadding="4" cellspacing="0"  width="100%">
					<tbody>
						<tr>
							<th width="120"><i class="require-red">*</i>原密码：</th>
							<td>
								<input class="common-text required" name="oldpwd" type="password">
							</td>
						</tr>
						<tr>
							<th width="120"><?php if (!$_smarty_tpl->tpl_vars['row']->value['id']){?><i class="require-red">*</i><?php }?>新密码：</th>
							<td>
								<input class="common-text required" name="newpwd" type="password">
							</td>
						</tr>
						<tr>
							<th width="120"><?php if (!$_smarty_tpl->tpl_vars['row']->value['id']){?><i class="require-red">*</i><?php }?>重复密码：</th>
							<td>
								<input class="common-text required" name="confirmpwd" type="password">
							</td>
						</tr>
						<tr>
							<th></th>
							<td>
							    <div id="wrong_text" class="warning" style="display:none"></div>
								<div class="clear"></div>
								<input type="button" class="btn btn-primary btn6 mr10" value="提交" id="sub_btn" onclick="javascript:ajaxFormSubmit('uform','提交');">
								<input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
							</td>
						</tr>
					</tbody></table>
			</form>
		</div>
    </div>
    
</div><?php }} ?>