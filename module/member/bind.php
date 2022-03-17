<?php
/*
 * 93lh 社交绑定 
 * ============================================================================
 * 技术支持：2015-2099 领航数码
 * 官网地址: http://www.93lh.com
 * ----------------------------------------------------------------------------
 * $Author: yuanjiang 26344137#qq.com $
 * $Id: bind.php 28028 2016-06-19Z yuanjiang $
*/
if(!defined('IN_T')){
	die('hacking attempt');
}
require ROOT_PATH.'source/include/cls_weixin.php';

$act = Common::sfilter($_REQUEST['act']);

//绑定微信 
if($act=='weixin'){
	//已绑定
	if(!empty($user['openid'])){
		die('already binded');
	}
	$wx = new Weixin($_lang['wxweb_config']['appid'],$_lang['wxweb_config']['appsecret']);
	$param = array(
		'scope'=>'snsapi_login',
		'redirect_uri'=>$_lang['host'].'member/bind?act=weixin',
		);
	$res = $wx->loginWeixin($param);
	if($res){	
		//print_r($res);
		$Db->update($Base->table('user'),array('openid'=>$res['openid']),array('pk_user_main'=>$user['pk_user_main']));	
		Common::base_header("Location:".$_lang['host']."member/bind\n");
	}
}
//显示绑定页面
else{
	//todo
}
$tp->assign('title','社交绑定');
?>