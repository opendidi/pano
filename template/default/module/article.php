<?php
//文章
if(!defined('IN_T')){
	die('hacking attempt');
}

$aid = intval($_REQUEST['aid']);
$act = Common::sfilter($_REQUEST['act']);

//更新文章访问量
if($act=='update_article_views'){	
	$Db->execSql("update ".$Base->table('article')." set visits=visits+1 where id=$aid");
	$visits = $Db->query("select visits from ".$Base->table('article')." where id=$aid","One");
	echo "document.write($visits);\r\n";
	exit;
}
else{
	$a = $Db->query("select * from ".$Base->table('article')." where id=$aid","Row");
	$tp->assign('a',$a);
}
?>