<?php
/*
 * 93lh 用户管理
 * ============================================================================
 * 技术支持：2015-2099 领航数码
 * 官网地址: http://www.93lh.com
 * ----------------------------------------------------------------------------
 * $Author: yuanjiang 26344137#qq.com $
 * $Id: user.php 28028 2016-02-19Z liyuanzhang $
*/
define('IN_T',true);

require './include/init.php';
require './include/function_user.php';

$UCommon = new UCommon(APPID, APPSECRET);
//验证签名
$UCommon->checkSignature();

//合法的请求方法
$method = array('ucinsert','ucselect','ucedit','ucdelete','uclogin','uclogout',);

$remethod = $_GET['method'];

if(!in_array($remethod, $method)){
    echo ERROR_METHOD_NO_EXISTS,
    exit;
}
$remethod();

echo ERROR_OTHER;
exit;
?>