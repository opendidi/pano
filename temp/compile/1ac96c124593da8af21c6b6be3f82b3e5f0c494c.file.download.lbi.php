<?php /* Smarty version Smarty-3.1.7, created on 2021-07-21 15:37:32
         compiled from "D:/VR/VR0002/template\default\member\download.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1987960f7cebc8e5692-59816825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ac96c124593da8af21c6b6be3f82b3e5f0c494c' => 
    array (
      0 => 'D:/VR/VR0002/template\\default\\member\\download.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1987960f7cebc8e5692-59816825',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'taskList' => 0,
    'task' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60f7cebcbceb3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60f7cebcbceb3')) {function content_60f7cebcbceb3($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/library/member_paths.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

<div class="container">
	<div class="row">
	  <div class="col-md-13">
			<div class="list_wrap">
				<div id="list_wrap_content">	
				 <?php if (count($_smarty_tpl->tpl_vars['taskList']->value)<1){?>
				 <div id="list_wrap_content">
					 <span style="width:100px;text-align:center;margin-left:40%;margin-top:50px;font-size:16px;display:inline-block">
					 没有结果!
					 </span>
				 </div>
				 <?php }else{ ?>
				 	
				 <?php  $_smarty_tpl->tpl_vars['task'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['task']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['taskList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['task']->key => $_smarty_tpl->tpl_vars['task']->value){
$_smarty_tpl->tpl_vars['task']->_loop = true;
?>
				  <div class="items">
					  <div class="item">
						  <div class="item-content">
							  <div class="pull-left">
							   <img src="<?php echo $_smarty_tpl->tpl_vars['task']->value['thumb'];?>
" width="60" height="60" class="img-rounded">
							  </div>
							  <div class="pull-left works_intro">
								  <div style="font-weight:bold"><?php echo $_smarty_tpl->tpl_vars['task']->value['pname'];?>
</div>
								  <div class="text-muted">
									  <span><?php echo $_smarty_tpl->tpl_vars['task']->value['create_time'];?>
</span>
								  </div>
							  </div>
							  <div class="pull-right">
								  <table width="100%">
									<tr class="download-tasking" id="down_<?php echo $_smarty_tpl->tpl_vars['task']->value['pid'];?>
" data-pid='<?php echo $_smarty_tpl->tpl_vars['task']->value['pid'];?>
' data-tid='<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
'' data-status='<?php echo $_smarty_tpl->tpl_vars['task']->value['status'];?>
' >
										<td width="300px">
											<div class="progress" style="margin-bottom:5px">
											  <div class="progress-bar" role="progressbar"  style="width:<?php echo $_smarty_tpl->tpl_vars['task']->value['step']/23*100;?>
%"></div>
											</div>
											<span class="progressbar-value"><?php echo $_smarty_tpl->tpl_vars['task']->value['msg'];?>
</span>
										</td>
										<td width="200px" id="op_<?php echo $_smarty_tpl->tpl_vars['task']->value['pid'];?>
" align="center">
										<?php if ($_smarty_tpl->tpl_vars['task']->value['status']<=0){?>
											正在打包项目...
										<?php }elseif($_smarty_tpl->tpl_vars['task']->value['status']==1){?>
											<a onclick="createDownload(<?php echo $_smarty_tpl->tpl_vars['task']->value['pid'];?>
,<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
,'continue')" class="btn btn-grey">继续打包</a>
											<a onclick="createDownload(<?php echo $_smarty_tpl->tpl_vars['task']->value['pid'];?>
,<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
,'afresh')" class="btn btn-grey">重新打包</a>
										<?php }elseif($_smarty_tpl->tpl_vars['task']->value['status']==2){?>
											<a href="/download.php?act=project&filename=<?php echo $_smarty_tpl->tpl_vars['task']->value['folder'];?>
" class="btn btn-grey" target="_blank">下载</a>
											<a onclick="deleteDownload(<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
)" class="btn btn-grey">删除</a>
										<?php }?>

										</td>
									</tr>
								  </table>							

							  </div> 
						  </div> 
					  </div>
				  </div>
				  <?php } ?>
				  <?php }?>
				</div>
			</div>
	  </div>
	</div>
</div>

<script>

$(function(){
	$("tr[class='download-tasking']").each(function(){
		var status = $(this).data('status');
		var pid = $(this).data('pid');
		var tid = $(this).data('tid');
		if(status == 0){
			//创建下载
			createDownload(pid,tid,'normal');
		}
	});
	
})
function createDownload(pid,tid,operation){
	$.post('/member/download',{
		'pid' : pid,
		'act' : 'build',
		'operation':operation
	},function(res){
		if (res.status==1) {
			createDownload(pid,tid,'normal');
		}else if(res.status == 2){
			$('#op_'+pid).html('<a href="/download.php?act=project&filename='+res.folder+'" class="btn btn-grey" target="_blank">下载</a>&nbsp;&nbsp;<a onclick="deleteDownload('+tid+')" class="btn btn-grey">删除</a>');
		}
		updateProgress(pid,res.step,res.msg);
	},'json');
}
function updateProgress(pid,step,msg){
	$("#down_"+pid).find('.progress-bar').css('width',parseInt(step/23*100)+'%');
	if (msg!='') 
		$("#down_"+pid).find('.progressbar-value').html(msg);
}
function deleteDownload(tid){
	if(confirm('确认删除该离线下载吗？')){
		$.post("/member/download",
			{
			'tid':tid,
			'act':'delete',
			},function(data){
			if(data.status==1){
				alert_notice("删除成功","success");
				window.location.reload();
			}else{
				alert_notice("删除失败");
			}
		},'json');
	}
}


</script><?php }} ?>