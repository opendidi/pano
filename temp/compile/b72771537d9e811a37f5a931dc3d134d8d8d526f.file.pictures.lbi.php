<?php /* Smarty version Smarty-3.1.7, created on 2021-07-21 15:38:23
         compiled from "D:/VR/VR0002/template\default\index\pictures.lbi" */ ?>
<?php /*%%SmartyHeaderCode:2528860f7ceef12c601-10780576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b72771537d9e811a37f5a931dc3d134d8d8d526f' => 
    array (
      0 => 'D:/VR/VR0002/template\\default\\index\\pictures.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2528860f7ceef12c601-10780576',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'picturs_top_ad' => 0,
    'tag' => 0,
    'picture_tags' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60f7ceef1987e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60f7ceef1987e')) {function content_60f7ceef1987e($_smarty_tpl) {?><style type="text/css">
.channel-box{
font-family:"Hiragino Sans GB","arial","Tahoma";border-radius:5px;background:#f3f3f3;padding-left:20px;
color:#888;padding-bottom:18px;
}
.channel-box h2{
font-weight:normal;
}
ul.channel{
padding:0;
}
ul.channel li{
float:left;list-style-type:none;font-size:15px;width:50%;line-height:30px;cursor:pointer;
}
ul.channel li a{
color:#888;
}
ul.channel li a:hover{
text-decoration:underline;
}
ul.channel li a.active{
color:#00a3d8;
}
.of_hide{
	display: block;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>

<div class="container">

<?php if (!empty($_smarty_tpl->tpl_vars['picturs_top_ad']->value)){?>
	<div class="row" style="padding-left: 10px;padding-right: 10px;">
		<?php echo $_smarty_tpl->tpl_vars['picturs_top_ad']->value;?>

	</div>
<?php }?>
<!--一个卡片列表行-->
<div class="row">
	<div class="cards" style="margin:0;">
		<!--卡片列表循环-->
		<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
		 <div class="card channel-box">
		  <h2>频道</h2>
		  <ul class="channel">
		   <li><a onclick="list_by_tag(0,this)" class="active">全部</a></li>
		   <li><a onclick="list_by_tag(-1,this)" <?php if ($_smarty_tpl->tpl_vars['tag']->value===-1){?>class="active"<?php }?>>编辑推荐</a></li>
		   <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['picture_tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
		   	<li><a onclick="list_by_tag(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
,this)" <?php if ($_smarty_tpl->tpl_vars['tag']->value==$_smarty_tpl->tpl_vars['v']->value['id']){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a></li>
		   <?php } ?>
		   </ul>
		   <div class="clearfix"></div>
		  </div>
		 </div>
		<div id="pictures_content">
			
		</div>
		         
		<!--卡片列表循环结束-->	
	</div>
</div>
<!--一个卡片列表行结束-->
</div>
<script>
 	var page = 1;
 	var tag = 0 ;
	$(function(){
		list();
		$(window).scroll(function(){
		　　var scrollTop = $(this).scrollTop();
		　　var scrollHeight = $(document).height();
		　　var windowHeight = $(this).height();
		　　if(scrollTop + windowHeight == scrollHeight){
		　　　　list();
		　　}
		});
	})
	function list(){
		alert_notice("加载中...",'success','bottom',500);
		$.post('/pictures',{
			'act':'list',
			'tag':tag,
			'page':page
		},function(res){
			if (res.length==0) {
				alert_notice("没有更多了",'default','bottom');
			}else{
				var html = '';
				for(var i=0 ; i<res.length;i++){
					var p = res[i];
					html+='<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">'+
					   '<div class="card" href="###">'+
						' <a target="_blank" href="/tour/'+p.view_uuid+'"><img src="'+p.thumb_path+'" alt="'+p.name+'"></a>'+
						 '<div class="card-heading">'+
						'	<div class="col-md-9 col-xs-8 of_hide padding0">'+
						'		<strong class="text-primary">'+p.name+'</strong> '+
						'	</div>'+
						'	<div class="col-md-3 col-xs-4 of_hide padding0">'+
						'		<div class="pull-right text-danger"><i class="icon-heart-empty"></i>'+p.browsing_num+'</div>'+
						'	</div>'+
						' </div>'+
					 ' </div>'+
					' </div>';
				}
				page++;
				$("#pictures_content").append(html);
			}
			
		},'json');
	}
	function list_by_tag(_tag,obj){
		page=1;
		tag = _tag;
		$("#pictures_content").html("");
		list();
		$(".channel .active").removeClass("active");
		$(obj).addClass("active");
	}
</script><?php }} ?>