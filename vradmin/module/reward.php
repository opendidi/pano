<?php
//打赏记录
if(define('IN_T')){
	die('hacking attempt');
}

$size = 15; //定义每页显示10条
$page = intval($_REQUEST['page']);
$uid = intval($_REQUEST['uid']);
$wid = intval($_REQUEST['wid']);
$page = $page<1 ? 1 : $page;

$res = reward_list($uid,$wid,$page,$size);

$pages = Common::set_page($size,$page,$res['count']);
foreach ($pages as $key => $value) {
	$pages[$key]['url'] = "/".ADMIN_PATH."/?m=reward&page=".$value['num'].$res['spm'];
}
$tp->assign("page",$page);
$tp->assign("pages",$pages);
$tp->assign("res",$res);

//打赏记录列表
function reward_list($uid,$wid,$page,$size){

	$sql = $GLOBALS['Base']->table('reward')."  WHERE status=1 ";
	$spm = "";   //整合检索字符串
	
	if($uid>0) {
		$sql .= "and uid = ".$uid." ";
		$spm .= "&uid=$uid";
		$GLOBALS['tp']->assign('uid',$uid);
	}
	
	if($wid>0) {
		$sql .= "and wid = ".$wid." ";
		$spm .= "&wid=$wid";
		$GLOBALS['tp']->assign('wid',$wid);
	}
	$res['spm']= $spm;
	$res['count'] = $GLOBALS['Db']->query("SELECT COUNT(id) AS num FROM ".$sql, "One");
	
	$sql ="SELECT * FROM ".$sql." ORDER BY create_time LIMIT ".($page-1)*$size.",".$size."";
	
	$res['res'] = $GLOBALS['Db']->query($sql);
	return $res;
}

?>