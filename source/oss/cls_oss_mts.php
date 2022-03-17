<?php
/*
 * 93lh oss媒体转码
 * ============================================================================
 * 技术支持：2015-2099 领航数码
 * 官网地址: http://www.93lh.com
 * ----------------------------------------------------------------------------
 * $Author: wanghao 26344137#qq.com $
 * $Id: index.php 28028 2016-03-09Z wanghao $
*/
if(!defined('IN_T'))
{
   die('hacking attempt');
}
 class Oss_mts 
 {
 	private $accessid;
 	private $accesskey;

 	function __construct($accessid, $accesskey){
 		$this->accessid = $accessid;
 		$this->accesskey = $accesskey;
 	}
    
 	public function getSignUrl($parms){
 		date_default_timezone_set('GMT');  
 		$params_all = array(
 				'Format'      => 'json',
 				'Version'     => '2014-06-18',
 				'AccessKeyId' => $this->accessid,
 				'SignatureMethod' => 'HMAC-SHA1',
 				'Timestamp'   =>  date("Y-m-d\TH:i:s\Z",time()),
 				'SignatureVersion' => '1.0',
 				'SignatureNonce' => Common::guid()
 		);

 		foreach ($parms as $k => $v) {
 			$params_all[$k] = $v;
 		}

 		ksort($params_all);
 		$strToSing = 'GET'.'&'.$this->percentEncode('/').'&';
 		$str = '';
 		foreach ($params_all as $k => $v) {
 			$str.=('&'.$this->percentEncode($k).'='.$this->percentEncode($v));
 		}
 		$url_formt = substr($str, 1);
 		$strToSing .= $this->percentEncode($url_formt);
 		$strToSing = $this->getSignature($strToSing,$this->accesskey.'&');
 		$mts_location = substr($GLOBALS['_lang']['oss_config']['location'], 4);
 		return 'http://mts.'.$mts_location.'.aliyuncs.com?Signature='.$this->percentEncode($strToSing).'&'.$url_formt;
 	}
 	private function getSignature($str, $key) {  
	    $signature = "";  
	    if (function_exists('hash_hmac')) {  
	        $signature = base64_encode(hash_hmac("sha1", $str, $key, true));  
	    } else {  
	        $blocksize = 64;  
	        $hashfunc = 'sha1';  
	        if (strlen($key) > $blocksize) {  
	            $key = pack('H*', $hashfunc($key));  
	        }  
	        $key = str_pad($key, $blocksize, chr(0x00));  
	        $ipad = str_repeat(chr(0x36), $blocksize);  
	        $opad = str_repeat(chr(0x5c), $blocksize);  
	        $hmac = pack(  
	                'H*', $hashfunc(  
	                        ($key ^ $opad) . pack(  
	                                'H*', $hashfunc(  
	                                        ($key ^ $ipad) . $str  
	                                )  
	                        )  
	                )  
	        );  
	        $signature = base64_encode($hmac);  
	    }  
	    return $signature;  
	   } 

	private function percentEncode($str){
		$str = urlencode($str);
		$str = str_replace('+','%20',$str);
		$str = str_replace('*','%2A',$str);
		$str = str_replace('%7E','~',$str);
		return $str;
	}

 }


?>