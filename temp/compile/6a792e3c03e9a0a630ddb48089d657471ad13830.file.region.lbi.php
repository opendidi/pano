<?php /* Smarty version Smarty-3.1.7, created on 2018-12-10 10:23:02
         compiled from "D:/phpStudy/WWW/vradmin/template\lib\region.lbi" */ ?>
<?php /*%%SmartyHeaderCode:270525b3c430e492b56-79400020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a792e3c03e9a0a630ddb48089d657471ad13830' => 
    array (
      0 => 'D:/phpStudy/WWW/vradmin/template\\lib\\region.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270525b3c430e492b56-79400020',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b3c430e4c57d',
  'variables' => 
  array (
    'regions' => 0,
    '_lang' => 0,
    'r' => 0,
    'pid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3c430e4c57d')) {function content_5b3c430e4c57d($_smarty_tpl) {?><style>
	.region_head{
	}
	.region_container{
	}
	.region_list{
		list-style: none;
	}
	.region_list li{
		float: left;
	    margin:0 20px 10px 0;
	    background-color: #0072C6;
	    font-size: 14px;
	    height: 25px;
	    padding:0 5px 0 10px;
	    line-height: 20px;
	}
	.region_list .rname{
		color: #fff;
		cursor: pointer;
	}
	.region_list input {
		height: 23px;
		padding:0 5px;
		background-color: #fff;
		width: 100px;
		float: left;
		border: 1px #0072c6 solid;
	}
	
</style>
<h3>
	<input type="text" value="" id="region_add" maxlength="100">
	<button class="btn" id="region_add_btn">新增区域</button>
	<input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
</h3>
<div class="region_container">
	<ul class="region_list">
		<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['regions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
			<li>
			<a class="rname" href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=region&pid=<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
</a>　
			<a href="javascript:void(0);" class="edit" data-id="<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"><img src="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/template/images/icon_edit.gif" /></a>
			<a href="javascript:void(0);" class="del" data-id="<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"><img src="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/template/images/icon_drop.gif" /></a>
			</li>
		<?php } ?>
	</ul>
</div>
<script>
	var url = '/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=region';
	var pid = <?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
;
	$(function(){
		$("#region_add_btn").click(function(){
			var name = $.trim($("#region_add").val());
			if (name=="") {
				alert("请输入区域名称");
				return false;
			}
			$.post(url+'&act=add',{
				'name':name,
				'pid':pid
			},function(res){
				if (res.status==1) {
				 	window.location.reload();
				}else{
					alert(res.msg);
				}
			},'json')
		});
		$(".region_list").on('click','.del',function(){
			  var r=confirm("确定要删除吗？")
			  if (r==true)
			  {
			  	var id = $(this).data('id');
			   $.post(url+'&act=del',{
			   				'id':id
	   			},function(res){
	   				if (res.status==1) {
	   					window.location.reload();
	   				}else{
	   					alert(res.msg);
	   				}
	   			},'json');
			  }
			  
			
		});
		$(".region_list").on('click','.edit',function(){
			  
			var region = $(this).prev('a').html();
			var dataId = $(this).attr('data-id');
			
			$(this).parent().append("<input type='text' name='region' value="+region+">");
			
			$("input[name='region']").blur(function(){
				region = $(this).val();
				// alert(dataId+region);
				$.post(url+'&act=edit',{
			   				'id':dataId,
			   				'name':region
	   			},function(res){
	   				if(res.status==1){
	   					window.location.reload();
	   				}else{
	   					alert(res.msg);
	   				}
	   			},'json');

				$(this).remove();
			});
		});
	})
</script><?php }} ?>