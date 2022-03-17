<?php 
define('IN_T', true);
require_once '../../source/include/init.php';
$act =  Common::sfilter($_REQUEST['act']);
$input=null;
if(empty($act)){
	$input = $Json->decode(file_get_contents("php://input"));
	if (!empty($input)) {
		$act = $input['act'];
	}
}
$data['code'] = 0;
$key=Common::sfilter($_REQUEST['key']);
$prefix=Common::sfilter($_REQUEST['prefix']);
if(empty($_FILES)||empty($key) || empty($prefix)){
	 $data['msg']="请上传图片";
	echo $Json->encode($re);
	exit();
}

$file=$_FILES['file'];
$dir_path = $GLOBALS['_lang']['local_config']['dir_path'].$prefix;

$prev = getcwd();	//取得当前目录
chdir($GLOBALS['_lang']['local_config']['dir_path']);	//切换到存储根目录
Common::make_dir($prefix);  //创建存储目录
chdir($prev);  //切换回当前目录

if(empty($act)){
	if(strpos("image/jpeg",$file['type'])!=0||strpos("image/png",$file['type'])!=0) {
		$data['msg']="只能上传jpg和png格式的图片";
	}
	else{
		if(move_uploaded_file($file['tmp_name'],$GLOBALS['_lang']['local_config']['dir_path'].$key)){
			$data['msg']="";
			$data['code']=1;
		}
		else{
			$data['msg'] = '上传失败！';
		}
	}
}
else if($act=="video"){
	if(move_uploaded_file($file['tmp_name'],$GLOBALS['_lang']['local_config']['dir_path'].$key)){
		$data['msg']="";
		$data['code']=1;
	}
	else{
		$data['msg'] = '上传失败！';
	}
}
else if($act=="videotie"){
	if(move_uploaded_file($file['tmp_name'],$GLOBALS['_lang']['local_config']['dir_path'].$key)){
		$data['msg']="";
		$data['code']=1;
	}
	else{
		$data['msg'] = '上传失败！';
	}
}
else if($act=="audio"){
	if(move_uploaded_file($file['tmp_name'],$GLOBALS['_lang']['local_config']['dir_path'].$key)){
		$data['msg']="";
		$data['code']=1;
	}
	else{
		$data['msg'] = '上传失败！';
	}
}else if($act=="ring_around"){
	if(move_uploaded_file($file['tmp_name'],$GLOBALS['_lang']['local_config']['dir_path'].$key)){
		$data['msg']="";
		$data['code']=1;
	}
	else{
		$data['msg'] = '上传失败！';
	}
}
echo $Json->encode($re);
exit();
?>