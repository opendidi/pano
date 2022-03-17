<?php /* Smarty version Smarty-3.1.7, created on 2018-12-10 10:19:36
         compiled from "D:/phpStudy/WWW/template\default\index\index.lbi" */ ?>
<?php /*%%SmartyHeaderCode:49685b3c40a26e85d2-55043545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7159df7bb0cf7fd0396d9666e8d84fc19a455ae4' => 
    array (
      0 => 'D:/phpStudy/WWW/template\\default\\index\\index.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49685b3c40a26e85d2-55043545',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b3c40a273e4d',
  'variables' => 
  array (
    'slide' => 0,
    'v' => 0,
    'index_top_ad' => 0,
    'i' => 0,
    'recommend' => 0,
    'index_bottom_ad' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3c40a273e4d')) {function content_5b3c40a273e4d($_smarty_tpl) {?><style>
	body{
		background-color: #efefef;
	}
	.inline.hidden-xs {
  		display: inline !important;
  	}
	.chosen_wrap{
	}
	.img_list{
		margin-bottom: 10px;
		cursor: pointer;
	}
	.title_cover{
		height: 30px;
		background-color: rgba(138,137,137,0.5);
		position: absolute;
		bottom: 0px;
		width: 100%;
		color: #fff;
		line-height: 30px;
		font-size: 14px;
		padding-left: 10px;
	}
	.more{
		margin-top: 10px;
		text-align: right;
		display: block;
	}
	.of_hide{
		display: block;
	    overflow: hidden;
	    text-overflow: ellipsis;
	}
	.padding0{
		padding: 0;
	}
	.cards .card .card-content span{
		width: 100%;
		height: 20px;
	}
	.content_nav{
		/*margin-top: 18px;*/
	}
	.content_nav .col-md-2 div{
		height: 60px;
		line-height: 60px;
		text-align: center;
		font-size: 23px;
		border-radius: 8px;
		cursor: pointer;
		color:#fff;
	}
	.content_nav .col-xs-4{
		margin-top: 10px;
	}
	.kf_block{
		background-color: #EA644A;
	}
	.gj_block{
		background-color: #F1A325;
	}
	.ly_block{
		background-color: #38B03F;
	}
	.jz_block{
		background-color: #03B8CF;
	}
	.jy_block{
		background-color: #BD7B46;
	}
	.xw_block{
		background-color: #8666B8;
	}
	div.flicking_con>.bz_flicking_inner {
    position: absolute;
    top: 470px;
    left: 50%;
    z-index: 999;
    margin: 0 auto;
    height: 21px;
}

div.flicking_con>.bz_flicking_inner a.on {
    background-position: 0 -5px;
}
div.flicking_con>.bz_flicking_inner a {
    float: left;
    width: 50px;
    height: 5px;
    margin: 0;
    margin-left: 10px;
    padding: 0;
    background: url('/template/default/images/icon/btn_main_img1.png') 0 0 no-repeat;
    display: block;
    text-indent: -1000px;
}
div.flicking_con>.bz_flicking_inner a:first-child{
    margin-left: 0;
}
.navbar{
	border-bottom:0 none;margin-bottom:0;
}
div.flicking_con>.bz_flicking_inner{
	top:400px;
}
</style>
<script>
	$(function(){
		$("#top_frame").load(function() {
			console.log($(this).contents().find("body").height());
			$(this).height($(window).height()*0.7);
		})
	})
</script>
<!-- 有上传焦点图 -->
<?php if (count($_smarty_tpl->tpl_vars['slide']->value)>0){?>
	<script type="text/javascript" src="/template/default/slide/js/jquery.event.drag-1.5.min.js"></script>
	<script type="text/javascript" src="/template/default/slide/js/jquery.touchSlider.js"></script>
	<link href="/template/default/slide/css/common.css" rel="stylesheet"/>
	<script type="text/javascript">
	$(document).ready(function () {
		/*$(".main_visual").hover(function(){
			$("#btn_prev,#btn_next").fadeIn()
			},function(){
			$("#btn_prev,#btn_next").fadeOut()
			})*/
		$dragBln = false;
		$(".main_image").touchSlider({
			flexible : true,
			speed : 200,
			btn_prev : $("#btn_prev"),
			btn_next : $("#btn_next"),
			paging : $(".flicking_con a"),
			counter : function (e) {
				$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
			}
		});
		$(".main_image").bind("mousedown", function() {
			$dragBln = false;
		})
		$(".main_image").bind("dragstart", function() {
			$dragBln = true;
		})
		$(".main_image a").click(function() {
			if($dragBln) {
				return false;
			}
		})
		timer = setInterval(function() { $("#btn_next").click();}, 5000);
		$(".main_visual").hover(function() {
			clearInterval(timer);
		}, function() {
			timer = setInterval(function() { $("#btn_next").click();}, 5000);
		})
		$(".main_image").bind("touchstart", function() {
			clearInterval(timer);
		}).bind("touchend", function() {
			timer = setInterval(function() { $("#btn_next").click();}, 5000);
		})
		
		
		var bz_f_width=$("div.flicking_con>.bz_flicking_inner").css('width');
		var bz_fw=-parseInt(bz_f_width)/2+"px";
		$("div.flicking_con>.bz_flicking_inner").css('margin-left',bz_fw);
	});
	</script>
	<div class="main_visual">
			<div class="flicking_con">
				<div class="bz_flicking_inner">
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['slide']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
					<a href="javascript:;"></a>
				<?php } ?>
				</div>
			</div>
			
			
			
			<div class="main_image">
				<ul>		
				    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['slide']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
					<li>
						<a href="<?php if (empty($_smarty_tpl->tpl_vars['v']->value['link'])){?>javascript:;<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['v']->value['link'];?>
