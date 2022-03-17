<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:21:26
         compiled from "D:/VR/VR0002/template\add\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1539360dfbb9665ec00-45661826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eac4cd3d399a623ea7f298dcecb2a40c398ccd1' => 
    array (
      0 => 'D:/VR/VR0002/template\\add\\add.tpl',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1539360dfbb9665ec00-45661826',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'limit_num' => 0,
    'atlas' => 0,
    'v' => 0,
    'tags' => 0,
    'tag' => 0,
    'up_url' => 0,
    'img_store_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbb96a5aa6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbb96a5aa6')) {function content_60dfbb96a5aa6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/library/header.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/library/member_paths.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
<link rel="stylesheet" href="/static/css/fileinput.min.css">
<link rel="stylesheet" href="/static/css/chosen.min.css">
<div class="container">
	
	<div class="update_div" style="min-height: 600px;margin-left: auto;margin-right: auto;">
		
		<ul class="nav nav-tabs">
		  <li class="active"><a href="###" data-target="#tab_upimg" data-toggle="tab">全景图片</a></li>
		  <li><a href="###" data-target="#tab_upvideo" data-toggle="tab">全景视频</a></li>
		  <li><a href="###" data-target="#object_around" data-toggle="tab">物体环视</a></li>
		</ul>
		<div class="tab-content" style="background: #fff">
		  <div class="tab-pane fade active in" id="tab_upimg">
		  	<?php if ($_smarty_tpl->tpl_vars['limit_num']->value){?>
		  	 <div class="row">
		  		<div class="col-md-5">
		  			<div class="input-group">
		  			  <span class="input-group-addon">项目名称</span>
		  			  <input type="text" class="form-control" name="pname" id="pname" maxlength="30" placeholder="请输入长度30个字符以内的名称">
		  			</div>
		  		</div>
		  		<div class="col-md-3">
		  			<div class="input-group" >
		  			  <span class="input-group-addon">分类</span>
		  			  <select class="form-control" id="atlas">
						 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['atlas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
	  			   			 <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['pk_atlas_main'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
						 <?php } ?>
		  			  </select>
		  			</div>
		  		</div>
		
				<div class="col-md-4">
					<div class="input-group " style="width:100%">
				      <select data-placeholder="请选择3个以内的标签" id="pic_chosen" class="chosen-select form-control" tabindex="-1" multiple="">
				        <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
				        	<?php if ($_smarty_tpl->tpl_vars['tag']->value['type']==1){?>
				        		<option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</option>
				        	<?php }?>
				        <?php } ?>
				      </select>
				    </div>
				</div>

		  	 </div>

			 <div class="row" id="pranoimg" style="margin-top:20px">
			 	<div class="col-md-12">
			 	 <input id="imgUpload" name="file" type="file" multiple="" accept="image/jpeg,image/tiff" class="">
			 	 </div>
			 </div>
			 <div class="row" style="margin-top:20px">
			 	<div class="col-md-12">
			 		<button class="btn btn-block btn-primary" type="button" id="publish_img">立即生成</button>
			 	</div>
			 </div>
			<?php }else{ ?>
			 <img src="/static/images/ico/warning.png" class="fl"/> 
			 &nbsp;你可发布的作品数量已达上限，无法再发布，请联系客服！
			<?php }?> 
		  </div>
		  <div class="tab-pane fade" id="tab_upvideo">
		    
		      <div class="row" style="margin-top:20px">
		        <label for="vname" class="col-sm-2">视频名称</label>
		        <div class="col-md-6 col-sm-10">
		          <input type="text" class="form-control" id="vname" name="vname" placeholder="请输入长度30个字符以内的名称">
		        </div>
		      </div>
			  <div class="row" style="margin-top:20px">
			  	<label for="video_chosen" class="col-sm-2">视频标签</label>
				<div class="col-md-6">
				      <select data-placeholder="请选择3个以内的标签" id="video_chosen" class="chosen-select form-control" tabindex="-1" multiple="">
				        <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
				        	<?php if ($_smarty_tpl->tpl_vars['tag']->value['type']==2){?>
				        		<option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</option>
				        	<?php }?>
				        <?php } ?>
				      </select>
				</div>
			  </div>
		       <div class="row" style="margin-top:20px">
		        <label for="profile" class="col-sm-2">视频简介</label>
		        <div class="col-md-6">
		          <textarea name="profile" id="profile"  rows="5" class="form-control" placeholder="视频项目简介"></textarea>
		        </div>
		      </div>
		      <div class="row" style="margin-top:20px">
				<div class="col-md-8 col-md-offset-2 ">
	                <table class="table table-striped table-hover text-left" id="video_up_table" style="margin-top:40px; display:none;">
	                    <thead>
	                      <tr>
	                        <th class="col-md-4">文件名</th>
	                        <th class="col-md-2">大小</th>
	                        <th class="col-md-6">进度</th>
	                      </tr>
	                    </thead>
	                    <tbody id="fsUploadProgress">
	                    </tbody>
	                </table>
	            </div>
		      </div>
			  <div class="row" style="margin-top:20px">
		        <label for="vcover" class="col-sm-2">全景视频</label>
		        <div class="col-md-1">
		         <button class="btn" id="videoupload" name="video">选择视频</button>
		        </div>
		        <div class="col-md-3">
		        	<span class="text-muted">多个清晰度，请上传多个文件</span>
		        </div>
		      </div>
		       <div class="row" style="margin-top:20px">
				<div class="col-md-8 col-md-offset-2 ">
	                <table class="table table-striped table-hover text-left" id="audio_up_table" style="margin-top:40px; display:none;">
	                    <thead>
	                      <tr>
	                        <th class="col-md-4">文件名</th>
	                        <th class="col-md-2">大小</th>
	                        <th class="col-md-6">进度</th>
	                      </tr>
	                    </thead>
	                    <tbody id="audio_UploadProgress">
	                    </tbody>
	                </table>
	            </div>
		      </div>
		      <div class="row" style="margin-top:20px">
		        <label for="vcover" class="col-sm-2">音频<small class="text-muted"> (可选) </small></label>
		        <div class="col-md-1">
		         <button class="btn" id="audioupload" name="audio">选择音频</button>
		        </div>
		        <div class="col-md-3">
		        	<span class="text-muted">ios下会出现有画面没声音的情况，请上传一个<span style="color: #c40000">mp3</span>或<span style="color: #c40000">m4a</span>格式音频文件</span>
		        </div>
		      </div>
		      <div class="row" style="margin-top:20px">
		        <div class="col-sm-offset-2 col-sm-2">
		          <button id="publish_video" class="btn btn-primary btn-block">发布</button>
		        </div>
		      </div>
		  </div>

	  	  <div class="tab-pane fade" id="object_around">
	  	      <div class="row" style="margin-top:20px">
		  		<div class="col-md-4">
		  			<div class="input-group">
		  			  <span class="input-group-addon">项目名称</span>
		  			  <input type="text" class="form-control" name="oname" id="oname" maxlength="30" placeholder="请输入长度30个字符以内的名称">
		  			</div>
		  		</div>
		  		<div class="col-md-2">
		  			<div class="input-group">
		  			  	<label class="checkbox-inline" style="margin-top: 6px;">
					   		<input type="checkbox" id="flag_publish" checked> 公开作品
						</label>
		  			</div>
		  		</div>
	  	      </div>
		  	   <div class="row" style="margin-top:20px">
		  	    	<div class="col-md-12">
		  	    		<input id="objImgUpload" name="file" type="file" multiple="" accept="image/jpeg,image/png" class="">
		  	    	</div>
		  	   </div> 
		  	   <div class="row" style="margin-top:20px">
			 	<div class="col-md-12">
			 		<button class="btn btn-block btn-primary" type="button" id="publish_obj">立即生成</button>
			 	</div>
			 </div>
	  	  </div>

		</div>
	</div>
