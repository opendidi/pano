<?php /* Smarty version Smarty-3.1.7, created on 2021-07-21 15:37:37
         compiled from "D:/VR/VR0002/template\default\member\object_around.lbi" */ ?>
<?php /*%%SmartyHeaderCode:2975960f7cec131ac55-65234469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b694f22ee12b54bb4567c19d30e5bf73247dc54' => 
    array (
      0 => 'D:/VR/VR0002/template\\default\\member\\object_around.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2975960f7cec131ac55-65234469',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60f7cec13a61d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60f7cec13a61d')) {function content_60f7cec13a61d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_lang']->value['moban'])."/library/member_paths.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="container" style="margin-bottom: 20px;">
	<div class="main_wrap">
		<div class="row">
			<div class="col-md-3">
				共 <strong style="font-size:18px;"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong> 个作品
			</div>
			
			<div class="col-md-3">
		      <div class="input-group date form-date" data-date="" data-date-format="dd MM yyyy"  data-link-format="yyyy-mm-dd">
		        <input class="form-control" size="16" id="time_s"  type="text" value="" readonly="" placeholder="开始时间" >
		        <span class="input-group-addon"><span class="icon-remove"></span></span>
		        <span class="input-group-addon"><span class="icon-calendar"></span></span>
		      </div>
			</div>
			<div class="col-md-3">
				 <div class="input-group date form-date" data-date="" data-date-format="dd MM yyyy"  data-link-format="yyyy-mm-dd">
			        <input class="form-control" size="16" id="time_e"  type="text" value="" readonly="" placeholder="结束时间" >
			        <span class="input-group-addon"><span class="icon-remove"></span></span>
			        <span class="input-group-addon"><span class="icon-calendar"></span></span>
				</div>
			</div>
			<div class="col-md-2">
				<input type="text" id="oname" class="form-control"  placeholder="作品名">
			</div>
			<div class="col-md-1">
				<button class="btn btn-info" onclick="list_obj(1)">搜索</button>
			</div>
		</div>
		<div class="row" style="margin-top:30px;">
			<div class="col-md-12">
				 <div class="list_wrap">
			     	<div id="list_wrap_content"></div>
			     	<div id="pager_wrap"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

var pageSize = 10;
$(function(){
	list_obj(1,true);
	$(".form-date").datetimepicker({	
	    language:  "zh-CN",
	    weekStart: 1,
	    todayBtn:  1,
	    autoclose: 1,
	    todayHighlight: 1,
	    startView: 2,
	    minView: 2,
	    forceParse: 0,
	    format: "yyyy-mm-dd"
	});
})
function list_obj(currentPage,reset){
	var obj = alert_notice("页面加载中...",'success');
	var oname , time_s,time_e;
	if(!reset){
		oname = $.trim($("#oname").val());
		time_s = $("#time_s").val();
		time_e = $("#time_e").val();
		if(time_s!=""&&time_e==""){
			alert_notice("请选择结束时间");
			return false;
		}
		if(time_s==""&&time_e!=""){
			alert_notice("请选择开始时间");
			return false;
		}
   }else{
 		$("#oname").val("");
 		$("#time_s").val("");
 		$("#time_e").val("");
   }
   $("#list_wrap_content").html("");
   $.post("/member/object_around",{
   		"act":"list",
   		"pageSize":pageSize,
   		"page":currentPage,
   		"oname":oname,
   		"time_s":time_s,
   		"time_e":time_e
   },function(res){
   		var res = eval("("+res+")");
   		var h = "",data = res.list;
   		if (data.length==0) {
   			h='<span style="width:100px;text-align:center;margin-left:40%;margin-top:50px;font-size:16px;display:inline-block">没有结果!</span>';
			$("#pager_wrap").html("");
   		}else{
	   		for (var i = 0; i <data.length; i++) {
	   			var o = data[i];
	   			h+='<div class="items">'+
			  '<div class="item">'+
			    '<div class="item-content">'+
			    	'<div class=pull-left><input type="checkbox" style="margin:20px 10px 0 0" name="project_checkbox" data-pid="'+o.id+'"></div>'+
			    	'<div class="pull-left">'+
			    		'<img src="'+o.thumb_path+'" width="60" height="60" class="img-rounded" >'+
			    	'</div>'+
			    	'<div class="pull-left works_intro" >'+
			    		'<a href="" class="works_name" target="_blank">'+o.name+'</a>&nbsp;&nbsp;&nbsp;&nbsp;'+
			    		'<a href="/obj.php?oid='+o.id+'" class="works_preview" target="_blank">预览</a>'+
			    		'<div class="text-muted">'+
			    			'<span>'+o.create_time+'</span>'+
			    			'&nbsp;&nbsp;'+
			    			'<span><i class="icon icon-eye-open"></i>&nbsp;'+o.view_num+'</span>'+
			    		'</div>'+
			    	'</div>'+
			    	'<div class="pull-right works_edit">'+
			    		'<span><a href="/edit/object_around?oid='+o.id+'">编辑</a></span>'+
			    		'<span><a onclick="obj_del('+o.id+')">删除</a></span>'+
			    	'</div>'+
			   ' </div>'+
			 ' </div>'+
			'</div>';
	   		}
   			var pg = new Page('list_obj',res.pageCount,res.currentPage);
	   		$("#pager_wrap").html(pg.printHtml());
  	 	}
   		$("#list_wrap_content").html(h);
   		pageSize = res.pageSize;
   		obj.hide();
   })
}
function obj_del(obj_id){
	bootbox.confirm({
		message:"确定要删除该项目吗?",
		buttons: {  
            confirm: {  
                label: '确认',  
                className: 'btn-primary'  
            },  
            cancel: {  
                label: '取消',  
                className: 'btn-default'  
            }  
    	},
    	title:"提示：",
    	callback:function(result) {
        	if(result){
    			alert_notice("等待执行...","success",'top',5000);
				$.post("/member/object_around",{
					'act':'delete',
					'oid':obj_id
				},function(result){
					result = eval("("+result+")");
					if (result.status=='1') {
						alert_notice("操作成功","success");
						window.location.reload();
					}else{
						alert_notice(result.msg);
					}
			   })
        	}
		}
	});
}

</script><?php }} ?>