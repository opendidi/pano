<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:20:41
         compiled from "D:/VR/VR0002/vradmin/template\lib\system.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1926260dfbb69dce5b0-05224929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf18a55d74f06e932d3e8586b944a53f33e7ca18' => 
    array (
      0 => 'D:/VR/VR0002/vradmin/template\\lib\\system.lbi',
      1 => 1544409949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1926260dfbb69dce5b0-05224929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'k' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbb6a18705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbb6a18705')) {function content_60dfbb6a18705($_smarty_tpl) {?><script type="text/javascript">     
	$(function(){ $(".idTabs").idTabs(); }); 
</script>
<div class="idTabs">
  <ul class="tab">
	<li><a href="#main" class="selected">常规设置</a></li>
	<li><a href="#cdn" class="">存储设置</a></li>
	<li><a href="#sms" class="">短信设置</a></li>
	<li><a href="#weixin" class="">微信设置</a></li>
	<li><a href="#payment" class="">支付设置</a></li>
  </ul>
  <div class="items">
   
	<div id="main" style="display:block;">
	<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=system&act=main" id="set_main_form" method="post" enctype="multipart/form-data">
	<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
	 <tr>
	   <th width="131">名称</th>
	   <th>内容</th>
	 </tr>
			  <tr>
	  <td align="right">站点名称</td>
	  <td>
				  <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
" placeholder="站点名称，不要带有描述语" size="80" class="inpMain">
							</td>
	 </tr>
	          <tr>
	  <td align="right">站点关键词</td>
	  <td>
				  <input type="text" name="subtitle" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['subtitle'];?>
" placeholder="多个关键词请用英文逗号隔开，不超过5个关键词" size="80" class="inpMain">
							</td>
	 </tr>
	 		  <tr>
	  <td align="right">站点描述</td>
	  <td>
				  <textarea name="desciption" placeholder="莎莎源码https://dwz.cn/D3Gi47vE" rows="5" cols="50" style="padding:5px;border:1px solid #ddd;color:#999"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['desciption'];?>
</textarea>
							</td>
	 </tr>
			  <tr>
	  <td align="right">站点logo</td>
	  <td>		  
		<link rel="stylesheet" href="/static/kindeditor/themes/default/default.css" />
		<script src="/static/kindeditor/kindeditor-min.js"></script>
		<script>
			KindEditor.ready(function(K) {
				var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : '/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=system&act=site_logo',
					afterUpload : function(data) {
						if (data.error === 0) {
						    $("#site_logo").attr('src','/static/images/logo.png?v'+(new Date().getTime()));
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
		<img src="/static/images/logo.png" id="site_logo" height="50px"/>
		<div class="clear" style="height:5px"></div>
		<input type="button" id="uploadButton" value="上传图片" />
	 </tr>
			  <tr>
	  <td align="right">公司地址</td>
	  <td>
				  <input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['address'];?>
" size="80" class="inpMain">
							</td>
	 </tr>
			  <tr>
	  <td align="right">ICP备案证书号</td>
	  <td>
				  <input type="text" name="icp" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['icp'];?>
" size="80" class="inpMain">
							</td>
	 </tr>
			  <tr>
	  <td align="right">合作电话</td>
	  <td>
				  <input type="text" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['tel'];?>
" size="80" class="inpMain">
							</td>
	 </tr>
	  <tr>
	  <td align="right">客服QQ</td>
	  <td>
				  <input type="text" name="qq" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['qq'];?>
" size="80" class="inpMain">　请开启临时聊天功能
							</td>
	 </tr>
			  <tr>
	  <td align="right">URL 重写</td>
	  <td>
	   <label for="rewrite_1">
		<input type="radio" name="rewrite" checked="checked" value="1">
		是</label>
		<span class="cue ml">本站需Rewrite支持，apache为根目录下.htaccess，nginx为根目录下nginx.htaccess，iis为根目录下web.config
							 </td>
	 </tr>
	 <tr>
	  <td align="right">关闭注册</td>
	  <td>
		<label><input type="radio" name="close_reg" <?php if (!$_smarty_tpl->tpl_vars['_lang']->value['close_reg']){?>checked="checked"<?php }?> value="0"> 否</label>　
	  	<label><input type="radio" name="close_reg" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['close_reg']){?>checked="checked"<?php }?> value="1"> 是</label>　
	  </td>
	 </tr>
	 <tr>
	  <td align="right">临时关闭站点</td>
	  <td>
		<label><input type="radio" name="tempclose" <?php if (!$_smarty_tpl->tpl_vars['_lang']->value['tempclose']){?>checked="checked"<?php }?> value="0"> 否</label>　 
	    <label><input type="radio" name="tempclose" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['tempclose']){?>checked="checked"<?php }?> value="1"> 是</label>
	  </td>
	 </tr>
	 <tr>
	  <td align="right">开启多层切图</td>
	  <td>
		<label><input type="radio" name="multi_pano" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['multi_pano']){?>checked="checked"<?php }?> value="1"> 是</label>　 
	    <label><input type="radio" name="multi_pano" <?php if (!$_smarty_tpl->tpl_vars['_lang']->value['multi_pano']){?>checked="checked"<?php }?> value="0"> 否</label>
	    <!-- <span></span> -->
	  </td>
	 </tr>
	 <tr>
	  <td align="right">关闭站点原因</td>
	  <td><textarea name="closereason" cols="40" rows="5" class="textArea"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['closereason'];?>
</textarea></td>
	 </tr>
	 </table>
	 <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
	 <tr>
	  <td width="131"></td>
	  <td>
	   <div id="wrong_text" class="warning" style="display:none"></div>
	   <div class="clear"></div>
	   <input id="sub_btn" class="btn" onclick="javascript:ajaxFormSubmit('set_main_form','提交');" type="button" value="提交">
	  </td>
	 </tr>
	 </table>
	</form>
	</div>
	
	<div id="cdn" style="display: none;">
	<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=system&act=cdn" id="set_cdn_form" method="post" enctype="multipart/form-data">
	<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
	 <tbody><tr>
	   <th width="131">存储类型<?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_storage'];?>
</th>
	   <th>内容</th>
	 </tr>
	 <tr>
	  <td align="center"><label><input type="radio" name="global_storage" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['global_storage']=='qiniu'){?>checked<?php }?> value="qiniu" /> <?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_storage_type']['qiniu'];?>
</label></td>
	  <td style="padding:0;border:0">
	   	<table width="100%" cellpadding="8" cellspacing="0" class="tableBasic" style="border:0">
	    <tr>
		  <td width="100" align="right">存储区</td>
		  <td>
		  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_lang']->value['qiniu_zone']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
		   <label>
		    <input type="radio" name="qiniu[zone]" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['qiniu_config']['zone']==$_smarty_tpl->tpl_vars['k']->value){?>checked<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>

		   </label>　 
		  <?php } ?>
		  </td>
		 </tr>
		 <tr>
		  <td align="right">accessKey</td>
		  <td>
			<input type="text" name="qiniu[accessKey]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['qiniu_config']['accessKey'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">secretKey</td>
		  <td>
			<input type="text" name="qiniu[secretKey]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['qiniu_config']['secretKey'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">bucket</td>
		  <td>
			<input type="text" name="qiniu[bucket]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['qiniu_config']['bucket'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">CDN域名</td>
		  <td>
			<input type="text" name="qiniu[cdn_host]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['qiniu_config']['cdn_host'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td align="center"><label><input type="radio" name="global_storage" value="oss" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['global_storage']=='oss'){?>checked<?php }?>/> <?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_storage_type']['oss'];?>