</div>

<!--上传成功弹框-->
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button> -->
	      <h4 class="modal-title">提示：</h4>
	    </div>
	    <div class="modal-body">
	      <p class="text-muted"><img src="/static/images/loading.gif" alt="">上传完成，大概需要2~5分钟，请等待后台处理...</p>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-primary"  style="display:none" onclick="javascript:window.location.href='/member/project'">确定</button>
	    </div>
	  </div>
	</div>
</div>
<!--从素材库中选择-->
<div class="modal fade" id="myLgModal">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
            <h2 class="modal-title"> 从素材库添加全景</h2>
        </div>
        <div class="modal-body" id="panoImgList">
            <div id="panoImgList_wrap"></div>
            <div id="pager_wrap"></div>
        </div>

        <div class="clearfix"></div>
        <div class="modal-footer">
            <span>已选择<em>0</em>个场景</span><input id="search" onkeyup="searchOnPage()" type="text" placeholder="输入作品名，快速检索">
            <button class="btn btn-primary" type="button" onclick="saveWorkImg(bindImgcallback)">确认</button>
        </div>
    </div>
</div>
</div>
<script>
	var up_url = "<?php echo $_smarty_tpl->tpl_vars['up_url']->value;?>
";
	var global_storage ='<?php echo $_smarty_tpl->tpl_vars['_lang']->value['global_storage'];?>
