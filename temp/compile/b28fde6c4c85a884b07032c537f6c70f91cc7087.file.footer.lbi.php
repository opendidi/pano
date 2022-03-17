<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:31:48
         compiled from "F:/0766city/template\default\library\footer.lbi" */ ?>
<?php /*%%SmartyHeaderCode:270445b457a2486b656-53875631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b28fde6c4c85a884b07032c537f6c70f91cc7087' => 
    array (
      0 => 'F:/0766city/template\\default\\library\\footer.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270445b457a2486b656-53875631',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nav_links' => 0,
    'v' => 0,
    '_lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457a248840b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457a248840b')) {function content_5b457a248840b($_smarty_tpl) {?><style type="text/css">
.footer {
        height: 75px;
        font-size: 12px;
        clear: both;
        display: none
}
.footer ul {
	height: 75px;
	line-height: 75px;
}
.footer-logo {
	height: 75px;
	line-height: 75px;
}

.cooperative p{
	margin: 0;
}
.cooperative p:nth-child(1) {
	font-size: 12px;
}
.cooperative p:nth-child(2) {
	font-size: 9px;
}

.ab{
	position: absolute;
	bottom: 0;
}
@media (max-width:470px) {
.footer{ position: relative;height: 94px;}
.footer ul { margin-left: 5px;width: 200px;}
.footer ul li a { padding: 5px 2px;}
.footer-logo>a>img{ vertical-align: 14px;}
.footer-nav>li{ line-height: 50px;}
.cooperative>p>a>img{ width: 61px}
.cooperative{ width:100%;position: absolute;top: 8px;right: 7px;}
.hz{ text-align: center;}
.bq{ text-align: center;}

}
</style>
<footer class="footer">
 <div class="footer-warper">
  <div class="footer-logo"><a href="#"><img src="/static/images/logo.png"></a></div>
  <ul class="footer-nav">
   <li>
   	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav_links']->value['left_bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
		<a target="_blank" href="/article?aid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a>
	<?php } ?>
   </li>
  </ul>
  <div class="cooperative" style="float:right">
   <p class="qq"><a target="blank" href="http://wpa.qq.com/msgrd?V=3&uin=<?php echo $_smarty_tpl->tpl_vars['_lang']->value['qq'];?>
&Site=<?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
&Menu=yes"><img src="/static/images/qq_online.png" style="cursor:pointer;"></a></p>
   <div class="clearfix" style="height:5px"></div>
   <p class="hz">合作电话：<?php echo $_smarty_tpl->tpl_vars['_lang']->value['tel'];?>
 </p><p class="bq">Copyright&copy;2016 <?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
 All Rights Reserved   <a style="color: #bfbfbf;text-decoration: underline;" href="#" target="_blank"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['icp'];?>
</a></p>
   </div>
  </div>
</footer>
<script language="JavaScript" type="text/javascript" src="/static/js/jquery.form.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/bootbox.js"></script> 
<script language="JavaScript" type="text/javascript" src="/static/js/pager.js"></script> 
<script language="JavaScript" type="text/javascript" src="/static/js/common.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/zui.js"></script>
<script>
	var f_resize_time;
	window.onload = function (){ 
		f_resize_time = setTimeout(resizeFooter,1000);
		// $(window).bind("resize",function(){
		// 	$("footer").hide();
		// 	if(f_resize_time) clearTimeout(f_resize_time);
		// 	f_resize_time = setTimeout(resizeFooter,100);
		// })
		$(document).bind("resize",function(){
			$("footer").hide();
			if(f_resize_time) clearTimeout(f_resize_time);
			f_resize_time = setTimeout(resizeFooter,100);
		})
	} 
	function resizeFooter(){
		if ($(window).height()>$(document.body).height()) {
			$("footer").addClass("ab").show();
		}else{
			$("footer").removeClass("ab").show();
		}
	}
</script>
</body>
</html><?php }} ?>