</label></td>
	  <td style="padding:0;border:0">
	   	<table width="100%" cellpadding="8" cellspacing="0" class="tableBasic" style="border:0">
		 <tr>
		  <td width="100" align="right">存储区</td>
		  <td>
		  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_lang']->value['oss_zone']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
		   <label><input type="radio" name="oss[zone]" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['oss_config']['zone']==$_smarty_tpl->tpl_vars['k']->value){?>checked<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</label>　
		  <?php } ?>
		  </td>
		 </tr>
		 <tr>
		  <td width="100" align="right">是否内网</td>
		  <td>
		   <label><input type="radio" name="oss[internal]" value="1" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['oss_config']['internal']==1){?>checked<?php }?>> 是</label>　
		   <label><input type="radio" name="oss[internal]" value="0" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['oss_config']['internal']==0){?>checked<?php }?>> 否</label>
		  </td>
		 </tr>
		 <tr>
		  <td width="100" align="right">access_id</td>
		  <td>
			<input type="text" name="oss[access_id]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['oss_config']['access_id'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">access_secret</td>
		  <td>
			<input type="text" name="oss[access_secret]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['oss_config']['access_secret'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">bucket</td>
		  <td>
			<input type="text" name="oss[bucket]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['oss_config']['bucket'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">CDN域名</td>
		  <td>
			<input type="text" name="oss[cdn_host]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['oss_config']['cdn_host'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td align="center"><label><input type="radio" name="global_storage" value="local" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['global_storage']=='local'){?>checked<?php }?>/> <?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_storage_type']['local'];?>
</label></td>
	  <td style="padding:0;border:0"> 	
		<table width="100%" cellpadding="8" cellspacing="0" class="tableBasic" style="border:0">
		 <tr>
		  <td align="right" width="100">存储路径</td>
		  <td>
			<input type="text" name="local[dir_path]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['local_config']['dir_path'];?>
