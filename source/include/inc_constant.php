<?php
/**
 * 定义常量
 * @author yuanjiang 
**/

//定义krpano切图临时文件存储路径
define('KRTEMP', ROOT_PATH.'temp/krpano');
//定义krpano位置
define('KRPANO', strtoupper(substr(PHP_OS,0,3))=='WIN' ? ROOT_PATH.'data/krpano/make.bat' : ROOT_PATH.'data/krpano_linux/make.sh');
define('KRPANO_MULTI', strtoupper(substr(PHP_OS,0,3))=='WIN' ? ROOT_PATH.'data/krpano/make_multi.bat' : ROOT_PATH.'data/krpano_linux/make_multi.sh');
?>