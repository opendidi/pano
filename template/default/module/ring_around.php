<?php
//720环物
if(!defined('IN_T')){
	die('hacking attempt');
}

$act = Common::sfilter($_REQUEST['act']);
if ($act == 'list') {
	$page = intval($_REQUEST['page']);
	$page = $page<1?1:$page;
	$size =  27;
	$list = get_ring_projects($page,$size);
	echo $Json->encode($list);
	exit;
}else{
	
}
$tp->assign('host',$_lang['cdn_host']);

//提取图片项目
function get_ring_projects($page,$size){
	$sql = "select * from ".$GLOBALS['Base']->table('ring_around')." order by id desc limit ".($page-1)*$size.",".$size;
	$res = $GLOBALS['Db']->query($sql);
	foreach ($res as $k => $v) {
		if(empty($list[$k]['img_path'])){
    		$list[$k]['img_path'] = $GLOBALS['Db']->query("SELECT img_path FROM ".$GLOBALS['Base']->table('ring_around_img')." WHERE rid=".$v['id'],"One");
    		$list[$k]['img_path'] = $list[$k]['host'].'/'.$list[$k]['img_path'];
    	}
	}
	// var_dump($res);
	return $res;
}


?>