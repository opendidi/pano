<?php
/*
 * 93lh 清空缓存文件
 * ============================================================================
 * 技术支持：2015-2099 领航数码
 * 官网地址: http://www.93lh.com
 * ----------------------------------------------------------------------------
 * $Author: yuanjiang 26344137#qq.com $
 * $Id: index.php 28028 2016-03-09Z yuanjiang $
*/
if(!defined('IN_T')){
   die('hacking attempt');
}

//删除全景图片缓存目录
require_once ROOT_PATH.'source/include/cls_file_util.php';
FileUtil::unlinkDir(ROOT_PATH.'data/qr/');
echo $Json->encode(array('status'=>1));
exit;

?>