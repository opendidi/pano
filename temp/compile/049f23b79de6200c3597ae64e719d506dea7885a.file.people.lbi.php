<?php /* Smarty version Smarty-3.1.7, created on 2021-07-21 15:38:18
         compiled from "D:/VR/VR0002/template\default\index\people.lbi" */ ?>
<?php /*%%SmartyHeaderCode:2711360f7ceea406667-91221380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '049f23b79de6200c3597ae64e719d506dea7885a' => 
    array (
      0 => 'D:/VR/VR0002/template\\default\\index\\people.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2711360f7ceea406667-91221380',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'author' => 0,
    'index_show' => 0,
    'work_stat' => 0,
    '_lang' => 0,
    'level' => 0,
    'region' => 0,
    'filter' => 0,
    'groups' => 0,
    'g' => 0,
    'maxNode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60f7ceea5811c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60f7ceea5811c')) {function content_60f7ceea5811c($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['author']->value){?>
<style type="text/css">
body{
	background: url("/static/images/people_bg.jpg") repeat
}
.df_h{
	height: 70px;
	background: #ffffff;
}
.df_h_con{
	width: 1050px;
	margin: 0 auto;
	height: 70px;
}

.df_h_con .df_h_data{
	height: 42px;
	margin-top: 14px;
}
.df_h_con .df_h_data>div.head{
	float: left;
}
.df_h_con .df_h_data>div.head>img{

	width: 42px;
	height: 42px;
}

.df_h_con .df_h_data>div.detail{
	float: left;
	margin-left: 10px;
}
.df_h_con .df_h_data>div.detail>p{
	margin-bottom: 0;
}
.df_h_con .df_h_data>div.detail>p>span{
	margin-right: 15px;
}
.df_h_con .df_h_data>div.detail>p>span.names{
	font-size: 16px;
	font-weight: bold;
}

.df_h_con .df_h_data>div.detail>p>span.rz{
	color: #fd8e21;
}
.df_h_con .df_h_data>div.detail>p>span.zl>a{
	color: #4a90e2;
}

.df_h_con .df_tab{
	list-style: none;
	margin: 0;
	padding: 0;
	height: 22px;
	margin-top: 24px;
	float: right;
}
.df_h_con .df_tab>li{
	text-align: center;
	float: left;
}
.df_h_con .df_tab>li>a,.df_h_con .df_tab>li>a:hover,.df_h_con .df_tab>li>a:active{
	display: inline-block;
	padding: 0px 20px ;
	height: 22px;
	line-height: 22px;
	color: #222222;
	text-decoration: none;
}
.df_h_con .df_tab>li>a.active{
	background: #4a90e2;
	color: #FFFFFF;
}

@media (max-width: 1200px){
	.df_h_con{
		width: 100%;
		height: 120px;
	}
	.df_h{
		height: 120px;
		margin-top: -20px;;
	}
	.df_h_con .df_tab{
		width: 100%;
		height: 22px;
		margin-top: 24px;
	}
	.df_h_con .df_tab>li{
		width: 50%;
		float: left;
	}
	.df_h_con .df_tab>li:first-child{
		border-right: 1px solid #eeeeee;
	}
	.df_h_con .df_tab>li>a,.df_h_con .df_tab>li>a:hover,.df_h_con .df_tab>li>a:active{
		padding: 0px;
		height: 22px;
		line-height: 22px;
		color: #222222;
		text-decoration: none;
	}
	.df_h_con .df_tab>li>a.active{
		background: none;
		color: #4a90e2;
	}
}


	/*弹出层*/
	.modal-body>ul.zz_zl{
		list-style: none;
		margin: 0;
		padding: 0;
		margin-top: -12px;
	}
.modal-body>ul.zz_zl>li{
	width: 100%;
	border-bottom: 1px solid #eeeeee;
	text-align: left;
	padding: 15px 10px;
}
.modal-body>ul.zz_zl>li:last-child{
	border-bottom: none;
}
.modal-body>ul.zz_zl>li>span{
	display: inline-block;
	width: 50%;
}
@media (max-width: 1050px){
	.modal-body>ul.zz_zl>li>span{
		display: inline-block;
		width: 100%;
		margin-bottom: 10px;
	}
	.modal-body>ul.zz_zl>li>span:last-child{
		margin-bottom: 0px;
	}
	.modal-body>ul.zz_zl>li{
		padding: 15px 0px;
	}
}




</style>
<?php if (!empty($_smarty_tpl->tpl_vars['index_show']->value)){?>
	<iframe id="top_pano" src="<?php echo $_smarty_tpl->tpl_vars['index_show']->value;?>
" frameborder="0" width="100%" style="margin-top: -20px" class="hidden-xs hidden-sm"></iframe>
<?php }?>
<!--资料弹框-->
<div class="modal fade" id="fx_modal">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
    	       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
    	       <h4 class="modal-title">作者资料：</h4>
    	   </div>
    	     <div class="modal-body" style="text-align:center">
				 <ul class="zz_zl">
					 <li>昵称：<?php echo $_smarty_tpl->tpl_vars['author']->value['nickname'];?>