';
	var qn_video_token;
	var videoParams={} ;
	videoParams.videos = new Array();
</script>
<script language="JavaScript" type="text/javascript" src="/static/js/fileinput-v4.34.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/fileinput_locale_zh.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/chosen.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/plupload/moxie.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/plupload/plupload.dev.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/kr/work_add.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/kr/sceneChosen.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/pager.js"></script>

<?php if ($_smarty_tpl->tpl_vars['img_store_type']->value=='qiniu'){?>
<script language="JavaScript" type="text/javascript" src="/static/js/qiniu.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/qiniu_ui.js"></script>
<link rel="stylesheet" href="/static/css/qiniu_main.css">
<script>


var video_up = Qiniu.uploader({
        runtimes: 'html5,flash,html4',
        browse_button: 'videoupload',
        max_retries: 1,
        max_file_size: '900mb',
        flash_swf_url: '/static/js/plupload/Moxie.swf',
        dragdrop: true,
        chunk_size: '4mb',
        save_key: false,
        unique_names: false,
        filters : {
            max_file_size : '900mb',
            prevent_duplicates: true,
            mime_types: [
                {title : "视频文件", extensions : "mp4"} 
            ]
        },
        multi_selection: false,
        get_new_uptoken: false, 
       // uptoken_url:'/get_token.php?act=video',
        uptoken_func: function (file) {
        	qn_video_token ={};
        	$.ajax({
        		url:"/get_token.php",
        		data:{"act":"video"},
	    		async: false,
	    		success:function(result){
	    		 	result = eval("("+result+")");
	    		 	qn_video_token.prefix= result.prefix;
    		 		qn_video_token.token = result.token;
	    		}
	    	})
	    	return qn_video_token.token;
        },
        domain:up_url,
        auto_start: false,
        log_level: 5,
        init: {
            'FilesAdded': function (up, files) {
            	$("#video_up_table").show();
                plupload.each(files, function (file) {
                    var progress = new FileProgress(file, 'fsUploadProgress');
                    progress.setStatus("点击 \"发布\" 按钮开始上传...");
                    progress.bindUploadCancel(up);
                });
            },
            'BeforeUpload': function (up, file) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
                if (up.runtime === 'html5' && chunk_size) {
                    progress.setChunkProgess(chunk_size);
                }
            },
            'UploadProgress': function (up, file) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
                progress.setProgress(file.percent + "%", file.speed, chunk_size);
            },
            'UploadComplete': function () {

            },
            'FileUploaded': function (up, file, info) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                progress.setComplete(up, info);
                progress.setStatus("");
                var video = {};
                video.location = eval("("+info+")").key;
                video.name = file.name;
                video.size = file.size;
                videoParams.videos.push(video);
                var files = up.files;
                if(files[files.length-1].id == file.id){
					if (audio_uploader.files.length>0) 
						audio_uploader.start();
					else
						doVideoCommint();
                }
            },
            'Error': function (up, err, errTip) {

                $("#video_up_table").show();
                var progress = new FileProgress(err.file, 'fsUploadProgress');
                progress.setError();
                progress.setStatus(errTip);
            }
            ,
            'Key': function (up, file) {

            	var name =file.name;
                var key = qn_video_token.prefix+generic_name()+name.substr(name.lastIndexOf("."));
                // do something with key
                return key;
            }
        }
    });
</script>

