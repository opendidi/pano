<?php
//720环物
if(!defined('IN_T')){
	die('hacking attempt');
}
$act =  Common::sfilter($_REQUEST['act']);
// var_dump($_lang);
if ($act =="doAdd") {
	//前台显示
	if(empty($_POST)){
		$tp->assign('up_url',$_lang['up_url']);
	}
	//数据处理
	else{
		//设置该次请求超时时长，1800s
		@ini_set("max_execution_time", "1800"); 
		//兼容php-fpm设置超时
		@ini_set("request_terminate_timeout", "1800");
		
		$re['flag'] = 0;
		$ringParams = $_REQUEST['ringParams'];
		// print_r($ringParams);
		$data = array(
			'rname'=>$ringParams['rname'],
			'pid'=>$user['pk_user_main'],
			'obj'=>$_lang['cdn_host'].$ringParams['obj'],
			'music'=>$_lang['cdn_host'].$ringParams['audio'],
			'mtl'=>$_lang['cdn_host'].$ringParams['mtl'],
			'host'=>$_lang['cdn_host'],
			'link'=>$ringParams['link'],
			'createtime'=>date('Y-m-d H:i:s',time()),
			'img_path'=>$_lang['cdn_host'].$ringParams['img_path'],
			'background'=>$_lang['cdn_host'].$ringParams['background'],
			);

		// print_r($data);die;
		if(empty($data['rname'])){
			$re['msg'] = '项目名不能为空';
		}
		else if(empty($ringParams['obj'])){
			$re['msg'] = 'obj文件不能为空';
		}
		else if(empty($ringParams['mtl'])){
			$re['msg'] = 'mtl文件不能为空';
		}
		else if(empty($ringParams['imgs'])){
			$re['msg'] = '项目图片不能为空';
		}else if(!empty($data['link']) && !Common::is_url($data['link'])){
			$re['msg'] = '请输入可以正确访问的URL';
		}
		else if(empty($ringParams['img_path'])){
			$re['msg'] = '封面图片不能为空';
		}
		else if(empty($ringParams['background'])){
			$re['msg'] = '背景图片不能为空';
		}
		else{
			$id = $Db->insert($Base->table('ring_around'),$data);
			if(!empty($ringParams['imgs'])){
				foreach($ringParams['imgs'] as $k=>$v){
					$img['img_path'] = $v['imgsrc'];
					$img['rid'] = $id;
					$img['pid'] = $user['pk_user_main'];
					$Db->insert($Base->table('ring_around_img'),$img);
					$img = [];
				}
			}
			$re = array('flag'=>1);
		}
		echo $Json->encode($re);
		exit;
	}
	
}else if($act == "edit") {
	$rid = intval($_REQUEST['rid']);
	$ring_around = $Db->query("SELECT * FROM ".$Base->table('ring_around')." WHERE id=$rid AND pid=".$user['pk_user_main'],"Row");
	if(empty($ring_around)){
		die('720环物不存在或没操作权限');
	}else{
		$ring_around_imgs = $Db->query("SELECT * FROM ".$Base->table('ring_around_img')." WHERE rid=$rid");
		$tp->assign('ring_around',$ring_around);
		$tp->assign('ring_around_imgs',$ring_around_imgs);
		// var_dump($ring_around);
		// var_dump($ring_around_imgs);
	}
}
else if($act == 'list'){
	//720环物列表显示
	$page = intval($_REQUEST['page'])<1 ? 1 : intval($_REQUEST['page']);
	$pageSize = intval($_REQUEST['pageSize'])<1 ? 10 : intval($_REQUEST['pageSize']);
	if($pageSize>30){
		$pageSize=10;
	}
	$rname = Common::sfilter($_REQUEST['rname']);
	$time_s = Common::sfilter($_REQUEST['time_s']);
	$time_e = Common::sfilter($_REQUEST['time_e']);
	$list = get_obj_list($user['pk_user_main'],$page,$pageSize,$rname,$time_s,$time_e);
	echo $Json->encode($list);
	exit;
	
}
//查询某个用户的720环物
else if ($act == 'list_user'){
	$list = $Db->query('SELECT id , rname , img_path FROM '.$Base->table('ring_around').' WHERE pid = '.$user['pk_user_main']);
	echo $Json->encode($list);
	exit;
}
else if($act == 'delete'){
	$id = intval($_POST['id']);

	//删除ring_around和ring_around_img
	$Db->delete($Base->table('ring_around'),array('pid'=>$user['pk_user_main'],'id'=>$id));

	$Db->delete($Base->table('ring_around_img'),array('pid'=>$user['pk_user_main'],'rid'=>$id));

	$re['status'] = 1;

	echo $Json->encode($re);
	exit;
}
// else if($act == "edit"){
// 	$id = intval($_REQUEST['id']);
// 	$ring_around = $Db->query("SELECT * FROM ".$Base->table('ring_around')." WHERE id =$id AND pid=".$user['pk_user_main'],"Row");
// 	//检验id合法，不合法，强制赋值$act
// 	if(empty($ring_around)){
// 		$act = 'doAdd';
// 	}
// 	//前端显示
// 	if(empty($_POST['id'])){
// 		// echo "SELECT * FROM ".$Base->table('ring_around_img')." WHERE rid=$id";
// 		$ring_around_img = $Db->query("SELECT * FROM ".$Base->table('ring_around_img')." WHERE rid=$id");
// 		$tp->assign('ring_around_img',$ring_around_img);
// 		// var_dump($ring_around);
// 		$tp->assign('ring_around',$ring_around);
// 	}
// 	//数据处理
// 	else{
// 		$re['status'] = 0;
// 		$new_ring = $_REQUEST['ringParams'];
// 		unset($new_ring['id']);
// 		if(!empty($new_ring['link']) && !Common::is_url($new_ring['link'])){
// 			unset($new_ring['link']);
// 		}
// 		$Db->update($Base->table('ring_around'),$new_ring,array('id'=>$id));
// 		$re['status'] = 1;
// 		echo $Json->encode($re);
// 		exit;
// 	}
	
