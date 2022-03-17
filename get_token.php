<?php
	define("IN_T",true);
	require_once "./source/include/init.php";

	////这里用一个渐变的方法区分这个请求是admin还是user调用的,因为同一session可能同时登陆了admin和user
   if(isset($_SESSION['admin'])&& strpos($_SERVER['HTTP_REFERER'],"/vradmin/")!==false){
      $ope_preid = "A".$_SESSION['admin']['id'];
   } else {
      $ope_preid = $user['pk_user_main'];
   }

	$act =  Common::sfilter($_REQUEST['act']);
	$input=null;
	if (empty($act)) {
		$input = $Json->decode(file_get_contents("php://input"));
		if (!empty($input)) {
			$act = $input['act'];
		}
	}
	$arr =array();
	if ($act=='qj_img') {
		$arr['prefix'] = $user['pk_user_main']."/sourceimg/";
	}
	else if($act =="video" || $act =="videotie"){
		$arr['prefix'] = $ope_preid."/".$act."/";
	}
	else if($act == 'media_resource'){
		$filename = Common::sfilter($input['filename']);
		if (empty($filename)) {
			exit;
		}
		$media_suffix = substr($filename , strrpos($filename , "."));
		$filename = substr($filename, 0,strrpos($filename , "."));
		if(mb_strlen($filename)>100){
			$filename = substr($filename,0,100);			
		}
		$media_type = intval($input['mediaType']);
		$view_uuid =Common::guid(16);
		$absolutelocation=$_lang['cdn_host'].$media_path.$view_uuid.$media_suffix;
		$media_path=$user['pk_user_main']."/media/".($media_type==0?"img/":"msc/");
		$data = array(
				"media_type"=>$media_type,
				"view_uuid"=>$view_uuid,
				"create_time"=>date("Y-m-d H:i:s",Common::gmtime()),
				"media_path"=>$media_path.$view_uuid.$media_suffix,
				"absolutelocation"=>$_lang['cdn_host'].$media_path.$view_uuid.$media_suffix,
				"media_name"=>$filename,
				"pk_user_main"=>$user['pk_user_main'],
				"media_suffix"=>$media_suffix,
				"media_size"=>intval($input['filesize']/1000)
			);
		$Db->insert($Base->table("cus_mediares"),$data);
		$arr['prefix'] = $media_path;
		$arr['key'] = $data['media_path'];
		$arr['medias'] = $data;
	}
	else if($act == 'def_material'){
		$arr['prefix'] ="def_material/";
	}
	else if($act == 'obj_img'){
		$arr['prefix'] = $user['pk_user_main'].'/obj3d/'.date("Ymd",Common::gmtime())."/";
	}
	else if($act == 'ring_around'){
		$arr['prefix'] = $user['pk_user_main'].'/720/'.date("Ymd",Common::gmtime())."/".$_REQUEST['remainTime']."/";
	}
	else if($act == 'ring_around_edit'){
		$filename = Common::sfilter($input['filename']);
		$arr['key'] = $filename;
	}
	else{
		die("Illegalargument");
	}
	switch ($_lang['global_storage']) {
		case 'qiniu':
			require_once './source/qiniu/cls_qiniu.php';
			$arr['token'] =Qiniu_Factory::getAuth()->uploadToken($_lang['qiniu_config']['bucket']) ;
			$arr['type']='1';
			break;
		case 'oss':
			$expiration = gmt_iso8601(time() + 1200);
			$conditions[] = array(0=>'content-length-range', 1=>0, 2=>1572864000);
			$start = array(0=>'starts-with', 1=>'$key', 2=>$arr['prefix']);
			$conditions[] = $start;
			$base64_policy = base64_encode(json_encode(array('expiration'=>$expiration,'conditions'=>$conditions)));

			$arr['type']='2';
			$arr['accessid'] = $_lang['oss_config']['access_id'];
			$arr['host'] = $_lang['oss_config']['external_url'];
			$arr['policy'] = $base64_policy;
			$arr['signature'] = base64_encode(hash_hmac('sha1', $base64_policy, $_lang['oss_config']['access_secret'], true));
			break;
		case "local":
			$arr['type']='0';
			break;
	}
	
	echo json_encode($arr);
	die;


	function gmt_iso8601($time) {
	    $dtStr = date("c", $time);
	    $mydatetime = new DateTime($dtStr);
	    $expiration = $mydatetime->format(DateTime::ISO8601);
	    $pos = strpos($expiration, '+');
	    $expiration = substr($expiration, 0, $pos);
	    return $expiration."Z";
	}
?>