<?php }elseif($_smarty_tpl->tpl_vars['img_store_type']->value=='local'){?>
<script language="JavaScript" type="text/javascript" src="/static/js/kr/upload_video.js"></script>
<script type="text/javascript">
  var video_up=null;
$(function(){
	var upload=new Upload_Video();
	upload.Init('videoupload',up_url+"?act=video",success_Upload);
	video_up=upload.video_up;
})
</script>
	<?php }elseif($_smarty_tpl->tpl_vars['img_store_type']->value=='oss'){?>

	<script>
		var key ;
		function set_upload_param(up, filename, ret)
		{
		    if (ret == false)
		    {
		        qn_video_token ={};
            	$.ajax({
            		url:"/get_token.php",
            		data:{"act":"video"},
    	    		async: false,
    	    		success:function(result){
    	    		 	result = eval("("+result+")");
    	    		 	qn_video_token.prefix= result.prefix;
	    		 		qn_video_token.policy = result.policy;
	    		 		qn_video_token.OSSAccessKeyId = result.accessid;
	    		 		qn_video_token.host = result.host;
	    		 		qn_video_token.signature = result.signature;
    	    		}
    	    	})
		    }else{
	            key = qn_video_token.prefix+generic_name()+filename.substr(filename.lastIndexOf("."));
			    new_multipart_params = {
			        'key' : key,
			        'policy': qn_video_token.policy,
			        'OSSAccessKeyId': qn_video_token.OSSAccessKeyId, 
			        'success_action_status' : '200', //让服务端返回200,不然，默认会返回204
			        'host' : qn_video_token.host,
			        'signature': qn_video_token.signature,
			    };

			    up.setOption({
			        'url': up_url,
			        'multipart_params': new_multipart_params
			    });
			}
		}
		var video_up = new plupload.Uploader({
		    runtimes : 'html5,flash,silverlight,html4',
		    browse_button : 'videoupload', 
		    multi_selection: false,
		    flash_swf_url: '/static/js/plupload/Moxie.swf',
		    silverlight_xap_url : '/static/js/plupload/Moxie.xap',
		    url : "http://oss.aliyuncs.com",
		    filters: {
	            mime_types : [ //只允许上传图片
	            { title : "Video files", extensions : "mp4" }, 
	            ],
	            max_file_size : '900mb', //
	            prevent_duplicates : true //不允许选取重复文件
	        },
		    init: {
		        PostInit: function() {
		        	set_upload_param(video_up, '', false);
		        },
		        FilesAdded: function(up, files) {
					var file= files[files.length-1];
					$("#fsUploadProgress").append('<tr>'+
	                        '<th class="col-md-4">'+file.name+'</th>'+
	                        '<th class="col-md-2">'+(file.size/1024).toFixed(1)+' KB</th>'+
	                        '<th class="col-md-6"><div class="progress progress-striped" id="'+file.id+'"><div class="progress-bar progress-bar-success" style="width: 0%"></div><span class="text-muted" style="font-size:11px;font-weight:normal;">点击下方发布按钮开始上传</span></div></th>'+
	                      	'</tr>');
					$("#video_up_table").show();
		            return false;
		        },
		        BeforeUpload: function(up, file) {
		            $("#videoupload").css('pointer-events','none');
		            set_upload_param(up, file.name, true);
		        },

		        UploadProgress: function(up, file) {
		            var d = document.getElementById(file.id);
		            d.getElementsByTagName('span')[0].innerHTML = '  ' + file.percent + "%";
		            var progBar = d.getElementsByTagName('div')[0];
		            // var progBar = prog.getElementsByTagName('div')[0]
		            progBar.style.width= file.percent+'%';
		            progBar.setAttribute('aria-valuenow', file.percent);
		        },

		        FileUploaded: function(up, file, info) {
		            if (info.status == 200)
		            {   
    	                var video = {};
    	                video.location = key;
    	                video.name = file.name;
    	                video.size = file.size;
    	                videoParams.videos.push(video);
    	                var files = up.files;
    	                if(files[files.length-1].id == file.id){
    						if (audio_uploader.files.length>0)
    							audio_uploader.start();
    						else
    							doVideoCommint();
    	                }
		            }
		            else
		            {
		                alert_notice("上传失败");
		            } 
		            $("#selectfiles").css('pointer-events','');
		        },

		        Error: function(up, err) {
		            if (err.code == -600) {
		                alert_notice("选择的文件太大了,不能超过900M");
		            }
		            else if (err.code == -601) {
		                 alert_notice("只能上传jpg格式大小的图片");
		            }
		            else if (err.code == -602) {
		                 alert_notice("这个文件已经上传过一遍了");
		            }
		            else 
		            {   
		                alert_notice("上传异常");
		            }
		        }
		    }
		});
		video_up.init();
	</script>


<?php }?>