</li>
					 <li><span>电话：<?php echo $_smarty_tpl->tpl_vars['author']->value['phone'];?>
</span><span>QQ：<?php echo $_smarty_tpl->tpl_vars['author']->value['qq'];?>
</span></li>
					 <li><span>地区：<?php echo $_smarty_tpl->tpl_vars['author']->value['region'];?>
</span><span>邮件：<?php echo $_smarty_tpl->tpl_vars['author']->value['email'];?>
</span></li>
					 <li>简介：<?php echo $_smarty_tpl->tpl_vars['author']->value['intro'];?>
</li>
				 </ul>
    	     </div>
    </div>
  </div>
</div>

<script> 
	$(function(){
		$("#top_pano").height($(window).height()-120+"px");
	})
	$(window).resize(function(){
		$("#top_pano").height($(window).height()-120+"px");
	});
	function show_profile(){
		$("#fx_modal").modal("show");
	}
</script>
<div class="container-fluid df_h">
	<div class="df_h_con">
		<div class="row" style="margin: 0">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="df_h_data">
					<div class="head"><img src="<?php if (!empty($_smarty_tpl->tpl_vars['author']->value['avatar'])){?><?php echo $_smarty_tpl->tpl_vars['author']->value['avatar'];?>
<?php }else{ ?>/static/images/default_avatar.jpg<?php }?>" /></div>
					<div class="detail">
						<p><span class="names"><?php echo $_smarty_tpl->tpl_vars['author']->value['nickname'];?>
</span><span class="rz"><?php if ($_smarty_tpl->tpl_vars['author']->value['level']>1){?>认证摄影师<?php }?></span><span class="zl"><a href="javascript:void(0);" onClick="javascript:show_profile();">资料</a> </span></p>
						<p style="color: #999999;">全景图片：<?php echo $_smarty_tpl->tpl_vars['work_stat']->value['counts'];?>
　人气：<?php echo number_format($_smarty_tpl->tpl_vars['work_stat']->value['browses'],0,'.',',');?>
</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<ul class="row df_tab">
					<li class=""><a href="javascript:void(0);" class="active" onclick="toggle_project('pic',this)">全景摄影</a> </li>
					<li class=""><a href="javascript:void(0);" onclick="toggle_project('video',this)">全景视频</a> </li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="cards">
		<div id="pictures_content">
		</div>
	</div>
</div>
<script>
 	var page = 1;
 	var type = 'pic'; //1 查询全景图 2查询全景视频
 	var uid = '<?php echo $_smarty_tpl->tpl_vars['author']->value['pk_user_main'];?>
';
 	var play_host = '<?php echo $_smarty_tpl->tpl_vars['_lang']->value['cdn_host'];?>
