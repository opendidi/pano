<?php /* Smarty version Smarty-3.1.7, created on 2018-12-10 10:22:54
         compiled from "D:/phpStudy/WWW/vradmin/template\lib\material.lbi" */ ?>
<?php /*%%SmartyHeaderCode:75415b3c4104b51451-11733955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f0fcc33a7e836970fa786a538ce2a7fc7145a36' => 
    array (
      0 => 'D:/phpStudy/WWW/vradmin/template\\lib\\material.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75415b3c4104b51451-11733955',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b3c4104b8fc5',
  'variables' => 
  array (
    'act' => 0,
    'up_url' => 0,
    '_lang' => 0,
    'res' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3c4104b8fc5')) {function content_5b3c4104b8fc5($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['act']->value=='add'){?>
	<script src=""></script>
				<table class="tableBasic" border="0" cellpadding="4" cellspacing="0"  width="100%">
					<tbody>
					<tr>
						<th>素材类别：</th>
						<td>
							<select name="type" id="type">
									<option value="-1">请选择素材类别</option>
									<option value="0">静态热点</option>
									<option value="1">动态热点</option>
									<option value="2">其它素材</option>
							</select>　
							其它素材是指用户在编辑补天补地，链接导航等地方时选择的素材
						</td>
					</tr>
					<tr>
						<th width="120"><i class="require-red">*</i>标题：</th>
						<td>
							<input class="common-text required" name="title" id="title"  type="text">
							请填写1到20个字符
						</td>
					</tr>
					<tr>
						<th width="120"><i class="require-red">*</i>上传素材：</th>
						<td>
							<div style="float: left;">
								<button id="material_input" class="btn">选择文件</button>
							</div>
							<div style="float: left;line-height: 30px;width: 200px;" id="progress_material_input">

							</div>
							<div style="float: left; margin-left: 40px ; line-height: 30px; ">
								请仔细查看以下例子：<a href="http://cdn.useevr.cn/ex/md.png" target="_blank">静态热点</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://cdn.useevr.cn/ex/spot2_gif.png" target="_blank">动态热点</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://cdn.useevr.cn/ex/dianhua.png" target="_blank">其他素材</a>
							</div>
						</td>

					</tr>
					<tr id="dyn_thumb_tr" style="display: none;">
						<th width="120"><i class="require-red">*</i>动态热点缩略图：</th>
						<td>
							<div style="float: left;">
								<button id="dyn_thumb_input" class="btn">选择文件</button>
							</div>
							<div style="float: left;line-height: 30px;width: 200px;" id="progress_dyn_thumb_input">

							</div>
							<div style="float: left; margin-left: 50px ; line-height: 30px;">
							动态热点需要额外上传一张缩略图,  示例：<a href="http://cdn.useevr.cn/ex/dyn_1.gif" target="_blank">缩略图</a>
							</div>
						</td>

					</tr>
					<tr>
						<th></th>
						<td>
						    <div id="wrong_text" class="warning" style="display:none"></div>
							<div class="clear"></div>
							<input type="button" class="btn btn-primary btn6 mr10" value="提交" id="sub_btn">
							<input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
						</td>
					</tr>
					</tbody>
				</table>
			<script language="JavaScript" type="text/javascript" src="/static/js/plupload/moxie.js"></script>
			<script language="JavaScript" type="text/javascript" src="/static/js/plupload/plupload.dev.js"></script>
			<script language="JavaScript" type="text/javascript" src="/static/js/kr/upload_video.js"></script>
			<script>
				var up_url = '<?php echo $_smarty_tpl->tpl_vars['up_url']->value;?>
';
				var material_up;
				var dyn_thumb_up;
				var url = '/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=material';
				var flag1 = false , flag2 = false;
				var params = {};
				
				$(function(){

					 material_up = new Upload_Video();
                     material_up.Init("material_input",up_url,success_callback,"def_material",null,"jpg,gif,png","300kb",false,style_callback);

					$("#type").change(function(){
						if($(this).val() == 1){
							$("#dyn_thumb_tr").show();
							dyn_thumb_up = new Upload_Video();
                     		dyn_thumb_up.Init("dyn_thumb_input",up_url,success_dyn_callback,"def_material",null,"jpg,gif,png","300kb",false,style_callback);

						}else{
							$("#dyn_thumb_tr").hide();
							if (dyn_thumb_up) dyn_thumb_up=null;
						}
					});
					$("#sub_btn").click(function(){

						params.type = $("#type").val();
						if (params.type<0) {
							alert("请选择素材类别");
							return false;
						}
						params.title = $.trim($("#title").val());
						if (params.title.length<1||params.title.length>20) {
							alert("请填写1到20个字符的标题");
							return false;
						}

						if(material_up.video_up.files.length==0){
                            alert("请先上传素材");
                            return false;
                         }
                         if(dyn_thumb_up){
							if(dyn_thumb_up.video_up.files.length==0){
								alert("请先选择动态热点缩略图");
								return false;
							}
						}else{
							flag2 = true;
						}
						
                        material_up.video_up.start();
						if(dyn_thumb_up){
							dyn_thumb_up.video_up.start();
						}

						$("#sub_btn").val("正在提交");
						$("#sub_btn").attr("disabled","disabled");
						
						var inter = setInterval(function(){
							if (flag1&&flag2) {
								console.log(params);
								clearInterval(inter);
								$.post(url,{
									'act':'doAdd',
									'params':JSON.stringify(params)
								},function(res){
									if (res.status==1) {
										$("#sub_btn").val("编辑成功");
										setTimeout(function(){
											window.location.href = url;
										},1000);
									}else{
										alert(res.msg);
										$("#sub_btn").removeAttr("disabled");
									}
								},'json');
							}
						},500);

					});
				})
				 function success_callback(obj){
                        var videoParams=obj.videoParams.videos;
                        if(videoParams.length>0){
                            params.absolutelocation = videoParams[0].location;
                            flag1 = true;
                        }
                        // params.absolutelocation = up.getOption().multipart_params.key;
                  }
                  function success_dyn_callback(obj){
                        var videoParams=obj.videoParams.videos;
                        if(videoParams.length>0){
                            params.thumb_path = videoParams[0].location;
                            flag2 = true;
                        }
                        // params.thumb_path = up.getOption().multipart_params.key;
                  }
      			function style_callback(up,file,obj){
                        $("#progress_"+obj.btn_id).html('');
                        if(up.files.length>1){
                            up.removeFile(up.files[0]);
                        }
                        $("#progress_"+obj.btn_id).append('<div class="progress" id="'+file.id+'">'+
                                        '<div class="progress-bar" style="width: 0%">'+
                                        '</div><span class="text-muted" style="font-size:11px;font-weight:normal;">点击下方提交按钮开始上传</span>'+
                                        '<a href="javascript:void(0)" class="text-danger store-delete" style="color:red;float:right" onclick="delfile_click(this)" data-obj="'+obj.btn_id+'" data-id="'+file.id+'" title="删除">删除</a></div>');
                        $("#progress_"+obj.btn_id).show();
                        $("#progress_"+obj.btn_id+" a[data-id="+file.id+"]").data('data',up);
                 }
                 function delfile_click(obj){
                        var file_id=$(obj).attr("data-id");
                        var btn_id=$(obj).attr("data-obj");
                        var up= $("#progress_"+btn_id+" a[data-id="+file_id+"]").data('data');
                        var file=up.getFile(file_id);
                        if(file){   
                            $(obj).parent().remove();
                            up.removeFile(file);
                        }
                }				
				
			</script>
<?php }else{ ?>
	   <h3>
	   		<a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=material&act=add" class="actionBtn add" style="margin-top: -10px;">添加素材</a>
		</h3>
		<table  class="tableBasic" border="0" cellpadding="8" cellspacing="0"  width="100%" style="text-align: center;background-color: #eaeaea;">
			<tr>
				<th>名称</th>
				<th>缩略图</th>
				<th>类别</th>
				<th>操作</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['res']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</td>
				<td><div><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['thumb_path'];?>
" width="40px;"></div></td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['v']->value['type']==0){?>
						静态热点
					<?php }elseif($_smarty_tpl->tpl_vars['v']->value['type']==1){?>
						动态热点
					<?php }else{ ?>
						其它图标
					<?php }?>
				</td>
				<td><a class="del" style="cursor: pointer;" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['pk_defmedia_main'];?>
" data-title="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
">删除</a></td>
			</tr>
			<?php } ?>
		</table>
		<div class="list-page"><?php echo $_smarty_tpl->getSubTemplate ("lib/pages.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
		<script>
			$(function(){
				$(".del").click(function(){						
					if (confirm("确定删除 "+$(this).data('title')+" 吗？")) {
						$.post("/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=material",{
							'act' : 'del',
							'id' : $(this).attr('data-id')
						},function(res){
							if (res.status == 1) {
								alert("删除成功");
								window.location.reload() ;
							}else{
								alert("删除失败");
							}
						},'json');
					}
				});
			})
		</script>
<?php }?><?php }} ?>