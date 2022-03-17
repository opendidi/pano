<?php
/**
 * 注册krpano
 * @author yuanjiang 10.5.2016
*/
define('IN_T',true);
require '../../source/include/init.php';

//注册文件地址
$krpano_reg = ROOT_PATH."data/krpano_reg/krpano_reg.bat";

//调用注册文件，并输出结果
echo exec($krpano_reg." ".ROOT_PATH."");
?>