<script>
	var audio_key="";
	function success_Upload(obj){
		this.videoParams.videos=obj.videoParams.videos;
		if(audio_uploader.files.length>0)
			audio_uploader.start();//启动上传音频
		else
			doVideoCommint();
	}
	function doVideoCommint(){
		var obj = alert_notice("等待执行...","success",'top',0);
        	$.post("/add/video",{
				"act":"doAdd",
				"params":JSON.stringify(videoParams)
				},function(result){
					obj.hide();
					result = eval("("+result+")");
					if (result.flag) {
						alert_notice("发布成功","success");
						window.location.href ="/member/project?act=videos";
					}else{
						alert_notice(result.msg);
					}
		})
	}
	//音频文件上传
	function set_audio_upload_param(up, filename, ret){
	    if (ret == false)
	    {
	        audio_token ={};
        	$.ajax({
        		url:"/get_token.php",
        		data:{"act":"video"},
	    		async: false,
	    		success:function(result){
	    		 	result = eval("("+result+")");
	    	    		audio_token.prefix= result.prefix;
	    		 	if (result.policy) {
		    		 		audio_token.policy = result.policy;
		    		 		audio_token.OSSAccessKeyId = result.accessid;
		    		 		audio_token.host = result.host;
		    		 		audio_token.signature = result.signature;
	    		 	}else{
	    		 		audio_token.token = result.token;
	    		 	}
	    		}
	    	})
	    }else{
            audio_key = audio_token.prefix+generic_name()+filename.substr(filename.lastIndexOf("."));
            var new_multipart_params;
            if (audio_token.policy) {
            	new_multipart_params = {
			        'key' : audio_key,
			        'policy': audio_token.policy,
			        'OSSAccessKeyId': audio_token.OSSAccessKeyId,
			        'success_action_status' : '200', //让服务端返回200,不然，默认会返回204
			        'host' : audio_token.host,
			        'signature': audio_token.signature,
		    	}
            }else{
            	 new_multipart_params = {
		        	'key' : audio_key,
		        	'token':audio_token.token
		    	}
            }
		    up.setOption({
		        'url': up_url,
		        'multipart_params': new_multipart_params
		    });
		}
	}
	var audio_uploader = new plupload.Uploader({
		    runtimes : 'html5,flash,silverlight,html4',
		    browse_button : 'audioupload',
		    multi_selection: false,
		    max_file_count:1,
		    flash_swf_url: '/static/js/plupload/Moxie.swf',
		    silverlight_xap_url : '/static/js/plupload/Moxie.xap',
		    url : up_url,
		    filters: {
	            mime_types : [ //只允许上传图片
	            { title : "audio files", extensions : "m4a,mp3" },
	            ],
	            max_file_size : '10M', //
	            prevent_duplicates : true //不允许选取重复文件
	        },
		    init: {
		        PostInit: function() {
		        	set_audio_upload_param(audio_uploader, '', false);
		        },
		        FilesAdded: function(up, files) {
		        	if (files.length>1) {
		        		alert_notice("最多上传一个音频");
		        		return false;
		        	}
					var file= files[0];
					$("#audio_UploadProgress").append('<tr>'+
	                        '<th class="col-md-4">'+file.name+'</th>'+
	                        '<th class="col-md-2">'+(file.size/1024).toFixed(1)+' KB</th>'+
	                        '<th class="col-md-6"><div class="progress progress-striped" id="'+file.id+'"><div class="progress-bar progress-bar-success" style="width: 0%"></div><span class="text-muted" style="font-size:11px;font-weight:normal;">点击下方发布按钮开始上传</span></div></th>'+
	                      	'</tr>');
					$("#audio_up_table").show();
		            return false;
		        },
		        BeforeUpload: function(up, file) {
		            $("#audioupload").css('pointer-events','none');
		            set_audio_upload_param(up, file.name, true);
		        },

		        UploadProgress: function(up, file) {
		            var d = document.getElementById(file.id);
		            d.getElementsByTagName('span')[0].innerHTML = '  ' + file.percent + "%";
		            var progBar = d.getElementsByTagName('div')[0];
		            progBar.style.width= file.percent+'%';
		            progBar.setAttribute('aria-valuenow', file.percent);
		        },
		        FileUploaded: function(up, file, info) {
		        	if (info.status == 200 )
		            {
		            	videoParams.audio = audio_key; 
		            	doVideoCommint();
		            }else{
		            	alert_notice('上传失败');
		            }
		        },
		        Error: function(up, err) {
		            if (err.code == -600) {
		                alert("选择的文件太大了,不能超过10M");
		            }
		            else if (err.code == -601) {
		                 alert("只能上传mp3或m4a格式的文件");
		            }
		            else if (err.code == -602) {
		                 alert("这个文件已经上传过一遍了");
		            }
		            else
		            {
		                alert("上传异常");
		            }
		        }
		    }
		 });
		 audio_uploader.init();	
</script>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/library/footer.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>