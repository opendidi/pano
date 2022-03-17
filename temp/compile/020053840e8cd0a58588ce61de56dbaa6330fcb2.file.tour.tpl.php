<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "F:/0766city/template\default\tour.tpl" */ ?>
<?php /*%%SmartyHeaderCode:308425b457aa9022f51-51979420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '020053840e8cd0a58588ce61de56dbaa6330fcb2' => 
    array (
      0 => 'F:/0766city/template\\default\\tour.tpl',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '308425b457aa9022f51-51979420',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'pro' => 0,
    'plugins' => 0,
    'v' => 0,
    'is_moble' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa90b8a2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa90b8a2')) {function content_5b457aa90b8a2($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title></title>
    <meta name="renderer" content="webkit">
	<meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta content="no-cache, no-store, must-revalidate" http-equiv="Cache-Control" />
    <meta content="no-cache" http-equiv="Pragma" />
    <meta content="0" http-equiv="Expires" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="/template/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['moban'];?>
/css/redefine.css">
	<link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.2.0/skins/default/aliplayer-min.css"/>
    <script language="JavaScript" type="text/javascript" src="/static/js/kr/uhweb.js?v=2.0"></script>
    <script language="JavaScript" type="text/javascript" src="/static/js/kr/video_patch.js?v=0105"></script>
	<script language="JavaScript" type="text/javascript" src="/static/js/kr/polygonHotSpot.js"></script>	
    <script language="JavaScript" type="text/javascript" src="/static/js/kr/vrshow.js?v=012301"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <style>
        @-ms-viewport { width:device-width; }
        @media only screen and (min-device-width:800px) { html { overflow:hidden; } }
        html { height:100%; }
        body { height:100%; overflow:hidden; margin:0; padding:0; font-family:microsoft yahei, Helvetica, sans-serif;  background-color:#000000; }
		.marquee{
            position: absolute;
            overflow:hidden;
            height:34px; 
            line-height:34px;
            width:100%;
            white-space:nowrap;
            z-index: 800;
            color:white;
            text-align: right;
            padding-right: 10px;
            letter-spacing: 1px;
            font-family: 黑体;
            font-size: 15px;
            background: rgba(0,0,0,.3);
    	}
    </style>
</head>
<body>

    <script language="JavaScript" type="text/javascript" src="/tour/tour.js?v=121901"></script>
    <div id="fullscreenid" style="position:relative;width:100%; height:100%;">
		<div class="vrshow_tour_btn_wrap" id="tour_btn_wrap">
              <div class="vrshow_tour_btn_oper" style="margin-right: 20px;">
                 <span class="btn_tour_text" onClick="tour_guid_pause(this)">暂停</span>
             </div>
              <div class="vrshow_tour_btn_oper">
                 <span class="btn_tour_text" onClick="tour_guid_stop()">停止</span>
             </div>
        </div>
		
        <div id="panoBtns" style="display:none">
			<div class="marquee" id="top_ad" style="display: none;">
			   <marquee  direction="left" behavior="scroll" scrollamount="5" scrolldelay="0" loop="-1" hspace="0" vspace="0"></marquee>
			</div>
            <div class="vrshow_container_logo">
                <img id="logoImg" src="/plugin/custom_logo/images/custom_logo.png" style="display: none;"  onclick="javascript:window.open('<?php echo $_smarty_tpl->tpl_vars['_lang']->value['host'];?>
')">

                <div class="vrshow_logo_title" id="user_name_wrap"  >
                    <div id="authorDiv" style="display: none;">作者：<span id="user_nickName"><?php echo $_smarty_tpl->tpl_vars['pro']->value['nickname'];?>
</span></div>
                    <div style="clear:both;"></div>

                </div>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['plugins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['enable']==1&&$_smarty_tpl->tpl_vars['v']->value['view_container']=="left_top"){?>
                        <?php echo $_smarty_tpl->getSubTemplate ("plugin/".($_smarty_tpl->tpl_vars['k']->value)."/template/view.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php }?>
                <?php } ?>

            </div>

            <div class="vrshow_container_1_min">
                <div class="btn_fullscreen" onClick="fullscreen(this)" title="" style="display:none"></div>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['plugins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['enable']==1&&$_smarty_tpl->tpl_vars['v']->value['view_container']=="right_top"){?>
                        <?php echo $_smarty_tpl->getSubTemplate ("plugin/".($_smarty_tpl->tpl_vars['k']->value)."/template/view.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php }?>
                <?php } ?>
            </div>
            <div class="vrshow_radar_btn" onClick="toggleKrpSandTable()">
                <!-- <span class="btn_sand_table_text">沙盘</span> -->
            </div>
            <div class="vrshow_tour_btn" onClick="startTourGuide()">
                <span class="btn_tour_text">一键导览</span>
            </div>
            <div class="vrshow_container_2_min">
            
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['plugins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['enable']==1&&$_smarty_tpl->tpl_vars['v']->value['view_container']=="right_bottom"){?>
                        <?php echo $_smarty_tpl->getSubTemplate ("plugin/".($_smarty_tpl->tpl_vars['k']->value)."/template/view.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php }?>
                <?php } ?>
            </div>
            

            <div class="vrshow_container_3_min">
                <div class="img_desc_container_min scene-choose-width" style="display:none">
                    <img src="/static/images/skin1/vr-btn-scene.png" onClick="showthumbs()">
                    <div class="img_desc_min">场景选择</div>
                </div>
            </div>
        </div>
        
        <div id="pano" style="width:100%; height:100%;">
        </div>
		
		<div class="modal" id="pictextModal" data-backdrop="static" data-keyboard="false" style="z-index:2002">
            <div class="modal-dialog">
                <div class="modal-header text-center" >
                    <button type="button" class="close" onClick="hidePictext()"><span>&times;</span></button>
                    <span style="color: #353535;font-weight:700" id="pictextWorkName"></span>
                </div>
                <div class="modal-body" style="height:400px;overflow-y:scroll ">
                    <div class="row">                   
                        <div class="col-sm-offset-1 col-md-offset-1 col-md-10 col-sm-10 col-xs-12" id="pictextContent">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="logreg">
        </div>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['plugins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['enable']==1&&$_smarty_tpl->tpl_vars['v']->value['view_resource']==1){?>
                <?php echo $_smarty_tpl->getSubTemplate ("plugin/".($_smarty_tpl->tpl_vars['k']->value)."/template/resource.lbi", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php }?>
        <?php } ?>
    </div>

   <div class="modal fade"  id="rewardModal" data-keyboard="false" style="z-index:2002">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header" style="padding:5px 15px;">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
            <h4 class="modal-title">打赏作者</h4>
          </div>
          <div class="modal-body">
              <div class="input-group">
			  	<span class="input-group-addon">&yen;</span>
                <input type="number" id="reward_amount" maxlength="6" class="form-control" placeholder="0.00" style="text-align: right;">
                <span class="input-group-addon">元</span>
				<button type="button" style="float:right;margin-left:5px" class="btn btn-primary btn-block" onClick="confirmReward()">确定打赏</button>
              </div>
			 
			  <div id="reward_lists"></div>
			  <ul class="pager pager-pills" style="margin:10px 0 0 0">
				<li class="previous"><a href="javascript:void(0);" id="reward_list_pre">« 上一页</a></li>
				<li class="next"><a href="javascript:void(0);" id="reward_list_next">下一页 »</a></li>
			  </ul>
			   <script type="text/javascript">
			  var pid = '<?php echo $_smarty_tpl->tpl_vars['pro']->value['pk_works_main'];?>
';	 
			  var reward_page = 1;
			  
			  function get_reward_lists(page){
			  	  reward_page = page;
			      $.post("/tour.php",{act:'reward_lists',pid:pid,page:page},function(data){
				   var lists_content = '';
				   for(var i=0;i<data.length;i++){		
				   	var v = data[i];
					lists_content += '<div style="font-size:12px;margin-top:10px">'+
					                 '<img src="'+v.head_img+'" style="height:25px;border-radius:5px;">'+
									 ' '+v.nickname+' <font color="red">'+v.create_time+'</font> 打赏了 <font color="red">'+v.amount+'</font> 元'+
									 '</div>';
				   }
				   $("#reward_lists").html(lists_content);
				  },"json");			  
			  }
			  
			  $(document).ready(function(){
			  	$("#reward_list_pre").click(function(){get_reward_lists(reward_page-1)});
				$("#reward_list_next").click(function(){get_reward_lists(reward_page+1)});
			  });
			  
			  </script>
          </div>
        </div>
      </div>
    </div>
    
  <div id="reward_lists"></div>
  <ul class="pager pager-pills" style="margin:10px 0 0 0">
	<li class="previous"><a href="javascript:void(0);" id="reward_list_pre">« 上一页</a></li>
	<li class="next"><a href="javascript:void(0);" id="reward_list_next">下一页 »</a></li>
  </ul>
   <script type="text/javascript">
  var pid = '<?php echo $_smarty_tpl->tpl_vars['pro']->value['pk_works_main'];?>
';	 
  var reward_page = 1;
  
  function get_reward_lists(page){
	  reward_page = page;
	  $.post("/tour.php",{act:'reward_lists',pid:pid,page:page},function(data){
	   var lists_content = '';
	   for(var i=0;i<data.length;i++){		
		var v = data[i];
		lists_content += '<div style="font-size:12px;margin-top:10px">'+
						 '<img src="'+v.head_img+'" style="height:25px;border-radius:5px;">'+
						 ' '+v.nickname+' <font color="red">'+v.create_time+'</font> 打赏了 <font color="red">'+v.amount+'</font> 元'+
						 '</div>';
	   }
	   $("#reward_lists").html(lists_content);
	  },"json");			  
  }
  
  $(document).ready(function(){
	$("#reward_list_pre").click(function(){get_reward_lists(reward_page-1)});
	$("#reward_list_next").click(function(){get_reward_lists(reward_page+1)});
  });
  
  </script>
	
    <div class="modal fade"  id="rewardQrCodeModal" data-keyboard="false" style="z-index:2002">
      <div class="modal-dialog">
        <div class="modal-content" style="text-align: center;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
            <h4 class="modal-title">扫描或长按识别下图二维码完成打赏</h4>
          </div>
          <div class="modal-body">
              <img src="" />
          </div>
        </div>
      </div>
    </div>
	
	
	<div class="modal" id="video_player_modal" data-keyboard="false" style="z-index:2002">
            <div class="modal-dialog">
                <div class="modal-body" style="padding: 0">
					<a href="javascript:;" onClick="close_video_player()" style="position:absolute;color:white;z-index:99999;right:5px;top: 3px;">关闭</a>
                    <div class="prism-player" id="J_prismPlayer" ></div>
                </div>
            </div>
        </div>
    	<div id="tour_guide_audio_wrap" style="display: none;"></div>

        <style>
    #redpack_view .modal-dialog{
        width: 330px;
        background-color: #e4312d;
        position: relative;
        padding: 50px 10px 30px 10px;
        margin:auto;
    }
    #redpack_view .card_img{
      position: absolute;
        left: 40px;
        top: -88px;
    }
    #redpack_view .card_close{
      width: 25px;
      height: 25px;
      position: absolute;
      right: 6px;
      top: -13px;
      background-color: #e4312d;
      border-radius: 25px;
      padding-left: 6px;
      padding-top: 2px;
      cursor: pointer;
    }
    #redpack_view .card_close .icon-times{
      color:#fff;
      font-size: 18px;
    }
    #redpack_view .card_wrap{
      background-color: #fff;
      width 100%;
      min-height: 320px;
      border-radius: 10px;
    }
    #redpack_view .card_title{
      height: 50px;
        background-color: #d5d5d5;
        width: 100%;
        border-radius: 10px;
        text-align: center;
        line-height: 50px;
        position: relative;
    }
    #redpack_view .card_title span{
      font-size: 18px;
      font-weight: bold;
      color: #434343;
    }
    #redpack_view .card_title div{
      width: 15px;
      height: 15px;
      border-radius: 15px;
      position: absolute;
      background-color: #e4312d;
      bottom: -8px;
    }
    #redpack_view .card_title .left_shade{
      left: -7px;
    }
    #redpack_view .card_title .right_shade{
      right: -7px;
    }
    #redpack_view .card_content {
      margin-top: 20px;
      padding: 20px;
    }
    #redpack_view .card_content .line{
      height: 1px;
        width: 30%;
        border-bottom: 1px solid #e66565;
    }
    #redpack_view .card_content .card_sysm{
      width: 30%;
        height: 30px;
        border: 1px solid #e66565;
        margin-top: -15px;
        border-radius: 30px;
        text-align: center;
        line-height: 30px;
        margin-left: 5%;
    }
    #redpack_view .card_content .card_sysm span{
      color:#fa9488;
    }
    #redpack_view .card_content_text{
      margin-top: 25px;
    }
    #redpack_view .card_footer{
      height: 50px;
      border-top: 1px dotted;
      line-height: 45px;
      text-align: center;

    }
    @media screen and (min-width: 320px) and (max-width: 480px) {
        #redpack_view .modal-dialog{
          width: 90%;
        }
        .card_content_text{
          max-height: 200px;
          overflow: auto;
        }
    }
  </style>
  <!-- 红包 -->
<div class="modal fade" id="redpack_view" tabindex="-1" style="z-index:9999" role="dialog" aria-labelledby="redpack_view">
  <div class="modal-dialog " style="margin-top: 100px;">
      <div class="card_img"><img src="/static/images/kr/redpack_tit.png" ></div>
      <div class="card_close" data-dismiss="modal" aria-label="Close"><i class="icon icon-times"></i></div>
      <div class="card_wrap">
        <div class="card_title">
          <span id="redpack_title" style="font-size:21px;color:#E4312D"></span>
          <div class="left_shade"></div>
          <div class="right_shade"></div>
        </div>
        <div class="card_content">
          <div class="line pull-left"></div>
          <div class="pull-left card_sysm">
            <span>领取规则</span>
          </div>
          <div class="line pull-right"></div>
          <div class="card_content_text">
          <p>红包由商户直接发出，即时到账</p>
          <p>1个微信账号同1个红包只能领取1次</p>
          <pre style="border:0px;background-color: #ffffff;color: grey;font-size: 13px;line-height: 25px;padding: 0;"></pre>
          <a href="JavaScript:void(0);" class="btn btn-primary" style="width:100%;font-size:24px;" id="btn_receive_redpack">领取红包</a>
          </div>
        </div>
        <div class="card_footer">
          <span>领取过程中有任何疑问请联系管理员</span>
        </div>
      </div>
  </div>
</div>  

</body>
<script type="text/javascript">
var pk_user_main = '<?php echo $_smarty_tpl->tpl_vars['pro']->value['pk_user_main'];?>
';
//组装分享的参数
//title
_title = '<?php echo $_smarty_tpl->tpl_vars['pro']->value['name'];?>
';
_content = '<?php echo $_smarty_tpl->tpl_vars['pro']->value['profile_share'];?>
';
_imgUrl = '<?php echo $_smarty_tpl->tpl_vars['pro']->value['thumb_path'];?>
';
var is_moble = '<?php echo $_smarty_tpl->tpl_vars['is_moble']->value;?>
';
</script>

<script language="JavaScript" type="text/javascript" src="/static/js/kr/object.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/kr/jssdk.js"></script>
<script type="text/javascript" src="https://g.alicdn.com/de/prismplayer/2.2.0/aliplayer-min.js"></script>
</html><?php }} ?>