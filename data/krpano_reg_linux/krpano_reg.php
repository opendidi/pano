<?php
/**
 * 注册krpano
 * ===================================================
 * krpano主目录必须有可写（777）权限
 * 执行文件必须有可执行（755）权限
 * ===================================================
 * @author yuanjiang 10.5.2016
*/
define('IN_T',true);
require '../../source/include/init.php';

//注册文件地址
$krpano_reg = ROOT_PATH."data/krpano_reg_linux/krpano_reg.sh";

//调用注册文件，并输出结果
echo "krpano注册结果：".exec($krpano_reg." ".ROOT_PATH."");	
?>