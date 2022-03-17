<?php /* Smarty version Smarty-3.1.7, created on 2020-11-06 18:15:55
         compiled from "D:/VR/VR0002/template\default\library\passport_header.lbi" */ ?>
<?php /*%%SmartyHeaderCode:183595fa5225ba6f5a0-02860868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd84c240fd2f34786321f29a3dfa498211cc3b647' => 
    array (
      0 => 'D:/VR/VR0002/template\\default\\library\\passport_header.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183595fa5225ba6f5a0-02860868',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    '_lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5fa5225d15dfc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fa5225d15dfc')) {function content_5fa5225d15dfc($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-ch">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title><?php if ($_smarty_tpl->tpl_vars['title']->value){?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
-<?php echo $_smarty_tpl->tpl_vars['_lang']->value['subtitle'];?>
<?php }?></title>
<link rel="stylesheet" href="/static/css/zui.min.css">
<link rel="stylesheet" href="/static/css/zui-theme.css">
<link rel="stylesheet" href="/template/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['moban'];?>
/css/redefine.css">
<script language="JavaScript" type="text/javascript" src="/static/js/jquery-1.9.1.js"></script>

<style>
	.passport_container{
		margin:10% auto 0 auto;
		min-height: 600px;
		width: 300px;
		text-align: center;
	}
</style>
<script>

	function showerr(content,obj){
		alert_notice(content,'default','top');
		if(obj!=null){
			$(obj).parent(".input-group").addClass("has-error");
		}
	}


</script>
</head>

<body>

<?php }} ?>