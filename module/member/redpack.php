<?php
//红包管理
//@author yuanjiang 26344137#qq.com

if(!defined('IN_T')){
	die('hacking attempt');
}

$act =  Common::sfilter($_REQUEST['act']);
if(empty($act)) $act='list';

//取消红包
if($act=='cancel'){
	$rpid = intval($_REQUEST['rpid']);
	$re['status'] = 0;
	//已取消的红包不能再取消
	if(!$rp = $Db->query("select * from ".$Base->table('redpack')." where id=$rpid and status=1",'Row')){
		$re['msg'] = '只有正常的红包才能取消';
	}
	else{
		//红包总金额
		$total_amount = $rp['type']==1 ? $rp['amount'] : $rp['amount']*$rp['num'];
		//已领取的金额
		$given_amount = $Db->query("select sum(amount) from ".$Base->table('redpack_log')." where rpid=$rpid",'One');
		//该退回的金额
		$return_amount = $total_amount - $given_amount;
		//echo $total_amount.'-'.$given_amount.'-'.$return_amount;exit;
		if($return_amount<0){
			$re['msg'] = '退回的金额大于红包总金额，请联系管理员！';
		}
		else{
			$Db->beginTransaction();
			//取消红包
			$Db->execSql("update ".$Base->table('redpack')." set status=0 where id=$rpid");
			//返回金额
			$Db->execSql("update ".$Base->table('user')." set amount=amount+$return_amount where pk_user_main=".$user['pk_user_main']."");
			$Db->commit();
			$re = array('status'=>1,'msg'=>'取消成功');
		}
	}
	echo $Json->encode($re);
	exit;
}
//删除红包
else if($act=='delete'){
	$rpid = intval($_REQUEST['rpid']);
	$re['status'] = 0;
	//只有取消的红包才能删除
	if(!$Db->query("select id from ".$Base->table('redpack')." where id=$rpid and status=0")){
		$re['msg'] = '只有取消的红包才能删除';
	}
	else{
		//删除红包领取记录
		$Db->beginTransaction();
		$Db->query("delete from ".$Base->table('redpack_log')." where rpid=$rpid");
		//删除红包 
		$Db->query("delete from ".$Base->table('redpack')." where id=$rpid");
		$Db->commit();
		$re = array('status'=>1,'msg'=>'删除成功');
	}
	echo $Json->encode($re);
	exit;
}
//添加红包
else if($act=='add'){
	//当前可用余额
	$sql = "select amount from ".$Base->table('user')." where pk_user_main=".$user['pk_user_main']."";
	$ava_amount = $Db->query($sql,'One');
	if(empty($_POST)){
		$tp->assign('ava_amount',$ava_amount);
	}
	else{
		$data = array(
			'name' => Common::sfilter($_POST['name']),
			'type' => intval($_POST['type']),
			'amount' => number_format($_POST['amount'],2,'.',''),
			'range' => $_POST['range'],	//array
			'num' => intval($_POST['num']),
			'percent'=> intval($_POST['percent']),
			'expire' => Common::sfilter($_POST['expire']),
		);
		$re['status'] = 0;
		if(empty($data['name'])){
			$re['msg'] = '请填写红包名称';
		}
		else if($data['type']<1 || $data['type']>2){
			$re['msg'] = '请选择红包类型';
		}
		else if($data['amount']<1){
			$re['msg'] = '红包金额必须大于1.00元';
		}
		else if($data['type']==1 && ($data['range'][0]<1 || $data['range'][0]>=$data['range'][1] || $data['range'][1]>$data['amount'])){
			$re['msg'] = '请填写正确的单个红包范围';	
		}
		else if($data['type']==2 && $data['num']<1){
			$re['msg'] = '请填写红包数量';
 		}
 		else if($data['percent']<1 || $data['percent']>100){
 			$re['msg'] = '抽中概率必须介于1-100之间';
 		}
 		else{
 			//本次红包需扣除的余额
 			$rp_amount = $data['type']==1 ? $data['amount'] : $data['amount']*$data['num'];	
	 		//红包金额超过余额
	 		if($rp_amount>$ava_amount){
	 			$re['msg'] = '红包金额大于可用余额，无法添加';
	 		}	
	 		else{
	 			if($data['range'][0]>0 && $data['range'][1]>0){  
	 				$data['range'] = implode('-',$data['range']);
	 			}
	 			else{
	 				$data['range'] = '';
	 			}
	 			$data['expire'] = intval(strtotime($data['expire']));
	 			$data['create_time'] = date('Y-m-d H:i:s',Common::gmtime());
	 			$data['pk_user_main'] = $user['pk_user_main'];
	 			$Db->beginTransaction();
	 			//添加红包
	 			$Db->insert($Base->table('redpack'),$data);
	 			//同步减少用余额
	 			$Db->execSql("update ".$Base->table('user')." set amount=amount-$rp_amount where pk_user_main=".$user['pk_user_main']."");
	 			$Db->commit();
	 			$re = array('status'=>1,'msg'=>'添加成功','href'=>'/member/redpack');
 			}
 		}
		echo $Json->encode($re);
		exit;
	}
}
//领取记录
else if($act=='log'){
	$rpid = intval($_REQUEST['rpid']);
	$status = intval($_REQUEST['status']);	//状态，1为可用；0为过期
	$page = intval($_REQUEST['page']);
	if($page<1) $page=1;
	if($_REQUEST['ajax']==1){
		$res = get_redpack_log_list($user['pk_user_main'],$rpid,$status,$page);
		echo $Json->encode($res);
		exit;
	}
	else{
		$tp->assign('redpack',$Db->query("select * from ".$Base->table('redpack')." where pk_user_main=".$user['pk_user_main']." order by id desc"));
		$tp->assign('rpid',$rpid);
		$tp->assign('status',$status);
	}
}
//显示界面
else if($act=='list'){
	$name = Common::sfilter($_REQUEST['name']);
	$status = intval($_REQUEST['status']);	//状态，1为可用；0为过期
	$page = intval($_REQUEST['page']);
	if($page<1) $page=1;
	if($_REQUEST['ajax']==1){
		$res = get_redpack_list($user['pk_user_main'],$name,$status,$page);
		echo $Json->encode($res);
		exit;
	}
	else{
		$tp->assign('name',$name);
		$tp->assign('status',$status);
	}
}

