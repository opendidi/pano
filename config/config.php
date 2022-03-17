<?php
/*
 * 配置信息
 * @author yuanjiang 02.16.2013 
*/
if(!defined('IN_T'))
{
   die('hacking attempt');
} 

/* 设置编码 */
header("Content-type:text/html; charset=utf-8");

/*设置时区 东八区*/
date_default_timezone_set('Asia/Chongqing');

/* php错误报告 */
error_reporting(E_ALL^E_WARNING^E_NOTICE);

/* 数据库配置 */
$db_type = 'mysql';   //数据库类型

$db_host = '127.0.0.1';

$db_user = 'VR0001';

$db_pass =  'VR0001';

$db_port = 3306;

$db_charset = 'utf8';  //编码

$db_name = 'VR0001';  

$db_prefix  = 'u_';    //表前缀

?>