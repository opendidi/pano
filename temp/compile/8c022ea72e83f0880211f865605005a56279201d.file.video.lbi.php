<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:33:37
         compiled from "F:/0766city/vradmin/template\lib\video.lbi" */ ?>
<?php /*%%SmartyHeaderCode:226435b457a9174e641-58737491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c022ea72e83f0880211f865605005a56279201d' => 
    array (
      0 => 'F:/0766city/vradmin/template\\lib\\video.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226435b457a9174e641-58737491',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'recommon' => 0,
    'uid' => 0,
    'time_s' => 0,
    'time_e' => 0,
    'vname' => 0,
    'res' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457a917bc05',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457a917bc05')) {function content_5b457a917bc05($_smarty_tpl) {?><style>
	.num_edit{
		float:right;
		margin-right:10px;
		cursor: pointer;
	}
</style> 
<h3>
<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=video" method="post">
	<table>
		<tr>
		    <th width="50"><label><input type="checkbox" name="recommon" value="1" <?php if ($_smarty_tpl->tpl_vars['recommon']->value==1){?>checked<?php }?>/> 推荐</label></td>
			<th width="60">会员ID:</th>
			<td>
			   <input class="common-text" placeholder="请输入会员ID" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" size="10" type="text"/> 
			</td>
			<th width="60">发布时间:</th>
			<td>
			<input id="time_s" name="time_s" value="<?php echo $_smarty_tpl->tpl_vars['time_s']->value;?>
" size="10" onfocus="ca_show('time_s', this, '-');" readonly="" ondblclick="this.value='';" type="text"/>
			-
			<input id="time_e" name="time_e" value="<?php echo $_smarty_tpl->tpl_vars['time_e']->value;?>
" size="10" onfocus="ca_show('time_e', this, '-');" readonly="" ondblclick="this.value='';" type="text"/>
			</td>
			<th width="60">项目名称:</th>
			<td>
			   <input class="common-text" placeholder="请输入项目名称" name="vname" value="<?php echo $_smarty_tpl->tpl_vars['vname']->value;?>
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
		<th>会员ID</th>
		<th>缩略图</th>
		<th>项目名称</th>
		<th>发布人</th>
		<th>发布时间</th>
		<th>是否推荐</th>
		<th>排序&nbsp;&nbsp;<img src="/static/images/ico/notice.png" title="默认999,数字越小越靠前" style="cursor: pointer;"></th>
		<th>浏览量</th>
		<th>点赞量</th>
		<th>二维码</th>
		<th>操作</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['res']->value['res']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	<tr style="text-align: center;">
		<td><a target="_blank" href="/tour/<?php echo $_smarty_tpl->tpl_vars['v']->value['view_uuid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['pk_user_main'];?>
</td>
		<td style="width: 110px;cursor: pointer;"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['thumb_path'];?>
" width="80" height="80" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['_lang']->value['cdn_host'];?>
/video/play.html?vid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')"></td>
		<td id="p_<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><a target="_blank" href="/tour/<?php echo $_smarty_tpl->tpl_vars['v']->value['view_uuid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['vname'];?>
</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['nickname'];?>
</td> 
		<td style="width: 150px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['create_time'];?>
</td>
		<td style="width: 80px; cursor: pointer;" onclick="edit_recommon(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
)" id="recomm_<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['recommend']==0){?><img src="/static/images/ico/no.gif" ><?php }else{ ?><img src="/static/images/ico/yes.gif" ><?php }?></td>
		<td style="width:100px"><input type="text" class="inpEdit" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
" onBlur="javascript:edit(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
,3,this);"/></td> 
		<td style="width:100px"><input type="text" class="inpEdit" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['browsing_num'];?>
" onBlur="javascript:edit(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
,1,this);"/></td> 
		<td style="width:100px"><input type="text" class="inpEdit" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['praised_num'];?>
" onBlur="javascript:edit(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
,2,this);"/></td> 
		<td><a target="_blank" href="http://qr.liantu.com/api.php?w=300&m=10&text=<?php echo $_smarty_tpl->tpl_vars['_lang']->value['cdn_host'];?>
/video/play.html?vid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">打开查看</a></td> 
		<td><a class="red" href="javascript:;" onClick="javascript:del_project(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
);">删除</a></td>
	</tr>
	<?php } ?>
</table>
<div class="list-page"><?php echo $_smarty_tpl->getSubTemplate ("lib/pages.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>

<script type="text/javascript">
//删除项目
function del_project(pid){
    var pname = $("#p_"+pid).text();
    if(confirm("确认删除项目“"+pname+"”吗？")){
	    $.post("/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=video",{act:"delete",pid:pid},function(data){
		    var data = json_decode(data);
			if(data.status==1){
			    alert('成功删除项目');
				window.location.reload();
			}else{
				alert("删除失败");
			}
		});
	}
}
/*
function edit(pid,type,value){
  var num=prompt("请输入要修改的值(整数)",value)
  if (num!=null && num!="")
  {
    $.post("/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=video",{
    	act:"edit_num",
    	type:type,
    	num:num,
    	pid:pid
    },function(res){
    	res = eval("("+res+")");
    	if (res.flag==1) {
    		$("#num_"+type+"_"+pid).text(res.num);
    	}
    })
   }
}
*/
function edit(pid,type,ele){
  var num = parseInt($(ele).val());
  $(ele).addClass('inpEditing');
  $(ele).val('');
  if(isNaN(num) || num<1){
  	alert('请输入大于0的整数');
	$(ele).removeClass('inpEditing');
	return false;
  }
  $.post("/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=video",{
	act:"edit_num",
	type:type,
	num:num,
	pid:pid
  },function(res){
	res = eval("("+res+")");
	if (res.flag==1) {
		$(ele).removeClass('inpEditing');
		$(ele).val(res.num);
	}
  })
}

function edit_recommon(pid){
	 $.post("/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=video",{
    	act:"edit_recommon",
    	pid:pid
    },function(res){
    	res = eval("("+res+")");
    	if (res.flag==1) {

    		$("#recomm_"+pid).html('<img src="/static/images/ico/'+(res.recommend==0?"yes":"no")+'.gif" >');
    	}else{
    		alert("操作失败");
    	}
    })
}
</script><?php }} ?>