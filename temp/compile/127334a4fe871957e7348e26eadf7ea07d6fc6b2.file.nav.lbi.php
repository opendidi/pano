<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:31:48
         compiled from "F:/0766city/template\default\library\nav.lbi" */ ?>
<?php /*%%SmartyHeaderCode:10135b457a247b3eb0-89280528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '127334a4fe871957e7348e26eadf7ea07d6fc6b2' => 
    array (
      0 => 'F:/0766city/template\\default\\library\\nav.lbi',
      1 => 1531275400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10135b457a247b3eb0-89280528',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'module' => 0,
    'word' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457a247d495',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457a247d495')) {function content_5b457a247d495($_smarty_tpl) {?><header>
<style>
  @media screen and (max-width: 767px) {
    .mobile_nav_hide{
      display: none;
    }
  }
  #search_input{
    margin-top: 6px;
    width: 200px;
    border-radius: 5px;
  }
  #search_btn{
    position: absolute;
    top: 6px;
	right: 10px;
    opacity: .65;
    border-radius: 5px;
  }
</style>
<nav class="navbar navbar-default header_wrap" role="navigation" >
  <div class="container" >
    <div class="navbar-header">
      <!-- 移动设备上的导航切换按钮 -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-example">
        <span class="sr-only">切换导航</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/static/images/logo.png" height="40px" alt="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
" /></a>
    </div>
    <div class="collapse navbar-collapse navbar-collapse-example ">
      <ul class="nav navbar-nav">
	    <li <?php if ($_smarty_tpl->tpl_vars['module']->value=='index'){?>class="active"<?php }?>><a href="/">发现</a></li>
        <li <?php if ($_smarty_tpl->tpl_vars['module']->value=='pictures'){?>class="active"<?php }?>><a href="/pictures">全景摄影</a></li>
        <li <?php if ($_smarty_tpl->tpl_vars['module']->value=='videos'){?>class="active"<?php }?>><a href="/videos">全景视频</a></li>
		<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='videos'){?>class="active"<?php }?>><a href="https://dwz.cn/D3Gi47vE"target="_blank">莎莎源码</a></li>
        <!-- <li <?php if ($_smarty_tpl->tpl_vars['module']->value=='ring_around'){?>class="active"<?php }?>><a href="/ring_around">720环物</a></li> -->
		<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='people'){?>class="active"<?php }?>><a href="/people">作者</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right mobile_nav_hide">
        <li>
           <form class="navbar-form navbar-left" style="position: relative;">
            <div class="form-group">
              <input id="search_input" value="<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
" type="text" class="form-control" maxlength="20" placeholder="请输入全景作品名称">
              <button id="search_btn" type="button" class="btn btn-link"><i class="icon icon-search"></i></button>
            </div>
          </form>
        </li>
	  		 <li>
			  <button style="margin-top:10px" type="button" class="btn btn-primary" onclick="javascript:window.location.href='/add/pic'">
			   <i class="cloud-upload"></i> 发布
			  </button>
			 </li>
       <?php if ($_smarty_tpl->tpl_vars['user']->value['pk_user_main']<1){?>
			 <li><a href="/passport/">登录</a></li>
			 <?php if (!$_smarty_tpl->tpl_vars['_lang']->value['close_reg']){?><li><a href="/passport/register">注册</a></li><?php }?>
			 <?php }else{ ?>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background:none"><?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
<b class="caret"></b></a>
               <ul class="dropdown-menu" role="menu">
                 <li><a href="/member/profile">账户管理</a></li>
                 <li><a href="/people/<?php echo $_smarty_tpl->tpl_vars['user']->value['pk_user_main'];?>
">个人主页</a></li>
                 <li class="divider"></li>
                 <li><a href="/member/project">图片管理</a></li>
                 <li><a href="/member/project?act=videos">视频管理</a></li>
                 <li><a href="/member/object_around">物体环视</a></li>
                 <li><a href="/member/ring_around">720环物</a></li>
                  <li class="divider"></li>
                 <li><a href="/member/mediares">素材管理</a></li>
                 <li><a href="/member/download">离线下载</a></li>
                  <li class="divider"></li>
				         <li><a href="/member/logout">退　　出</a></li>
               </ul>
             </li>
			 <?php }?>
      </ul>

    </div>
  </div>
</nav>
<script>
  $("#search_btn").click(function(){
      var word = $.trim($("#search_input").val());
      if (word=="") {
        return false;
      }
      window.location.href="/search?word="+word;
  })
</script>
</header><?php }} ?>