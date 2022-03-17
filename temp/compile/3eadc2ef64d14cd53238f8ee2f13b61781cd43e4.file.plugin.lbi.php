<?php /* Smarty version Smarty-3.1.7, created on 2018-12-10 10:23:02
         compiled from "D:/phpStudy/WWW/vradmin/template\lib\plugin.lbi" */ ?>
<?php /*%%SmartyHeaderCode:103025b3c40ff7b37d5-40821912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eadc2ef64d14cd53238f8ee2f13b61781cd43e4' => 
    array (
      0 => 'D:/phpStudy/WWW/vradmin/template\\lib\\plugin.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103025b3c40ff7b37d5-40821912',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b3c40ff7fdb5',
  'variables' => 
  array (
    'pid' => 0,
    'plugins' => 0,
    'v' => 0,
    '_lang' => 0,
    'k' => 0,
    'plugin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3c40ff7fdb5')) {function content_5b3c40ff7fdb5($_smarty_tpl) {?><div id="idTabs">
   <?php if (empty($_smarty_tpl->tpl_vars['pid']->value)){?>
   <ul class="tab">
    <li><a href="javascript:;" class="selected">管理插件</a></li>
   </ul>
   <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%;">
			<tr>
				<th width="200">插件名称</th>
				<th>插件描述</th>
				<th width="100">是否启用</th>
				<th width="200">操作</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['plugins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<tr>
				<td width="200"><?php echo $_smarty_tpl->tpl_vars['v']->value['plugin_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['brief'];?>
</td>
				<td><img src="/static/images/ico/<?php if ($_smarty_tpl->tpl_vars['v']->value['enable']==1){?>yes.gif<?php }else{ ?>no.gif<?php }?>"/></td>
				<td width="200"><a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=plugin&pid=<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">编辑</a></td>
			</tr>
			<?php } ?>
   </table>
   <?php }else{ ?>
    <form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=plugin" id="plugin_form" method="post" enctype="multipart/form-data">
	<table  class="tableBasic" border="0" cellpadding="4" cellspacing="0"  width="100%">
			<tr>
				<th width="120"><i class="require-red">*</i> 插件名称</th>
				<td><?php echo $_smarty_tpl->tpl_vars['plugin']->value['plugin_name'];?>
</td>
			 </tr>
			 <tr>	
				<th><i class="require-red">*</i> 描　　述</th>
				<td>
					<textarea name="brief" cols="40" rows="5" class="textArea" placeholder="关于插件的功能，使用说明等"><?php echo $_smarty_tpl->tpl_vars['plugin']->value['brief'];?>
</textarea>
				</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['pid']->value=='custom_logo'){?>
			<tr>
			 <th align="right">默认logo</th>
			  <td>	
			    <link rel="stylesheet" href="/static/kindeditor/themes/default/default.css" />
				<script src="/static/kindeditor/kindeditor-min.js"></script>
				<script>
					KindEditor.ready(function(K) {
						var uploadbutton = K.uploadbutton({
							button : K('#uploadButton')[0],
							fieldName : 'imgFile',
							url : '/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=system&act=custom_logo',
							afterUpload : function(data) {
								if (data.error === 0) {
									$("#custom_logo").attr('src','/plugin/custom_logo/images/custom_logo.png?v'+(new Date().getTime()));
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
				<img src="/plugin/custom_logo/images/custom_logo.png" id="custom_logo" height="100px"/>
				<div class="clear" style="height:5px"></div>
				<input type="button" id="uploadButton" value="上传图片" />
			  </td>
			 </tr> 
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['pid']->value=='shade_sky_floor'){?>
			<tr>
			 <th align="right">默认补天补地图标</th>
			  <td>	
			    <link rel="stylesheet" href="/static/kindeditor/themes/default/default.css" />
				<script src="/static/kindeditor/kindeditor-min.js"></script>
				<script>
					KindEditor.ready(function(K) {
						var uploadbutton = K.uploadbutton({
							button : K('#uploadButton')[0],
							fieldName : 'imgFile',
							url : '/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=system&act=shade_sky_floor',
							afterUpload : function(data) {
								if (data.error === 0) {
									$("#shade_sky_floor").attr('src','/plugin/shade_sky_floor/images/shade_sky_floor.png?v'+(new Date().getTime()));
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
				<img src="/plugin/shade_sky_floor/images/shade_sky_floor.png" id="shade_sky_floor" height="100px"/>
				<div class="clear" style="height:5px"></div>
				<input type="button" id="uploadButton" value="上传图片" />
			  </td>
			 </tr> 
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['plugin']->value['edit_container']=='option_group'){?>
			<tr>	
				<th><i class="require-red">*</i> 默认值</th>
				<td>
				  <label><input type="radio" name="default" value="1" <?php if ($_smarty_tpl->tpl_vars['plugin']->value['default']==1){?>checked<?php }?>> on</label>　
				  <label><input type="radio" name="default" value="0" <?php if (isset($_smarty_tpl->tpl_vars['plugin']->value['default'])&&$_smarty_tpl->tpl_vars['plugin']->value['default']==0){?>checked<?php }?>> off</label>
				</td>
			</tr>
			<?php }?>
			<tr>	
				<th><i class="require-red">*</i> 是否启用</th>
				<td>
				  <label><input type="radio" name="enable" value="1" <?php if ($_smarty_tpl->tpl_vars['plugin']->value['enable']==1){?>checked<?php }?>> 是</label>　
				  <label><input type="radio" name="enable" value="0" <?php if ($_smarty_tpl->tpl_vars['plugin']->value['enable']==0){?>checked<?php }?>> 否</label>
				</td>
			</tr>
			<tr>
				<th></th>
				<td>
					<div id="wrong_text" class="warning" style="display:none"></div>
					<div class="clear"></div>
					<input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
					<input type="button" class="btn" value="提交" id="sub_btn" onclick="javascript:ajaxFormSubmit('plugin_form','提交');">
					<input class="btn" onClick="history.go(-1)" value="返回" type="button">
				</td>
			</tr>
	</table>
	</form>
   <?php }?>
</div>   <?php }} ?>