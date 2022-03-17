<?php
	if(!defined('IN_T'))
	{
	   die('hacking attempt');
	}
	require_once __DIR__."/../include/cls_common.php";
	require_once __DIR__.'/../krpano/cls_common_operation.php';
	require_once ROOT_PATH.'source/include/cls_file_util.php';

	// require_once __DIR__.'/../../config/config.php';

	/**
	* 本地相关操作封装
	*/
	class Local  extends KrOperation
	{
		/*
	     * origin 原地址
	     * dest 目标地址
	     * @return file
		 */
		public  function downloadFile($obj , $file){
			if (empty($obj)||empty($file)) {
				return null;
			}
			$obj=$GLOBALS['_lang']['local_config']['dir_path'].$obj;
			if(FileUtil::copyFile($obj,$file,true)){
				return $file;
			}
			return null;
		}
		/*
		*  上传文件到本地
		*	$local_file 本地文件
		*	$origin_file 远程的文件
		*/
		public function uploadFile($local_file , $origin_file){
			$origin_file=$GLOBALS['_lang']['local_config']['dir_path'].$origin_file;
			if (empty($local_file)) {
				return false;
			}
			if(FileUtil::moveFile($local_file,$origin_file)){
				return true;
			}
			return false;
		}

		public function video_thumb($location,$time){
			// $Operation = Qiniu_Factory::getOperation();
			// $fos = "vframe/jpg/offset/".$time;
			// return $Operation->buildUrl($location,$fos);
			return "";
		}

		//获得视频文件的缩略图
		public	function getVideoCover($file,$time,$name) {
	     // if(empty($time))$time = '1';//默认截取第一秒第一帧
	     // $strlen = strlen($file);
	     // // $videoCover = substr($file,0,$strlen-4);
	     // // $videoCoverName = $videoCover.'.jpg';//缩略图命名
	     // //exec("ffmpeg -i ".$file." -y -f mjpeg -ss ".$time." -t 0.001 -s 320x240 ".$name."",$out,$status);
	     // $str = "ffmpeg -i ".$file." -y -f mjpeg -ss 3 -t ".$time." -s 320x240 ".$name;
	     // //echo $str."</br>";
	     // $result = system($str);
	   }
	}
?>