<?php
/**
 * 微信打赏
 * @return 支付二维码url（String） 
 * @author yuanjiang 26344137#qq.com
 * @date 02.26.2017
*/
define('IN_T',true);
require_once '../../source/include/init.php';

//微信支付类库
require_once ROOT_PATH."source/payment/wxpay/lib/WxPay.Api.php";
require_once ROOT_PATH."source/payment/wxpay/action/WxPay.NativePay.php";
require_once ROOT_PATH."source/payment/wxpay/action/WxPay.JsApiPay.php";
require_once ROOT_PATH."source/payment/wxpay/action/log.php";

$type = Common::sfilter($_REQUEST['pay_type'])=='jsapi' ? 'jsapi' : 'native';  //支付方式，扫码或公众号
$amount = number_format($_REQUEST['amount'],2);  //打赏金额
$uid = intval($_REQUEST['uid']);	//项目拥有者id
$pid = intval($_REQUEST['pid']);	//项目id

$res['status'] = 0; 

if($amount<0.01){
	$res['msg'] = '打赏金额不能少于0.01元';
	echo $Json->encode($res);
	exit;
}

//生成订单号
$error_no = 0;
do{
	$order_sn = Common::get_order_sn(); //生成订单号
	$error_no = (int)$Db->query("select id from ".$Base->table('reward')." where order_sn = '".$order_sn."'");
}
while($error_no>0); //如果是订单号重复则重新生成

//写入数据库
$data = array(
'uid'=>$uid,
'order_sn'=>$order_sn,
'pid'=>$pid,
'amount'=>$amount,
'nickname'=> $_COOKIE['wx']['nickname'],
'head_img' => $_COOKIE['wx']['head_img'],
'province'=> $_COOKIE['wx']['province'],
'city'=> $_COOKIE['wx']['city'],
);

$Db->insert($Base->table('reward'),$data);

//扫码支付
if($type=='native'){
	$notify = new NativePay();

	/**
	 * 流程：
	 * 1、调用统一下单，取得code_url，生成二维码
	 * 2、用户扫描二维码，进行支付
	 * 3、支付完成之后，微信服务器会通知支付成功
	 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
	 */
	$input = new WxPayUnifiedOrder();
	$input->SetBody("打赏作者");
	$input->SetAttach($order_sn);
	$input->SetOut_trade_no(WxPayConfig::$MCHID.date("YmdHis"));
	$input->SetTotal_fee($amount*100);   //支付金额，微信支付单位为0.01元
	$input->SetTime_start(date("YmdHis"));
	$input->SetTime_expire(date("YmdHis", time() + 600));
	$input->SetGoods_tag("打赏作者");
	$input->SetNotify_url($_lang['host']."module/payment/reward_notify.php");
	$input->SetTrade_type("NATIVE");
	$input->SetProduct_id($order_sn);
	$result = $notify->GetPayUrl($input);
	$url2 = $result["code_url"];
	if(!$url2){
		$res['msg'] = '生成支付二维码失败';
		echo $Json->encode($res);
		exit;
	}
	$res = array(
		'status'=>1,
		'qrcode_url' => "http://paysdk.weixin.qq.com/example/qrcode.php?data=".$url2,
	);
}
//公众号支付
else{
	//①、获取用户openid
	$tools = new JsApiPay();
	$openId = $_COOKIE['wx']['openid'];//$tools->GetOpenid();
	
	//②、统一下单
	$input = new WxPayUnifiedOrder();
	$input->SetBody("打赏作者");
	$input->SetAttach($order_sn);
	$input->SetOut_trade_no(WxPayConfig::$MCHID.date("YmdHis"));
	$input->SetTotal_fee($amount*100);
	$input->SetTime_start(date("YmdHis"));
	$input->SetTime_expire(date("YmdHis", time() + 600));
	$input->SetGoods_tag("打赏作者");
	$input->SetNotify_url($_lang['host']."module/payment/reward_notify.php");
	$input->SetTrade_type("JSAPI");
	$input->SetOpenid($openId);
	$order = WxPayApi::unifiedOrder($input);
	//print_r($order);
	if($order['return_code']=='FAIL'){
		$res['msg'] = $order['return_msg'];
		echo $Json->encode($res);
		exit;
	}
	$jsApiParameters = $tools->GetJsApiParameters($order);
	$res = array(
		'status'=>1,
		'jsApiParameters'=>$jsApiParameters,
	);
	//print_r($res);
}
echo $Json->encode($res);
exit;
?>