<?php
if(!defined('IN_T')){
	die('hacking attempt');
}
$word = Common::sfilter($_REQUEST['word']);
if (!empty($word)) {
	$size = 30; //定义每页显示10条
	$page = intval($_REQUEST['page']);

	$page = $page<1 ? 1 : $page;

	$type = Common::sfilter($_REQUEST['type']);

	$res = search($word,$page,$size,$type);
	$pages = Common::set_page($size,$page,$res['count']);
	foreach ($pages as $key => $value) {
		$pages[$key]['url'] = "/search?page=".$value['num'].$res['spm'];
	}
	$tp->assign("word",$word);
	$tp->assign("page",$page);
	$tp->assign("pages",$pages);
	$tp->assign("list",$res);
}

function search($word,$page=0,$size=32,$type=null){
	$spm = "&word=$word";   //整合检索字符串
	if ('scene'==$type) {
		$sql = $GLOBALS['Base']->table('worksmain').' w INNER JOIN (SELECT iw.pk_works_main FROM '.$GLOBALS['Base']->table('imgs_works').' iw INNER JOIN (SELECT pk_img_main FROM '.$GLOBALS['Base']->table('imgsmain').'  WHERE filename LIKE "%'.$word.'%")  i   ON i.pk_img_main = iw.pk_img_main) t ON w.pk_works_main = t.pk_works_main';
		$spm .="&type=$type";
	}else{
		$sql = $GLOBALS['Base']->table('worksmain').' w WHERE name LIKE "%'.$word.'%"';
	}
	$res['spm']= $spm;
	$res['count'] = $GLOBALS['Db']->query("SELECT COUNT(*) AS num FROM ".$sql,"One");
	$res['res'] = $GLOBALS['Db']->query('SELECT w.* FROM '.$sql." LIMIT ".($page-1)*$size.",".$size."","All");
	return $res;
}

?>