$tp->assign('act',$act);

function get_redpack_list($pk_user_main,$name,$status,$page){
	$pageSize = 15;
	$sql = "select * from ".$GLOBALS['Base']->table('redpack')." where pk_user_main=$pk_user_main ";
	if(!empty($name)){
		$sql .= "and name like '%$name%' ";
	}
	if($status>0){
		$sql .= $status==1 ? 
		 		"and (status=1 and (expire=0 or expire>".Common::gmtime().")) " : 
		 		"and (expire>0 and expire<".Common::gmtime().") ";
	}
	//echo $sql;
	$res['pageCount'] = ceil(count($GLOBALS['Db']->query($sql))/$pageSize);
	$sql .= "order by id desc limit ".($page-1)*$pageSize.", $pageSize";
	//echo $sql;
	$res['list'] = $GLOBALS['Db']->query($sql);
	foreach($res['list'] as $k=>$v){
		if($v['status']==0) $res['list'][$k]['name'] = $v['name'].'【已取消】';
		$res['list'][$k]['expire_time'] = $v['expire']==0 ? '永久' : date('Y-m-d',$v['expire']);
		//已发放的总和，金额或个数
		$sql = "select ".($v['type']==1 ? "sum(amount) as given " : "count(*) as given ").
		       "from ".$GLOBALS['Base']->table('redpack_log')." where rpid=".$v['id']." and status=1 ";
		$given = $GLOBALS['Db']->query($sql,'One');
		//剩余的总和，金额或个数
		$remain = $v['type']==1 ? $v['amount']-$given : $v['num']-$given;
		$res['list'][$k]['given'] = $v['type']==1 ? number_format($given,2,'.','').'元' : intval($given).'个' ;
		$res['list'][$k]['remain'] = $v['type']==1 ? number_format($remain,2,'.','').'元' : intval($remain).'个' ;

		//描述
		$res['list'][$k]['brief'] = $v['type']==1 ?
									'随机金额；总金额'.$v['amount'].'元；单个红包'.$v['range'].'元；抽中概率'.$v['percent'].'%':
									'固定金额；总个数'.$v['num'].'个；单个红包'.$v['amount'].'元；抽中概率'.$v['percent'].'%';
	}
	$res['currentPage'] = $page;
	return $res;
}

function get_redpack_log_list($pk_user_main,$rpid,$status,$page){
	$pageSize = 15;
	$sql = "select * from ".$GLOBALS['Base']->table('redpack_log')." where pk_user_main=$pk_user_main ";
	if($rpid>0){
		$sql .= "and rpid=$rpid ";
	}
	if($status>0){
		$sql .= "and status=1 ";
	}
	//echo $sql;
	$res['pageCount'] = ceil(count($GLOBALS['Db']->query($sql))/$pageSize);
	$sql .= "order by id desc limit ".($page-1)*$pageSize.", $pageSize";
	//echo $sql;
	$res['list'] = $GLOBALS['Db']->query($sql);
	$res['currentPage'] = $page;
	return $res;
}
?>