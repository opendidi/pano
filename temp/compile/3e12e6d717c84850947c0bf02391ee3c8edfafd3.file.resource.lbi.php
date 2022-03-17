<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\open_alert\template\resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:125865b457aa9332904-63084568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e12e6d717c84850947c0bf02391ee3c8edfafd3' => 
    array (
      0 => 'plugin\\open_alert\\template\\resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125865b457aa9332904-63084568',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa93358b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa93358b')) {function content_5b457aa93358b($_smarty_tpl) {?><script>
	$(function(){
		plugins_init_function.push(open_alert_init);
	})
	function open_alert_init(data,settings){
		if (data.open_alert.useAlert=='1') {
            settings["events[skin_events].onloadcomplete"] += "show_open_alert('" + data.open_alert.imgPath + "');";
        }
	}
</script><?php }} ?>