<?php }?>" target="_blank">
							<span class="img" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['v']->value['img_path'];?>
);"></span>
						</a>
					</li>
					<?php } ?>
				</ul>
				<a href="javascript:;" id="btn_prev"></a>
				<a href="javascript:;" id="btn_next"></a>
			</div>
	</div>
<?php }?>
<div class="container" style="margin-top:20px">
	<?php if (!empty($_smarty_tpl->tpl_vars['index_top_ad']->value)){?>
		<div class="bz_banner hidden-xs hidden-sm">
			<?php echo $_smarty_tpl->tpl_vars['index_top_ad']->value;?>

		</div>
	<?php }?>
	<div class="row">
		<div class="col-md-3">
			<h2 class="text-muted">精选全景<small style="margin-left:10px;">优质的全景作品赏析</small></h2>
		</div>
	</div>
	<div class="row chosen_wrap">
		<div class="col-md-5" style="height:380px;">
			<div id="myNiceCarousel" class="carousel slide" data-ride="carousel">
			  <!-- 轮播项目 -->
			  <div class="carousel-inner">
			   <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 0;
  if ($_smarty_tpl->tpl_vars['i']->value<3){ for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value<3; $_smarty_tpl->tpl_vars['i']->value++){
?>
			    <div class="item <?php if ($_smarty_tpl->tpl_vars['i']->value==0){?>active<?php }?>">
			      <a target="_blank" href="/tour/<?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['view_uuid'];?>
">
				   <img src="<?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['thumb_path'];?>
"  class="img-responsive" style="width: 100%;max-height: 420px;">
			      </a>
				  <div class="carousel-caption">
			        <h3><?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['name'];?>
</h3>
			      </div>
			    </div>
			   <?php }} ?>    
			  </div>
			  <!-- 项目切换按钮 -->
			   <a class="left carousel-control" href="#myNiceCarousel" data-slide="prev">
			     <span class="icon icon-chevron-left"></span>
			   </a>
			   <a class="right carousel-control" href="#myNiceCarousel" data-slide="next">
			     <span class="icon icon-chevron-right"></span>
			   </a>
			</div>
		</div>

		<div class="col-md-7">
			<div class="row chosen_wrap">
			    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 3;
  if ($_smarty_tpl->tpl_vars['i']->value<9){ for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value<9; $_smarty_tpl->tpl_vars['i']->value++){
?>
				<div class="col-md-4 col-sm-4 col-xs-6 img_list">
					<a href="/tour/<?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['view_uuid'];?>
" target="_blank">
						<img src="<?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['thumb_path'];?>
" class="img-responsive">
					</a>
					<div style="position:relative">
						<div class="title_cover of_hide"><?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['name'];?>
</div>
					</div>
				</div>
			    <?php }} ?>    
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<h2 class="text-muted">推荐全景<small style="margin-left:10px;">为您推荐的优质作品</small><a href="/pictures"><small class="text-muted  pull-right more">更多>></small></a></h2>
		</div>
	</div>
	<!--一个卡片列表行-->
	<div class="row">
		<div class="cards" style="margin:0;">
			<!--卡片列表循环-->
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 9;
  if ($_smarty_tpl->tpl_vars['i']->value<21){ for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value<21; $_smarty_tpl->tpl_vars['i']->value++){
?>
			<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
			   <div class="card" href="###">
			     <a target="_blank" href="/tour/<?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['view_uuid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['thumb_path'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['name'];?>
"></a>
			     <div class="card-heading">
			     	<div class="col-md-9 col-xs-8 of_hide padding0">
			     		<strong class="text-primary"><?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['name'];?>
</strong> 
			     	</div>
			     	<div class="col-md-3 col-xs-4 of_hide padding0">
			     		<div class="pull-right text-danger"><i class="icon-heart-empty"></i> <?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['browsing_num'];?>
</div>
			     	</div>
			     </div>
			     <div class="card-content text-muted">
			     <span class="of_hide"><?php echo $_smarty_tpl->tpl_vars['recommend']->value[$_smarty_tpl->tpl_vars['i']->value]['profile'];?>
</span>
			     </div>
			   </div>
			 </div>
			<?php }} ?>	         
			<!--卡片列表循环结束-->	
		</div>
	</div>
	<!--一个卡片列表行结束-->
	<?php if (!empty($_smarty_tpl->tpl_vars['index_bottom_ad']->value)){?>
		<div class="row" style="padding-left: 10px;padding-right: 10px;padding-bottom: 25px">
			<?php echo $_smarty_tpl->tpl_vars['index_bottom_ad']->value;?>

		</div>
	<?php }?>
</div><?php }} ?>