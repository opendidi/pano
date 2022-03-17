<?php 
if(!defined('IN_T')){
	die('hacking attempt');
}
$act =  Common::sfilter($_REQUEST['act']);
// print_r($act);die;
if($act == "edit"){
	$rid = intval($_REQUEST['rid']);
	$ring_around = $Db->query("SELECT * FROM ".$Base->table('ring_around')." WHERE id=$rid AND pid=".$user['pk_user_main'],"Row");
	if(empty($ring_around)){
		die('720环物不存在或没操作权限');
	}else{
		$ring_around_imgs = $Db->query("SELECT * FROM ".$Base->table('ring_around_img')." WHERE rid=$rid");
		$tp->assign('ring_around',$ring_around);
		$tp->assign('ring_around_imgs',$ring_around_imgs);
		// $tp->assign('prefix',)
		$prefix = str_replace($ring_around['host'],'',$ring_around['obj']);
		$p = explode('/', $prefix);
		unset($p[4]);
		$prefix = implode('/', $p).'/';
		// print_r($prefix);
		$tp->assign('prefix',$prefix);
		$tp->assign('cdn_host',$_lang['cdn_host']);
	}
}
//修改720环物
else if($act == "ring_around_edit"){
	$rid = intval($_REQUEST['rid']);
	$key = Common::sfilter($_REQUEST['key']);
	$type = Common::sfilter($_REQUEST['type']);
	$re['status'] = 0;
	$ring_around = $Db->query("SELECT * FROM ".$Base->table('ring_around')." WHERE id=$rid AND pid=".$user['pk_user_main'],"Row");
	if(empty($ring_around)){
		$re['msg'] = '720环物不存在或没操作权限';
	}else{
		$Db->update($Base->table('ring_around'),array($type=>$ring_around['host'].$key),array('id'=>$rid));
		$re['msg'] = '修改成功';
		$re['status'] = 1;
		$re['src'] = $ring_around['host'].$key;
	}
	echo $Json->encode($re);
	exit;
}
//添加环物图片
else if($act == 'ring_around_img_add'){
	$rid = intval($_REQUEST['rid']);
	$key = Common::sfilter($_REQUEST['key']);
	$re['status'] = 0;
	$ring_around = $Db->query("SELECT * FROM ".$Base->table('ring_around')." WHERE id=$rid AND pid=".$user['pk_user_main'],"Row");
	if(empty($ring_around)){
		$re['msg'] = '720环物不存在或没操作权限';
	}else{
		$data = array(
			'rid'=>$rid,
			'img_path'=>$key,
			'pid'=>$user['pk_user_main']
			);
		$id = $Db->insert($Base->table('ring_around_img'),$data);
		$re['msg'] = '添加成功';
		$re['status'] = 1;
		$data['img_path'] = $ring_around['host'].$key;
		$data['id'] = $id;
		$re['data'] = $data;
	}
	echo $Json->encode($re);
	exit;
}
//删除环物图片
else if($act == "delete_source"){
	$id = intval($_REQUEST['id']);
	$re['status'] = 0;
	// echo "SELECT * FROM ".$Base->table('ring_around_img')." WHERE id=$id AND pid=".$user['pk_user_main'];die;
	$img = $Db->query("SELECT * FROM ".$Base->table('ring_around_img')." WHERE id=$id AND pid=".$user['pk_user_main'],"Row");
	if(empty($img)){
		$re['msg'] = '720环物不存在或没操作权限';
	}else{
		$Db->delete($Base->table('ring_around_img'),array('id'=>$id));
		$re['msg'] = '删除成功';
		$re['status'] = 1;
		$re['id'] = $id;
	}
	echo $Json->encode($re);
	exit;
}
//修改名称或链接
else if($act =="update_ring"){
	$rid = intval($_REQUEST['rid']);
	$type = Common::sfilter($_REQUEST['type']);
	$value = Common::sfilter($_REQUEST['value']);
	$re['status'] = 0;
	$ring_around = $Db->query("SELECT * FROM ".$Base->table('ring_around')." WHERE id=$rid AND pid=".$user['pk_user_main'],"Row");
	if(empty($ring_around)){
		$re['msg'] = '720环物不存在或没操作权限';
	}else if(empty($value)){
		$re['msg'] = '内容不能为空';
	}else if($type=="link"&&!Common::is_url($value)){
		$re['msg'] = '链接格式不正确';
	}else if(empty($type)){
		$re['msg'] = '请选择修改位置';
	}
	else{
		// print_r(array($type=>$value));die;
		$Db->update($Base->table('ring_around'),array($type=>$value),array('id'=>$rid));
		$re = array('status'=>1,'msg'=>$value);
	}
	echo $Json->encode($re);
	exit;
}

?>