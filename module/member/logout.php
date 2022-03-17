<?php
//退出登录
if(!defined('IN_T')){
   die('hacking attempt');
} 
Transaction::logout();
Common::base_header("Location:".$_lang['host']."passport/login\n");
exit;
?>