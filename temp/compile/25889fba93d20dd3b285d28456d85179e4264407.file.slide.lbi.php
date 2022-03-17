<?php /* Smarty version Smarty-3.1.7, created on 2018-12-10 10:26:19
         compiled from "D:/phpStudy/WWW/vradmin/template\lib\slide.lbi" */ ?>
<?php /*%%SmartyHeaderCode:293215b3c4103e10659-82515928%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25889fba93d20dd3b285d28456d85179e4264407' => 
    array (
      0 => 'D:/phpStudy/WWW/vradmin/template\\lib\\slide.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293215b3c4103e10659-82515928',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b3c4103e56b5',
  'variables' => 
  array (
    '_lang' => 0,
    'act' => 0,
    'list' => 0,
    'v' => 0,
    'slide' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3c4103e56b5')) {function content_5b3c4103e56b5($_smarty_tpl) {?><h3>
	<a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=slide&act=detail" class="actionBtn add">添加焦点图</a>
	<div style="height:36px"></div>
</h3>
<?php if ($_smarty_tpl->tpl_vars['act']->value=='list'){?>
	<table  class="tableBasic" border="0" cellpadding="8" cellspacing="0"  width="100%">
			<tr>
				<th width="200">焦点图名称</th>
				<th width="400">缩略图</th>
				<th>跳转链接</th>
				<th width="120">排序</th>
				<th width="120">操作</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
			 <tr>
				<td width="80"><?php echo $_smarty_tpl->tpl_vars['v']->value['img_name'];?>
</td>
				<td width="200"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['img_path'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['img_path'];?>
" style="height:100px"/></a></td>
				<td><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['link'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['link'];?>
</a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['sort_order'];?>
</td>
				<td width="120">
				<a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=slide&act=detail&sid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">编辑</a>　
				<a href="javascript:;" onClick="javascript:delete_slide(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
);">删除</a>
				</td>
			</tr>
			<?php } ?>
	</table>
	<script type="text/javascript">
	function delete_slide(sid){
		if(confirm("确认删除该图片吗？")){
			$.post("/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=slide&act=delete",{sid:sid},function(data){
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
/?m=slide" id="slide_form" method="post" enctype="multipart/form-data">
	<table  class="tableBasic" border="0" cellpadding="4" cellspacing="0"  width="100%">
			<tr>
				<th width="120"><i class="require-red">*</i> 图片名称</th>
				<td><input type="text" name="img_name" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['img_name'];?>
"></td>
			 </tr>
			 <tr>	
				<th><i class="require-red">*</i> 上传图片</th>
				<td>
					<link rel="stylesheet" href="/static/kindeditor/themes/default/default.css" />
		<script src="/static/kindeditor/kindeditor-min.js"></script>
		<script>
			KindEditor.ready(function(K) {
				var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : '/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/upload.php?act=slide',
					afterUpload : function(data) {
						if (data.error === 0) {
						    $("#img_path").attr('src',data.url);
							$("input[name='img_path']").val(data.url);
						} else {
							alert(data.message);
						}
					},
					afterError : function(str) {
						alert('自定义错误信息: ' + str);
					}
				});
				uploadbutton.fileBox.change(function(e) {
					uploadbutton.submit();
				});
			});
		</script>
		<img src="<?php if (empty($_smarty_tpl->tpl_vars['slide']->value['img_path'])){?>/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/template/images/default.png<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['slide']->value['img_path'];?>
<?php }?>" id="img_path" height="100px"/>
		<div class="clear" style="height:5px"></div>
		<input type="hidden" name="img_path" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['img_path'];?>
" />
		<input type="button" id="uploadButton" value="上传图片" />
		图片建议尺寸1920*420
				</td>
			</tr>
			<tr>	
				<th>跳转链接</th>
				<td>
					<input type="text" name="link" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['link'];?>
" style="width:350px"/>　
					不跳转请保持为空
				</td>
			</tr>
			<tr>	
				<th><i class="require-red">*</i> 排序</th>
				<td>
					<input type="text" name="sort_order" value="<?php if (!$_smarty_tpl->tpl_vars['slide']->value){?>99<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['slide']->value['sort_order'];?>
<?php }?>" style="width:60px"/> 　
					排序越小越靠前
				</td>
			</tr>
			<tr>
				<th></th>
				<td>
					<div id="wrong_text" class="warning" style="display:none"></div>
					<div class="clear"></div>
					<input type="hidden" name="act" value="detail">
					<input type="hidden" name="sid" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['id'];?>
">
					<input type="button" class="btn" value="提交" id="sub_btn" onclick="javascript:ajaxFormSubmit('slide_form','提交');">
					<input class="btn" onClick="history.go(-1)" value="返回" type="button">
				</td>
			</tr>
	</table>
	</form>
<?php }?><?php }} ?>