<?php
/**
 * 区域
 * @author wh 
*/
define('IN_T',true);
require './source/include/init.php';
require_once './source/include/cls_region.php';

$act = Common::sfilter($_REQUEST['act']);

if($act == 'list'){
	$pid = intval($_REQUEST['pid']);
	$pid = $pid<0?0:$pid;
	$regions = Region::listByPid($pid);
	echo $Json->encode($regions);
	die;
}



?>