// }
$tp->assign('host',$_lang['cdn_host']);
$tp->assign('host',empty($ring_around['host'])?$_lang['cdn_host']:$ring_around['host']);
$tp->assign('act',$act);
$tp->assign('title','720环物');

//获取720列表
function get_obj_list($uid , $page ,$pageSize,$rname,$time_s,$time_e){
	$sql  = " FROM ".$GLOBALS['Base']->table('ring_around')." WHERE pid = $uid";
	if (!empty($rname)) {
		$sql .= " AND rname LIKE '%$rname%'";
	}
	if(!empty($time_s)&&!empty($time_e)){
		$sql .= " AND createtime between '$time_s' AND '$time_e' ";
	}
    $itemCount = $GLOBALS['Db']->query(" SELECT COUNT(id) AS num ".$sql,"One");
    $pageCount = ceil($itemCount/$pageSize);
    $list = $GLOBALS['Db']->query(" SELECT * ".$sql.' ORDER BY id DESC limit '.($page-1)*$pageSize.','.$pageSize);

    foreach($list as $k=>$v){
    	// echo "SELECT img_path FROM ".$GLOBALS['Base']->table('ring_around_img')." WHERE rid=".$v['id'];
    	if(empty($list[$k]['img_path'])){
    		$list[$k]['img_path'] = $GLOBALS['Db']->query("SELECT img_path FROM ".$GLOBALS['Base']->table('ring_around_img')." WHERE rid=".$v['id'],"One");
    		$list[$k]['img_path'] = $list[$k]['host'].'/'.$list[$k]['img_path'];
    	}
    	
    }
    $res = array(
    	'itemCount'=>$itemCount,
    	'pageCount'=>$pageCount,
    	'currentPage'=>$page,
    	'pageSize'=>$pageSize,
    	'list'=>$list,
    	);

	return $res;
}

?>