video/play.html?vid=';
	$(function(){
		list(type);
		$(window).scroll(function(){
		　　var scrollTop = $(this).scrollTop();
		　　var scrollHeight = $(document).height();
		　　var windowHeight = $(this).height();
		　　if(scrollTop + windowHeight == scrollHeight){
		　　　　list(type);
		　　}
		});
	})
	function toggle_project(t,obj){
		$(".df_tab .active").removeClass('active');
		$(obj).addClass('active');
		type = t;
		page = 1;
		$("#pictures_content").html('');
		list(type);
	}
	function list(type){
		alert_notice("加载中...",'success','bottom',500);
		$.post('/people',{
			'uid':uid,
			'type':type,
			'page':page
		},function(res){
			if (res.length==0) {
				alert_notice("没有更多了",'default','bottom');
			}else{
				var html = '';
				if(type == 'pic'){
					for(var i=0 ; i<res.length;i++){
						var p = res[i];
						html+='<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">'+
						   '<div class="card" href="###">'+
							' <a target="_blank" href="/tour/'+p.view_uuid+'"><img src="'+p.thumb_path+'" alt="'+p.name+'" style="max-height:240px"></a>'+
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
				}else{
					for(var i=0 ; i<res.length;i++){
						var p = res[i];
						html+='<div class="col-md-4 col-sm-4 col-xs-6 col-lg-4">'+
						   '<div class="card ce1" href="###">'+
							' <a target="_blank" href="'+play_host+p.id+'"><img src="'+p.thumb_path+'" alt="'+p.vname+'" ></a>'+
							 '<div class="card-heading">'+
							'	<div class="col-md-9 col-xs-8 of_hide padding0">'+
							'		<strong class="text-primary">'+p.vname+'</strong> '+
							'	</div>'+
							'	<div class="col-md-3 col-xs-4 of_hide padding0">'+
							'		<div class="pull-right text-danger"><i class="icon-heart-empty"></i>'+p.browsing_num+'</div>'+
							'	</div>'+
							' </div>'+
						 ' </div>'+
						' </div>';
					}
				}
				if(page == 1)
					$("#pictures_content").html(html);
				else
					$("#pictures_content").append(html);
				page++;

			}
			
		},'json');
	}



</script>
<?php }else{ ?>

<style>



	/*作者专用css*/
	.bz_people{
		margin-top: 20px;
		margin-bottom: 20px;
	}

	.bz_people_con{
		background: #ffffff;
		padding-top: 20px;
		box-shadow: 0px 2px 2px #eee;
		margin: 0;
		margin-bottom: 20px;
	}
	.bz_people_con>div>a>img{
		border-radius: 1000px;
	}
	.bz_people_con .bz_people_name{
		text-align: center;
		height: 40px;
		color: #222222;
		line-height: 40px;
	}
	.bz_people_con .bz_people_name>a{
		color: #222222;
	}

	.bz_people_xx{
		background: #f2f2f2;

	}
	.bz_people_xx>ul{
		list-style: none;
		padding: 0;
		margin: 0;
		height: 60px;
	}
	.bz_people_xx>ul>li{
		border-right: 1px solid #eaeaea;
		height: 60px;
		padding-top: 10px;
		color: #888888;
	}
	.bz_people_xx>ul>li:last-child{
		border-right: 0px;
	}

	.bz_people_xx>ul>li>p{
		margin: 0;
		text-align: center;
	}
	.bz_people_xx>ul>li>p:last-child{
		font-size: 18px;
		color: #02a6d9;
	}


	.bz_people_rz{
		position: relative;
	}
	.bz_people_rz>span{
		position: absolute;
		display: inline-block;
		width: 30px;
		height: 20px;
		background: #ff7f00;
		top: -20px;
		color: #FFFFFF;
		font-size: 12px;
		text-align: center;
		line-height: 20px;
	}

	@media (max-width: 1050px) {
		.bz_people_xx>ul>li>p:last-child{
			font-size: 12px;
			color: #02a6d9;
		}
	}

	/*选择作者专用css*/
	.bz_c>div.row{
		background: #f3f3f3;
		border: 1px solid #dddddd;
		border-radius: 4px;
		padding: 25px 0px 0px 0px;
		font-family: arail, 宋体;
	}
	.bz_c ul{
		list-style: none;
		margin: 0;
		padding: 0;
	}
	.bz_c .bz_chanelbox{
		margin-bottom: 10px;
	}
	.bz_c .bz_chanelbox>label>h2,.bz_c .control-label>h2{
		color: #888;
		margin: 0;
		font-size: 14px;
		font-family: arail, 宋体;
		margin-top: 3px;
	}

	.bz_c .control-label>h2{
		margin-top: 7px;
	}

	.bz_c .bz_chanelbox>ul>li{
		float: left;
		margin-right: 30px;
	}
	.bz_c .bz_chanelbox>ul>li>a{
		color: #888888;
		font-size: 14px;
	}
	.bz_c .bz_chanelbox>ul>li>a.active{
		color: #00a3d8;
	}
	@media (max-width: 1050px){
		.bz_c .bz_chanelbox{
			margin-bottom: 10px;
		}
		.bz_c .bz_chanelbox>label>h2,.bz_c .control-label>h2{
			color: #888;
			margin: 0;
			font-size: 12px;
			margin-top: 3px;
		}
		.bz_c .control-label>h2{
			margin-top: 10px;
		}
		.bz_c .bz_chanelbox>ul>li{
			float: left;
			margin-right: 15px;
			margin-bottom: 5px;
		}
		.bz_c .bz_chanelbox>ul>li:last-child{
			margin-right: 0px;
		}
		.bz_c .bz_chanelbox>ul>li>a{
			color: #888888;
			font-size: 12px;
		}

	}

</style>
<div class="container bz_c">
	<div class="row" style="margin: 0px;">
		<div class="bz_chanelbox col-md-12">
			<label class="col-md-1 col-xs-2 control-label bz_zz_choicename"><h2>作者</h2></label>
			<ul class="channel col-md-11 col-xs-10" style="margin-bottom: 0">
				<li class="bz_zz_choice"><a href="/people?spm=<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
.0.<?php echo $_smarty_tpl->tpl_vars['region']->value;?>
" <?php if (empty($_smarty_tpl->tpl_vars['filter']->value)||$_smarty_tpl->tpl_vars['filter']->value==0){?>class="active"<?php }?>>全部</a></li>
				<li class="bz_zz_choice"><a href="/people?spm=<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
.1.<?php echo $_smarty_tpl->tpl_vars['region']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['filter']->value===1){?>class="active"<?php }?>>人气</a></li>
				<li class="bz_zz_choice"><a href="/people?spm=<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
