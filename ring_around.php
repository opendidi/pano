<?php

define('IN_T',true);
require_once "./source/include/init.php";
//跨域请求的域名
$url =substr($_lang["cdn_host"],0,-1); 
header("Access-Control-Allow-Origin:*");
// var_dump($url);die;
/*星号表示所有的域都可以接受，*/
header("Access-Control-Allow-Methods:GET,POST");
$act = Common::sfilter($_REQUEST['act']);
$id = Common::sfilter($_REQUEST['id']);
// var_dump($act);
// var_dump($id);
if($act == 'for_id'){
	$re['status'] = 0;
	$ring = $Db->query('SELECT * FROM '.$Base->table('ring_around').' WHERE id='.$id,"Row");

	if(empty($ring)){
		// die("未查询到相关项目");
		$re['msg'] = '未查询到相关项目';
	}
	else{
		$re['msg'] = $ring;
		// print_r($re);
		// print_r($re['msg']);
		// print_r($re['msg']['host'].$re['msg']['obj']);
		// $re['url'] = $url;
		$re['msg']['obj'] = $re['msg']['obj'];
		$re['msg']['mtl'] = $re['msg']['mtl'];
		$re['msg']['music'] = $re['msg']['music'];
		$re['msg']['bg'] = $re['msg']['background'];
		// print_r($re);
		$re['status'] = 1;
	}
	echo $Json->encode($re);
	exit;
}

//全景热点720
else if($act == 'init_ring'){
	$re['status'] = 0;
	$ring = $Db->query('SELECT * FROM '.$Base->table('ring_around').' WHERE id='.$id,"Row");
	$url = $ring['host'].'/ring/index.html?id='.$ring['id'];
	echo $url;
	exit;
}
//读取环物信息
else{

	// $ring = $Db->query('SELECT * FROM '.$Base->table('ring_around').' WHERE id='.$id,"Row");

	// if(empty($ring)){
	// 	die("未查询到相关项目");
	// }
	// else{
	// 	var_dump($ring);
	// 	$tp->assign('ring',$ring);
	// }

}
$tp->display("ring_around/ring.lbi");


?>