<?php

define('IN_T',true);
require_once "./source/include/init.php";

$act = Common::sfilter($_REQUEST['act']);
$input = $Json->decode(file_get_contents("php://input"));
$view_uuid = Common::sfilter($_REQUEST['view_uuid']);

$scene = Common::sfilter($_REQUEST['scene']);
if (!empty($input)) {
	$act = $input['act'];
	$view_uuid = Common::sfilter($input['view_uuid']);
}
//jssdk Ajax
if($act == 'jssdk'){
	require_once './source/include/cls_weixin_js.php';
	$cur_url = $_REQUEST['currentUrl'];

	$appid = $_lang['wx_config']['appid'];
	$appSecret = $_lang['wx_config']['appsecret'];
	$jssdk = new JSSDK($appid, $appSecret);
	$data = $jssdk->getSignPackage($cur_url);
	header('Content-Type: application/json;charset=utf-8');
	echo json_encode($data);
	exit;
}
//领取红包
else if($act=='receive_redpack'){
	$rpid = intval($_REQUEST['rpid']);
	$openid = $_COOKIE['wx']['openid'];
	$re['status']=0;
	//微信未登陆
	if(empty($openid)){
		$re['msg'] = '请先微信登陆';
	}
	//红包不存在
	else if(!$rp=$Db->query("select * from ".$Base->table('redpack')." where id=$rpid",'Row')){
		$re['msg'] = '该红包已被商家删除！';
	}
	//红包被取消
	else if($rp['status']==0){
		$re['msg'] = '该红包已被商家取消！';
	}
	//红包已过期
	else if($rp['expire']>0 && $rp['expire']<Common::gmtime()){
		$re['msg'] = '来晚了，该红包已过期！';
	}
	//微信号已经抽过
	else if($Db->query("select id from ".$Base->table('redpack_log')." where rpid=$rpid and wxid='$openid' limit 1")){
		$re['msg'] = '你已经抽取过红包，不能再抽取！';
 	}
	//正在领取，挂起状态
	else if($_SESSION['wx']['redpack_doing']==1){
		$re['msg']= '你正在抽取红包，重复抽取无效哦！';
	}
 	else{
		//设置session用户正在领取状态，防止因延时造成重复领取
		$_SESSION['wx']['redpack_doing']= 1;
 		//组装本次抽取记录数据
 		$rp_log = array(
 			'rpid'=>$rpid,
 			'pk_user_main'=>$rp['pk_user_main'],
 			'wxid'=>$openid,
 			'head_img'=>$_COOKIE['wx']['head_img'],
 			'nickname'=>$_COOKIE['wx']['nickname'],
 			'sex'=>$_COOKIE['wx']['sex']==1?'男':'女',
 			'province'=>$_COOKIE['wx']['province'],
 			'city'=>$_COOKIE['wx']['city'],
 			'create_time'=>date('Y-m-d H:i:s',Common::gmtime()),
 		);
 		//计算是否抽中
 		$set = mt_rand(1, 100);
 		//未抽中
 		if($set>$rp['percent']){
 			$re['msg'] = '抱歉，你没有抽中红包哦！';
 		}
 		else{
	 		//计算应该发放的红包金额
	 		//随机金额红包
	 		if($rp['type']==1){
	 			//已经发放的
	 			$given = $Db->query("select sum(amount) from ".$Base->table('redpack_log')." where rpid=$rpid and status=1",'One');
	 			$given = number_format($given,2,'.','');
	 			if($rp['amount']>$given){
	 				$rp['range'] = explode('-',$rp['range']);
	 				$total_amount = (mt_rand($rp['range'][0]*100, $rp['range'][1]*100))/100;
	 				//如果本次发放后剩余金额小于1.00元，则作为一次发放
	 				if($rp['amount']-$given-$total_amount<1){
	 					$total_amount = $rp['amount'] - $given;
	 				}
	 			}
	 			else{
	 				$total_amount = 0;
	 			}
	 		}
	 		//固定金额红包
	 		if($rp['type']==2){
	 			if($rp['num']>$Db->query("select count(*) from ".$Base->table('redpack_log')." where rpid=$rpid and status=1",'One')){
	 				$total_amount = $rp['amount'];
	 			}
	 			else{
	 				$total_amount = 0;
	 			}
	 		}

	 		//应该发放的红包金额<=0
	 		if($total_amount<=0){
	 			$re['msg'] = '来晚了，红包已被抢完了';
	 			echo $Json->encode($re);
	 			exit;
	 		}

		 	$appid = $_lang['wxpay_config']['appid'];//wx47260c6ffc86c5c9';
			$mch_id = $_lang['wxpay_config']['mchid'];//'1480207802';
			$key = $_lang['wxpay_config']['key'];//'07189661d523c8643c62cf560101d035';
			
			require_once './source/include/cls_weixin_redpack.php';
			$data = array(
				'mch_billno'=>Common::get_order_sn(),
				'mch_id'=>$mch_id,
				'wxappid'=>$appid,
				'send_name'=>substr($_lang['title'],0,32),//'平台',
				're_openid'=>$openid,
				'total_amount'=>$total_amount*100,
				'total_num'=>1,
				'wishing'=>'感谢参与活动',
				'client_ip'=>'192.168.0.1',
				'act_name'=>'红包回馈',
				'remark'=>'6.1红包抢不停'
			);
			//print_r($data);
			$sslcert_path = ROOT_PATH.'source/cert/wx_pay/apiclient_cert.pem';
			$sslkey_path = ROOT_PATH.'source/cert/wx_pay/apiclient_key.pem';
			$redpack = new weixin_redpack($data,$key,$sslcert_path,$sslkey_path);
			$res = $redpack->exec_send_redpack();
			//print_r($res);
			if($res['return_code']=='SUCCESS'){
				if($res['result_code']=='FAIL'){
					$re['msg'] = $res['return_msg'];
				}
				else{
					$rp_log['amount'] = $total_amount;
					$rp_log['status'] = 1;
					$re = array('status'=>1,'msg'=>'恭喜，已为你发放'.$total_amount.'元红包！');
				}
			}
			else{
				$re['msg'] = $res['err_code_des'];
			}
		}	
		//将抽取记录写入数据库
		$Db->insert($Base->table('redpack_log'),$rp_log);
		//释放session正在领取状态
		unset($_SESSION['wx']['redpack_doing']);
 	}
 	echo $Json->encode($re);
 	exit;
}
//初始化全景项目
else if ($act == 'initPano') {
	//js 获取配置的json
	$pro = $Db->query("SELECT w.* , p.* FROM ".$Base->table('worksmain')." w LEFT JOIN ".$Base->table('pano_config')." p ON w.pk_works_main = p.pk_works_main WHERE w.view_uuid = '$view_uuid' AND flag_publish = 1","Row");
	if (empty($pro)) {
		die("未查询到相关项目");
	}
	$pro = Transaction::decode_str2arr($pro);
	$hotspots = &$pro['hotspot'];
	foreach ($hotspots as &$v) {
		$imgtext = &$v['imgtext'];
		if (!empty($imgtext)) {
			foreach ($imgtext as  &$v2) {
				if ($v2['imgtext_wordContent']) {
					$v2['imgtext_wordContent'] = base64_decode($v2['imgtext_wordContent']);
				}else if ($v2['wordContent']){
					$v2['imgtext_wordContent'] = base64_decode($v2['wordContent']);
					unset($v2['wordContent']);
				}
			}
		}
	}

	$sql = "SELECT video_tie_hotspot FROM ".$Base->table('pano_config')." WHERE pk_works_main=".$pro['pk_works_main'];
	$video_tie_hotspot = $Db->query($sql,"One");
	$rlst['pro']=$pro;
	$rlst['video_tie_hotspot']=Transaction::decode_str2arr($video_tie_hotspot);
	echo $Json->encode($rlst);
	exit;
}
//点赞
else if($act == "add_praise"){
	if (!empty($view_uuid)) {
		$Db->execSql("UPDATE ".$Base->table('worksmain')." SET praised_num = praised_num+1 WHERE view_uuid = '$view_uuid'");
	}
	exit;
}
//校验密码
else if($act=="privacyAccess") {
	$re['status'] = 0;
	$pid = intval($_POST['pid']);
	$pwd =  Common::sfilter($_POST['pwd']);
	$pro = $Db->query('SELECT privacy_password , view_uuid FROM '.$Base->table('worksmain').' WHERE pk_works_main = '.$pid,'Row');

	if (empty($pro)||$pwd!=$pro['privacy_password']) {
		$re['msg'] ="密码有误";
	}else{
		$_SESSION['privacyAccess'][$pro['view_uuid']] = 1;
		$re['status'] = 1;
		$re['url'] = '/tour/'.$pro['view_uuid'];
	}
	echo $Json->encode($re);
	exit;
}
//取得打赏记录
else if($act=='reward_lists'){
	$page = intval($_REQUEST['page']);
	$page = $page<1 ? 1: $page;
	$pageSize = 5;
	$res = $Db->query("select * from ".$Base->table('reward')." where pid = ".intval($_REQUEST['pid'])." and status=1 order by id desc limit ".($page-1)*$pageSize.",$pageSize");
	foreach($res as $k=>$v){
		$res[$k]['create_time'] = Common::simple_time(strtotime($v['create_time'])); 
	}
	echo $Json->encode($res);
	exit;
}
else{
	$pro = $Db->query("SELECT w.*,u.nickname FROM ".$Base->table('worksmain')." w LEFT JOIN ".$Base->table('user')." u ON u.pk_user_main = w.pk_user_main WHERE w.view_uuid = '$view_uuid' AND w.flag_publish = 1 AND u.state=0 ","Row");
	if (empty($pro)) {
		die("未查询到相关项目");
	}
	if(!empty($pro['privacy_password'])&&empty($_SESSION['privacyAccess'][$pro['view_uuid']])){
		//设置了访问密码并且没有登录
		$tp->assign("pid",$pro['pk_works_main']);
		$tp->display($_lang['moban']."/privacy.tpl");
		exit;
	}
	require_once ROOT_PATH.'plugin/plugin_init_function.php';
	plugin_get_plugins("view");
	$Db->execSql("UPDATE ".$Base->table('worksmain')." SET browsing_num = browsing_num+1 WHERE view_uuid = '$view_uuid'");
	$profile = preg_replace("/\s/","", Common::sfilter($pro['profile']));
	$pro['profile_share'] = mb_strlen($profile)>255 ? mb_substr($profile,0,255) : $profile;
	$tp->assign("pro",$pro);
	$tp->assign("scene",$scene);
	$tp->display($_lang['moban']."/tour.tpl");
	$tp->assign('is_moble',Common::is_mobile_visit());

}

?>