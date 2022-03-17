<?php
//首页
if(!defined('IN_T')){
	die('hacking attempt');
}

$recommend = get_index_recommend();
$tp->assign('recommend',$recommend);
$tp->assign('slide',get_index_slide());
$tp->assign('index_top_ad',Transaction::get_ad_by_postion(1));
$tp->assign('index_bottom_ad',Transaction::get_ad_by_postion(2));
//提取首页推荐图片
function get_index_recommend(){
	$sql = "select name,thumb_path,view_uuid,profile,browsing_num ".
	       "from ".$GLOBALS['Base']->table('worksmain')." where recommend=1 order by sort asc, pk_works_main desc limit 21";
	$res = $GLOBALS['Db']->query($sql);
	return $res;
}
//提取首页幻灯片
function get_index_slide(){
	$sql = "select img_name,img_path,link,sort_order ".
	       "from ".$GLOBALS['Base']->table('slide')." order by sort_order asc, id desc";
	$res = $GLOBALS['Db']->query($sql);
	return $res;
}
?>