" size="80" class="inpMain">　
			"/"结尾，相对服务器的绝对路径，目录须存在且可写
		  </td>
		 </tr>
		 <tr>
		  <td align="right">访问域名</td>
		  <td>
			<input type="text" name="local[cdn_host]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['local_config']['cdn_host'];?>
" size="80" class="inpMain">　
			不带"http://"，结尾不加"/"
		  </td>
		 </tr>
		</table>
	  </td>
	 </tr>
	 </tbody>
	</table>
	<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
	 <tr>
	  <td width="131"></td>
	  <td>
	   <div id="wrong_text_cdn" class="warning" style="display:none"></div>
	   <div class="clear"></div>
	   <input  type="button" id="sub_btn_cdn" class="btn" onclick="javascript:ajaxFormSubmit('set_cdn_form','提交',false, 'wrong_text_cdn', 'sub_btn_cdn');" value="提交">
	  </td>
	 </tr>
	 </table>
	</form>
	</div>
	
	<div id="sms" style="display: none;">
	<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=system&act=sms" id="set_sms_form" method="post" enctype="multipart/form-data">
	<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
	 <tbody><tr>
	   <th width="131">短信接口</th>
	   <th>内容</th>
	 </tr>
	 <tr>
	  <td align="center"><label><input type="radio" name="global_sms" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['global_sms']=='yuntongxun'){?>checked<?php }?> value="yuntongxun" /> <?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_sms_type']['yuntongxun'];?>
</label></td>
	  <td style="padding:0;border:0">
	   	<table width="100%" cellpadding="8" cellspacing="0" class="tableBasic" style="border:0">
		 <tr>
		  <td align="right" width="100">accountSid</td>
		  <td>
			<input type="text" name="yuntongxun[accountSid]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['yuntongxun_config']['accountSid'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">accountToken</td>
		  <td>
			<input type="text" name="yuntongxun[accountToken]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['yuntongxun_config']['accountToken'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">appId</td>
		  <td>
			<input type="text" name="yuntongxun[appId]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['yuntongxun_config']['appId'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">短信模板ID</td>
		  <td>
			<input type="text" name="yuntongxun[templateId]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['yuntongxun_config']['templateId'];?>
" size="80" class="inpMain"><br>
			短信模板传3个参数，第1个为验证码，第2个为验证码用途，第3个为有效时间<br>
			示例：【短信签名】验证码为{1}，此验证码仅用于{2}，{3}分钟内有效
		  </td>
		 </tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td align="center"><label><input type="radio" name="global_sms" value="alidayu" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['global_sms']=='alidayu'){?>checked<?php }?>/> <?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_sms_type']['alidayu'];?>
</label></td>
	  <td style="padding:0;border:0">
	   	<table width="100%" cellpadding="8" cellspacing="0" class="tableBasic" style="border:0">
		 <tr>
		  <td width="100" align="right">appkey</td>
		  <td>
			<input type="text" name="alidayu[appkey]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['alidayu_config']['appkey'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">secretkey</td>
		  <td>
			<input type="text" name="alidayu[secretkey]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['alidayu_config']['secretkey'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">短信签名</td>
		  <td>
			<input type="text" name="alidayu[freesignname]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['alidayu_config']['freesignname'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">短信模板ID</td>
		  <td>
			<input type="text" name="alidayu[templatecode]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['alidayu_config']['templatecode'];?>
" size="80" class="inpMain">
			<br>
			短信模板传1个参数（即验证码），参数名须为code，不然无法发送成功<br>
			示例：【短信签名】验证码为：${code}，15分钟内有效
		  </td>
		 </tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td align="center"><label><input type="radio" name="global_sms" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['global_sms']=='aliyuntongxun'){?>checked<?php }?> value="aliyuntongxun" /> <?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_sms_type']['aliyuntongxun'];?>
</label></td>
	  <td style="padding:0;border:0">
	   	<table width="100%" cellpadding="8" cellspacing="0" class="tableBasic" style="border:0">
		 <tr>
		  <td align="right" width="100">Access Key ID</td>
		  <td>
			<input type="text" name="aliyuntongxun[AccessKeyID]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['aliyuntongxun_config']['AccessKeyID'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">Access Key Secret</td>
		  <td>
			<input type="text" name="aliyuntongxun[AccessKeySecret]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['aliyuntongxun_config']['AccessKeySecret'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">短信签名</td>
		  <td>
			<input type="text" name="aliyuntongxun[freesignname]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['aliyuntongxun_config']['freesignname'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">短信模板ID</td>
		  <td>
			<input type="text" name="aliyuntongxun[templateId]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['aliyuntongxun_config']['templateId'];?>
