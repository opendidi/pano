<?php
//焦点图
//@author yuanjiang 26344137#qq.com
//@date 10.9.2016
if(!defined('IN_T')){
   die('hacking attempt');
}

$act = Common::sfilter($_REQUEST['act']);

//详情: 查看或编辑或增加
if($act=='detail'){
	//id
	$sid = intval($_REQUEST['sid']);
	//传递了sid，验证sid是否存在，不存在强制赋值为0
	if($sid>0){
		$slide = $Db->query("select * from ".$Base->table('slide')." where id=$sid","Row");
		if(!$slide){
			$sid = 0;
		}
	}
	//前台查看
	if(empty($_POST)){
		$tp->assign('slide',$slide);
	}
	//后台处理
	else{
		$data = array(
			'img_name' => Common::sfilter($_POST['img_name']),
			'img_path' => Common::sfilter($_POST['img_path']),
			'link' => trim($_POST['link']),
			'sort_order' => intval($_POST['sort_order']),
		);
		$res['status'] = 0;
		if(empty($data['img_name'])){
			$res['msg'] = '请填写图片名称';
		}
		else if(empty($data['img_path'])){
			$res['msg'] = '图片地址不正确';
		}
		else if(!empty($data['link']) && !Common::is_url($data['link'])){
			$res['msg'] = '链接地址不正确';
		}
		else{
			if($sid>0){
				$data['id'] = $sid;
				//替换，删除原图
				if($data['img_path']!=$slide['img_path']){
					chdir(ROOT_PATH);
					@unlink(substr($slide['img_path'],1));
				}
			}
			$Db->replace($Base->table('slide'),$data);
			$res = array('status'=>1,'msg'=>'提交成功','href'=>'/'.ADMIN_PATH.'/?m=slide');
		}
		echo $Json->encode($res);
		exit;
	}
	$tp->assign('act','detail');
}
else if($act=='delete'){
	//id
	$sid = intval($_REQUEST['sid']);
	$res['status'] = 0;
	$img_path = $Db->query("select img_path from ".$Base->table('slide')." where id=$sid","One");
	chdir(ROOT_PATH);
	@unlink(substr($img_path,1));	
	$Db->delete($Base->table('slide'),array('id'=>$sid));
	$res = array('status'=>1,'msg'=>'删除成功！');
	echo $Json->encode($res);
	exit;
}
//列表 
else{
	$list = $Db->query("select * from ".$Base->table('slide')." order by sort_order asc, id desc");
	$tp->assign('list',$list);
	$tp->assign('act','list');
}
$tp->assign('nav','焦点图');
?>