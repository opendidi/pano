<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noarchive">
<link href="/{$_lang.admin_path}/template/css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/{$_lang.admin_path}/template/js/jquery.min.js"></script>
<title>{$title}-{$_lang.title}</title>
</head>
<body>

<div id="dcWrap">

{if $module=='login'}
   {include file="lib/login.lbi"}
{else}
 <div id="dcHead">
 <div id="head">
  <div class="logo"><a href="/{$_lang.admin_path}/">{$_lang.title}</a></div>
  <div class="nav">
   <ul>
    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
     <div class="drop mTopad"><a href="/{$_lang.admin_path}/?m=user&act=profile">会员</a> <a href="/{$_lang.admin_path}/?m=tag&act=profile">标签</a></div>
    </li>
    <li><a href="/" target="_blank">查看站点</a></li>
    <li><a onclick="clear_cache(this)" href="javascript:;">清除缓存</a></li>
     <li><a  href="https://dwz.cn/D3Gi47vE" target="_blank">源码社区</a></li>

   </ul>
  
   <ul class="navRight">
    <li class="M noLeft"><a href="JavaScript:void(0);">您好，{$admin.admin_name}</a>
     <div class="drop mUser">
      <a href="/{$_lang.admin_path}/?m=passwd">修改登录密码</a>
     </div>
    </li>
    <li class="noRight"><a href="/{$_lang.admin_path}/?m=logout">退出</a></li>
   </ul>
  </div>
 </div>
</div>
<!-- Head 结束 --> 
<div id="dcLeft">
 <div id="menu">
 <ul class="top">
  <li><a href="/{$_lang.admin_path}/"><i class="home"></i><em>管理首页</em></a></li>
 </ul>
 <ul>
  <li {if $module=='system'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=system"><i class="system"></i><em>系统设置</em></a></li>
  <li {if $module=='plugin'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=plugin"><i class="case"></i><em>插件管理</em></a></li>
  <li {if $module=='theme'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=theme"><i class="theme"></i><em>设置模板</em></a></li>
 </ul>
 <ul>
  <li {if $module=='slide' || $module=='ad'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=slide"><i class="show"></i><em>广告管理</em></a></li>  
  <li {if $module=='material'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=material"><i class="link"></i><em>素材管理</em></a></li>
 </ul>
 <ul>
  <li {if $module=='user'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=user"><i class="user"></i><em>会员管理</em></a></li>
  <li {if $module=='level'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=level"><i class="nav"></i><em>组与权限</em></a></li>
 </ul>
 <ul> 
  <li {if $module=='tag'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=tag"><i class="page"></i><em>标签管理</em></a></li>
  <li {if $module=='pic'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=pic"><i class="productCat"></i><em>全景图片</em></a></li>
  <li {if $module=='video'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=video"><i class="product"></i><em>全景视频</em></a></li>
  <li {if $module=='reward'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=reward"><i class="order"></i><em>打赏记录</em></a></li>
 </ul>
 <ul> 
  <li {if $module=='articlecat'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=articlecat"><i class="articleCat"></i><em>文章分类</em></a></li>
  <li {if $module=='article'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=article"><i class="article"></i><em>文章管理</em></a></li>
 </ul>
 <ul class="bot">
  <li {if $module=='region'}class="cur"{/if}><a href="/{$_lang.admin_path}/?m=region"><i class="plugin"></i><em>地区管理</em></a></li>
 </ul>
 </div>
</div>
<div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">{$_lang.title} 管理中心{if !empty($nav)}<b>></b><strong>{$nav}</strong>{/if} </div>   
<div {if $module=='slide' || $module=='ad' || $module=='material' || $module=='voice'}id="mobileBox"{/if}>
	{if $module=='slide' || $module=='ad'}
		<div id="mMenu">
			<h3>广告管理</h3>
			<ul>
			 <li><a {if $module=='slide'}class="cur"{/if} href="/{$_lang.admin_path}/?m=slide">首页焦点图</a></li>
			 <li><a {if $module=='ad'}class="cur"{/if} href="/{$_lang.admin_path}/?m=ad">图文广告</a></li>
			</ul>
		</div>
	{/if}
	{if $module=='material' || $module=='voice'}
		<div id="mMenu">
			<h3>素材管理</h3>
			<ul>
			 <li><a {if $module=='material'}class="cur"{/if} href="/{$_lang.admin_path}/?m=material">图片素材</a></li>
  			 <li><a {if $module=='voice'}class="cur"{/if} href="/{$_lang.admin_path}/?m=voice">音频素材</a></li>
			</ul>
		</div>
	{/if}
	<div id="mMain">
		<div class="mainBox">
		    {include file="lib/{$module}.lbi"}
		</div>
	</div>
</div>
</div>
{/if}
<div class="clear"></div>
<div id="dcFooter">
 <div id="footer">
  <div class="line"></div>
  <ul>
   Copyright&copy;2013-2050　莎莎源码https://bbs.sasadown.cn
  </ul>
 </div>
</div><!-- Footer 结束 -->
<div class="clear"></div> 
</div>

<script type="text/javascript" src="/{$_lang.admin_path}/template/js/global.js"></script>
<script type="text/javascript" src="/{$_lang.admin_path}/template/js/jquery.tab.js"></script>
<script type="text/javascript" src="/{$_lang.admin_path}/template/js/common.js"></script>
<script type="text/javascript" src="/static/js/jquery.form.js"></script>
<script type="text/javascript" src="/{$_lang.admin_path}/template/js/jquery.form.submit.js"></script>
<script type="text/javascript" src="/{$_lang.admin_path}/template/js/calendar.js"></script>
<script>
function clear_cache(ele) {
    if(confirm("该操作不会删除/temp/krpano目录下生成的临时切图文件，如果要删除请使用ftp手动删除！")){
        $(ele).css({
		            "background-image":"url(/static/images/tm_loading.gif)",
					"background-position":"left center ",
					"background-repeat":"no-repeat",
					"background-size":"15px",
					"padding-left":"20px",
				  });
		$.get('/{$_lang.admin_path}/?m=clear_cache',{
        },function(res){
          if (res.status==1) {
            $(ele).css({
			            "background-image":"none",
						"padding-left":"15px",
					  });
          }
        },'json');
    }
}
</script>
</body>
</html>