<?php 
if(!defined('IN_T')){
	die('hacking attempt');
}

$act = Common::sfilter($_REQUEST['act']);

//生成文字转语音
if($act=="text2audio"){
	$content = Common::sfilter($_REQUEST['content']);
	$per = intval($_REQUEST['per']);
	$last_file = Common::sfilter($_REQUEST['last_file']);
	$re['status'] = 0;
	if(empty($content)||mb_strlen($content)>600){
		$re['msg'] = '请输入1到600个字符的文本内容';
		echo $Json->encode($re);
		die();
	}
	if ($per!=0&&$per!=1) {
		$re['msg'] = '请选择发音人';
		echo $Json->encode($re);
		die();
	}
	require_once ROOT_PATH.'source/baidu/B_textToAudio.php';
	require_once ROOT_PATH.'source/baidu/P_Mac.php';
	$res=B_textToAudio::getAccess_token('SIWnDfEB04OyNOSWt57Aaz2a','49a92ebf72d03f4651d86dac3d455554');
	$tok=$res->data['access_token'];
	if($res->code==0||empty($tok)){
		$re['msg'] = '程序异常';
		echo $Json->encode($re);
		die();
	}
	//引用文件操作类
	require_once ROOT_PATH.'source/include/cls_file_util.php';
	$tempdir = ROOT_PATH.'temp/tts/';
	if(!is_dir($tempdir)){
		FileUtil::createDir($tempdir);
	}
	//$mac=new GetMacAddr();
	$response=B_textToAudio::textToAudio($content,$tok,Common::gmtime(),'zh',1,$per);
	$name =Common::gmtime().Common::get_rand_number().'.mp3';
	B_textToAudio::saveFile($tempdir.$name,$response->data);
	if($_lang['global_storage'] == 'qiniu'){
		//转换完成，存储文件到七牛，删除临时文件，删除原有的文件
		require_once ROOT_PATH.'source/qiniu/cls_qiniu.php';
      $Qiniu = new Qiniu();
      $Qiniu->uploadFile($tempdir.$name,$user['pk_user_main'].'/media/tts/'.$name);
		FileUtil::unlinkFile($tempdir.$name);
		if ($last_file) {
			// $Qiniu->deleteFile($last_file);
		}
	}
	else if($_lang['global_storage'] == 'oss'){
		//转换完成，存储文件到oss，删除临时文件，删除原有的文件
		require_once ROOT_PATH.'source/oss/cls_oss.php';
		$Oss = new Oss();
		$Oss->uploadFile($tempdir.$name,$user['pk_user_main'].'/media/tts/'.$name);
		FileUtil::unlinkFile($tempdir.$name);
		if ($last_file) {
			// $Oss->deleteFile($last_file);
		}
	}else{
		//转换完成，存储文件到本地，删除临时文件，删除原有的文件
		require_once ROOT_PATH.'source/local/cls_local.php';
		$Oss = new Local();
		$Oss->uploadFile($tempdir.$name,$user['pk_user_main'].'/media/tts/'.$name);
		FileUtil::unlinkFile($tempdir.$name);
		if ($last_file) {
			// $Oss->deleteFile($last_file);
		}

	}
	$re['location'] = $user['pk_user_main'].'/media/tts/'.$name;
	$re['absoultelocation'] = $_lang['cdn_host'].$re['location'];
	$re['status'] = 1;
	echo $Json->encode($re);
	die();
}
else{
	//显示界面
	if(empty($_POST)){
		//todo
	}
	//写入数据库
	else{
		$re['status'] = 0;
		$data = array(
				'media_name'=>Common::sfilter($_REQUEST['media_name']),
				'media_path'=>Common::sfilter($_REQUEST['media_path']),
				'per'=>intval($_REQUEST['per'])
			);
		
		if(empty($data['media_name'])||mb_strlen($data['media_name'])>32){
			$re['msg'] = '请输入32个字符以内的名称';
		}
		else if($data['per']!=0 && $data['per']!=1){
			$re['msg'] = '请选择发音人';
		}
		else if(empty($data['media_path'])){
			$re['msg'] = '请生成音频';
		}
		else{
			$data['absolutelocation'] = $_lang['cdn_host'].$data['media_path'];
			unset($data['per']);
			
			$data['create_time']= date("Y-m-d H:i:s",Common::gmtime());
			$data['media_type'] = 1;
			$data['view_uuid'] = Common::guid();
			$data['pk_user_main'] = $user['pk_user_main'];
			$data['media_suffix']= '.mp3';
			$data['media_size'] = 0;
			$Db->insert($Base->table('cus_mediares'),$data);
			$re['msg']="插入成功";

			$re['status']=1;
			$re['href']='/member/mediares?act=msc';
		}	
		echo $Json->encode($re);
		die();
	}
}
$tp->assign('act',$act);

?>