" size="80" class="inpMain"><br>
			短信模板传1个参数（即验证码），参数名须为number，不然无法发送成功<br>
			示例：【短信签名】验证码为：${number}，15分钟内有效
		  </td>
		 </tr>
		</table>
	  </td>
	 </tr>
	 </tbody>
	</table>
	<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
	 <tr>
	  <td width="131"></td>
	  <td>
	   <div id="wrong_text_sms" class="warning" style="display:none"></div>
	   <div class="clear"></div>
	   <input  type="button" id="sub_btn_sms" class="btn" onclick="javascript:ajaxFormSubmit('set_sms_form','提交',false, 'wrong_text_sms', 'sub_btn_sms');" value="提交">
	  </td>
	 </tr>
	 </table>
	</form>
	</div>
	
	<div id="weixin" style="display: none;">
	<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=system&act=wx" id="set_wx_form" method="post" enctype="multipart/form-data">
	<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
	 <tbody><tr>
	   <th width="131">微信接口</th>
	   <th>内容</th>
	 </tr>
	 <tr>
	  <td align="center"><label><input type="checkbox" name="global_wx[]" value="wx" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['wx_config']['enable']=='enable'){?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_wx_type']['wx'];?>
</label></td>
	  <td style="padding:0;border:0">
	   	<table width="100%" cellpadding="8" cellspacing="0" class="tableBasic" style="border:0">
		 <tr>
		  <td align="right" width="100">appid</td>
		  <td>
			<input type="text" name="wx[appid]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['wx_config']['appid'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">appsecret</td>
		  <td>
			<input type="text" name="wx[appsecret]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['wx_config']['appsecret'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td align="center"><label><input type="checkbox" name="global_wx[]" value="wxweb" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['wxweb_config']['enable']=='enable'){?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_wx_type']['wxweb'];?>
</label></td>
	  <td style="padding:0;border:0">
	   	<table width="100%" cellpadding="8" cellspacing="0" class="tableBasic" style="border:0">
		 <tr>
		  <td width="100" align="right">appid</td>
		  <td>
			<input type="text" name="wxweb[appid]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['wxweb_config']['appid'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right">appsecret</td>
		  <td>
			<input type="text" name="wxweb[appsecret]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['wxweb_config']['appsecret'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		</table>
	  </td>
	 </tr>
	 </tbody>
	</table>
	<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
	 <tr>
	  <td width="131"></td>
	  <td>
	   <div id="wrong_text_wx" class="warning" style="display:none"></div>
	   <div class="clear"></div>
	   <input  type="button" id="sub_btn_wx" class="btn" onclick="javascript:ajaxFormSubmit('set_wx_form','提交',false, 'wrong_text_wx', 'sub_btn_wx');" value="提交">
	  </td>
	 </tr>
	 </table>
	</form>
	</div>
	
	<div id="payment" style="display: none;">
	<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=system&act=payment" id="set_pay_form" method="post" enctype="multipart/form-data">
	<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
	 <tbody><tr>
	   <th width="131">支付方式</th>
	   <th>内容</th>
	 </tr>
	 <tr>
	  <td align="center"><label><input type="checkbox" name="global_pay[]" value="wxpay" <?php if ($_smarty_tpl->tpl_vars['_lang']->value['wxpay_config']['enable']=='enable'){?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_pay_type']['wxpay'];?>
</label></td>
	  <td style="padding:0;border:0">
	   	<table width="100%" cellpadding="8" cellspacing="0" class="tableBasic" style="border:0">
		 <tr>
		  <td align="right" width="100">appid</td>
		  <td>
			<input type="text" name="wxpay[appid]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['wxpay_config']['appid'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right" width="100">商户号</td>
		  <td>
			<input type="text" name="wxpay[mchid]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['wxpay_config']['mchid'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		 <tr>
		  <td align="right" width="100">商户支付密钥</td>
		  <td>
			<input type="text" name="wxpay[key]" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['wxpay_config']['key'];?>
" size="80" class="inpMain">
		  </td>
		 </tr>
		</table>
	  </td>
	 </tr>
	 </tbody>
	</table>
	<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
	 <tr>
	  <td width="131"></td>
	  <td>
	   <div id="wrong_text_pay" class="warning" style="display:none"></div>
	   <div class="clear"></div>
	   <input  type="button" id="sub_btn_pay" class="btn" onclick="javascript:ajaxFormSubmit('set_pay_form','提交',false, 'wrong_text_pay', 'sub_btn_pay');" value="提交">
	  </td>
	 </tr>
	 </table>
	</form>
	</div>
			
  </div>
</div><?php }} ?>