.2.<?php echo $_smarty_tpl->tpl_vars['region']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['filter']->value===2){?>class="active"<?php }?>>作品</a></li>
				<li class="bz_zz_choice"><a href="/people?spm=<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
.3.<?php echo $_smarty_tpl->tpl_vars['region']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['filter']->value===3){?>class="active"<?php }?>>新晋</a></li>
				<li class="bz_zz_choice"><a href="/people?spm=<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
.4.<?php echo $_smarty_tpl->tpl_vars['region']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['filter']->value===4){?>class="active"<?php }?>>综合</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>

		<div class="bz_chanelbox col-md-12">
			<label class="col-md-1 col-xs-2 control-label bz_zz_choicename"><h2>筛选</h2></label>
			<ul class="channel col-md-11 col-xs-10">
					<li class="bz_zz_choice"><a href="/people?spm=0.<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['region']->value;?>
" <?php if (empty($_smarty_tpl->tpl_vars['level']->value)||$_smarty_tpl->tpl_vars['level']->value==0){?>class="active"<?php }?>>全部</a></li>
				<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
					<li class="bz_zz_choice"><a href="/people?spm=<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
.<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['region']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['g']->value['id']==$_smarty_tpl->tpl_vars['level']->value){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['g']->value['level_name'];?>
</a></li>
				<?php } ?>
			</ul>
			<div class="clearfix"></div>
		</div>
		
		
		<?php if ($_smarty_tpl->tpl_vars['maxNode']->value){?>
        <div class="form-group col-md-12">
            <label class="col-md-1 col-xs-2 control-label"><h2>地区</h2></label>
            <div class="col-md-8 col-xs-10">
                <?php echo $_smarty_tpl->getSubTemplate ("../../plugins/region.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>
        </div>
   	<?php }?>
		
	</div>

</div>
<div class="container bz_zz">
	<!--一个卡片列表行-->
	<div class="row">
		<div class="bz_people">
			<div class="cards" style="margin:0;">
				<!--卡片列表循环-->
				<div id="pictures_content">
				</div>
				<!--卡片列表循环结束-->	
			</div>
		</div>
	</div>
	<!--一个卡片列表行结束-->
</div>
<script>
 	var page = 1;
	var level= '<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
';
	var filter = '<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
';
	var region = '<?php echo $_smarty_tpl->tpl_vars['region']->value;?>
';
	var maxNode = '<?php echo $_smarty_tpl->tpl_vars['maxNode']->value;?>
';
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
		$('#region_type_'+maxNode).change(function(){	
			window.location.href = '/people?spm='+level+'.'+filter+'.'+$(this).val()+'';
		});
		$('#region_type_1').change(function(){	
			if($(this).val()==-1){
				window.location.href = '/people?spm='+level+'.'+filter+'.0';
			}
		});
	})
	function list(){
		alert_notice("加载中...",'success','bottom',500);
		$.post('/people',{
			'ajax':1,
			'spm':''+level+'.'+filter+'.'+region+'',
			'page':page
		},function(res){
			var res = res.res;
			if (res.length==0) {
				alert_notice("没有更多了",'default','bottom');
			}
			else{
				var html = '';
				for(var i=0 ; i<res.length;i++){
					var p = res[i];
					html += '<div class="col-md-3 col-xs-6">'
						+'<div class="bz_people_con row">';
					if(p.level>1){
						html += '<div class="bz_people_rz"><span>认证</span></div>';
					}			
					html +=	'<div class="col-md-6 col-md-offset-3 col-xs-12"><a href="/people/'+p.pk_user_main+'" target="_blank"><img src="'+p.avatar+'" onerror="this.src=\'/static/images/default_avatar.jpg\'"/></a> </div>'
						+	'<div class="col-md-12  col-xs-12 bz_people_name"><a href="/people/'+p.pk_user_main+'" target="_blank">'+p.nickname+'</a> </div>'
						+	'<div class="col-md-12 col-xs-12 bz_people_xx">'
						+		'<ul class="row">'
						+			'<li class="col-md-6 col-xs-6">'
						+				'<p>人气</p>'
						+				'<p>'+p.popular+'</p>'
						+			'</li>'
						+			'<li class="col-md-6 col-xs-6">'
						+				'<p>作品</p>'
						+				'<p>'+p.total+'</p>'
						+			'</li>'
						+		'</ul>'
						+	'</div>'
						+'</div>'
					+'</div>';
				}
				if(page == 1)
					$("#pictures_content").html(html);
				else
					$("#pictures_content").append(html);
				page++;
			}
			
		},'json');
	}
</script>
<?php }?><?php }} ?>