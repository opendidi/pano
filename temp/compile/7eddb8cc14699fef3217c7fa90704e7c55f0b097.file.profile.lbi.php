<?php /* Smarty version Smarty-3.1.7, created on 2021-08-04 20:16:10
         compiled from "D:/VR/VR0002/template\default\member\profile.lbi" */ ?>
<?php /*%%SmartyHeaderCode:21216610a850aba9245-07778386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7eddb8cc14699fef3217c7fa90704e7c55f0b097' => 
    array (
      0 => 'D:/VR/VR0002/template\\default\\member\\profile.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21216610a850aba9245-07778386',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'profile' => 0,
    'k' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_610a850af1547',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610a850af1547')) {function content_610a850af1547($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/library/member_paths.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
<style>
	.head_img_container{
		width: 120px;
		max-height: 120px;
		text-align: center;
		border: 1px solid #e4e4e4;
	}
	.head_img_desc ol li{
		line-height: 30px;
		color:#656565;
	}
	label{
		text-align: center;
	}
</style>

<div class="works-container">
	<div class="container container_works" style="margin-top: 0;">
		<div class="row row_margin_bottom " style="margin-top: 0px;">
			<div class="col-md-10 advanced-setting-block" style="padding-top:10px;padding-bottom:10px;">
			<form class="form-horizontal" id="profile_form" action="/member/profile">
			<input type="hidden" name="act" value="edit">
			 <div class="form-group">
			    <label  class="col-md-2 col-md-offset-1" style="line-height: 108px;text-align: center;">头像</label>
			    <div class="col-md-2 col-sm-4">
			    	<div class="head_img_container">
			      		<img src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['avatar'];?>
" id="head_img">
			    	</div>
			    </div>
			    <div class="col-md-4 head_img_desc">
			    	<ol>
			    		<li>建议图片大小为120*120 px</li>
			    		<li>图片比例为1:1,大小不超过200KB</li>
			    		<li>允许上传JPG,PNG格式的图片</li>
			    	</ol>
			    	 <input id="head_img_btn" type="file" />
			    </div>
			  </div>
			   <div class="form-group">
			    <label  class="col-sm-2 col-md-offset-1">手机号</label>
			    <div class="col-md-6 col-sm-10">
			      <input type="text" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['profile']->value['phone'];?>
" disabled>
			    </div>
			  </div>

			   <div class="form-group">
			    <label for="nickname" class="col-sm-2 col-md-offset-1">昵称</label>
			    <div class="col-md-6 col-sm-10">
			      <input type="text" class="form-control" name="nickname"  value="<?php echo $_smarty_tpl->tpl_vars['profile']->value['nickname'];?>
" maxlength="32">
			    </div>
			  </div>

              <div class="form-group">
			    <label for="nickname" class="col-sm-2 col-md-offset-1">性别</label>
			    <div class="col-md-6 col-sm-10">
				  <select class="form-control" name="sex">
					  <option value="0">请选择</option>
					  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_lang']->value['sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
					  	<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['profile']->value['sex']==$_smarty_tpl->tpl_vars['k']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
					  <?php } ?>
					</select>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="nickname" class="col-sm-2 col-md-offset-1">邮件</label>
			    <div class="col-md-6 col-sm-10">
				  <input type="text" class="form-control" name="email"  value="<?php echo $_smarty_tpl->tpl_vars['profile']->value['email'];?>
" maxlength="32">
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="nickname" class="col-sm-2 col-md-offset-1">qq号码</label>
			    <div class="col-md-6 col-sm-10">
				  <input type="text" class="form-control" name="qq"  value="<?php echo $_smarty_tpl->tpl_vars['profile']->value['qq'];?>
" maxlength="32">
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="nickname" class="col-sm-2 col-md-offset-1">所在地区</label>
			    <div class="col-md-6 col-sm-10">
			 	  <?php echo $_smarty_tpl->getSubTemplate ('plugins/region.lbi', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="nickname" class="col-sm-2 col-md-offset-1">首页作品</label>
			    <div class="col-md-6 col-sm-10">
				  <input type="text" class="form-control" name="index_show"  value="<?php echo $_smarty_tpl->tpl_vars['profile']->value['index_show'];?>
" placeholder="默认提取最近发布的作品" maxlength="255">
			    </div>
			  </div>
			 
			 <script type="text/javascript" src="/static/kindeditor/kindeditor-min.js"></script>
			<script type="text/javascript" src="/static/kindeditor/lang/zh_CN.js"></script> 
			<script type="text/javascript">
			
			KindEditor.ready(function(K) {
			  editor = K.create('textarea[name="intro"]', {
				resizeType : 1, 
				minWidth : '565px',
				allowPreviewEmoticons : false,
				allowMediaUpload : false,
				allowFlashUpload : false,
				allowFileManager : false,
				allowImageUpload: false,
				
				afterChange : function(){this.sync();},
				afterBlur : function(){this.sync();},
				
				cssPath : '/static/kindeditor/fontSize.css',
				items : [
				  'fullscreen','|',
				  'formatblock','forecolor', 'hilitecolor','fontname', 'fontsize', '|', 
				  'bold', 'italic', 'underline','removeformat', '|', 
				  'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist','insertunorderedlist', 'link','|',
				  'flash', 'media','image','|',
				  'baidumap'
				  ]
			  });
			});
			
			</script>
			

			 <div class="form-group">
			    <label for="nickname" class="col-sm-2 col-md-offset-1">简介</label>
			    <div class="col-md-6 col-sm-10">
			      <textarea name="intro" id="content" style="width:565px;height:250px"><?php echo $_smarty_tpl->tpl_vars['profile']->value['intro'];?>
</textarea>
			    </div>
			  </div>
			 
			<!--   <div class="form-group">
			    <label for="province" class="col-sm-2">地址</label>
			    <div class="col-sm-3">
			      <select class="form-control" id="province">
			        <option>北京</option>
			        <option>上海</option>
			      </select>
			    </div>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" id="exampleInputAddress2" placeholder="市/县">
			    </div>
			  </div> -->
			 
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-md-3">
			      <button type="button" id="sub_btn" class="btn btn-primary btn-block" onclick="ajaxFormSubmit('profile_form')">保存</button>
			    </div>
			  </div>
			</form>
			</div>
		</div>
	</div>
</div>
<!-- <div style="display: none;" data-keyboard="false" data-backdrop="static" id="imgCutterModal" class="modal fade" aria-hidden="true">
       
</div> -->

<div class="modal fade" id="imgCutterModal" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div style="width:100%;height:100%;position:relative">
                 <div class="img-cutter" id="imgCutter">
                     <div class="canvas" ><img id="cutterImg" src=""></div>
                     <div class="actions">
                         <h5>拖拽来剪切图片</h5>
                         <button type="button" class="btn btn-primary img-cutter-submit">确认</button>
                         <button type="button" data-dismiss="modal" class="btn btn-primary">取消</button>
                     </div>
                 </div>
       </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="/static/css/fileinput.min.css">
<link rel="stylesheet" href="/static/css/zui.imgcutter.css">
<script src="/static/js/fileinput-v4.34.js"></script>
<script src="/static/js/fileinput_locale_zh.js"></script>
<script src="/static/js/zui.imgcutter.js"></script>
<script>

var cutterParam ={};
$(function(){
	$("#head_img_btn").fileinput({
	    language: 'zh',
	    showUpload: false, // hide upload button
	    showRemove: false, // hide remove button
	    showCancel: false,
	    showPreview: false,
	    showCaption: false,
	    browseClass: "btn btn-primary",
	    browseLabel: "上传头像",
	    browseIcon: "<i class=\"icon-file-image\"></i>",
	    allowedFileExtensions: ["jpg","png"],
	    //uploadUrl: "http://upload.qiniu.com/",
	    uploadUrl: "/member/profile",
	    uploadAsync: true,
	    textEncoding: "UTF-8",
	   uploadExtraData: function(){
	   		cutterParam.act="update_head_img";
	   		return cutterParam;
	   }
	}).on('fileloaded', function(event, file, previewId, index, reader) {
	    //重置token，以便再次获取
	    tokenObj = {};
	    //校验文件长宽
	    var objUrl = window.URL || window.webkitURL;
	    var url = objUrl.createObjectURL(file);
	    var img = new Image();
	    img.src = url;

	    img.onload = function(){
	        if(img.naturalWidth < 100 || img.naturalHeight < 100 ){
	            alert_notice("图片尺寸小于100*100像素");
	            $("#head_img_btn").fileinput("clear");
	            return;
	        }
	        if(file.size > 300*1024){
	            alert_notice("图片大小不应超过300KB");
	            $("#errorMsgDiv").show();
	            $("#head_img_btn").fileinput("clear");
	            return ;
	        }
	        $("#errorMsgDiv").hide();
	        $("#cutterImg").attr("src",url);
	        $("#imgCutter").find(".cliper").find("img").attr("src",url);
	        var $imgCutterInfo = $('.img-cutter-info');
	        $("#imgCutter").imgCutter({
	            coverColor:'#000',
	            coverOpacity : 0.5,
	            defaultWidth :200,
	            defaultHeight :200,
	            fixedRatio:true,
	            minWidth : 120,
	            minHeight : 120,
	            fixedRatio:true,
	            before:function(e){
	             
	                cutterParam.width = Math.floor(e.width); //裁剪后的宽度
	                cutterParam.height = Math.floor(e.height);//裁剪后的高度
	                cutterParam.left = Math.floor(e.left);//裁剪位置距离左侧的距离    
	                cutterParam.top = Math.floor(e.top); //裁剪位置距离上边的距离
	              
	                $("#imgCutterModal").modal("hide");
	                //调用上传按钮
	                $("#head_img_btn").fileinput("upload");
	            },
	        });
	        $("#imgCutterModal").modal("show");

	    }
	}).on('fileuploaded', function (event, data) {
	    var response = data.response;
	    if(response.status == '1'){
	        alert_notice("头像上传成功","success");
	        $("#head_img").attr("src",response.imgsrc+"?"+new Date().getTime());
	    }
	}).on('filebatchuploaderror', function (event, data, previewId, index) {
	    console.log("upload fail response:"+JSON.stringify(data));
	});
})


</script><?php }} ?>