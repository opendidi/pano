<?php
//微信发送现金红包类
//@author yuanjiang 26344137#qq.com

if(!defined('IN_T')){
	die('hacking attempt');
}

class weixin_redpack{
	
	private $key;  //商户支付密钥

	//业务数据，实例化时传入；
	//初始业务数据没有nonce_str、sign，本类生成nonce_str组装到$data，然后再根据$data生成sign；
	//最终post到服务器端的$data，要加上nonce_str、sign
	private $data = array();

	private static $wx_redpack_url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack';	
	private $curl_proxy_host; //代理ip
	private $curl_proxy_post; //代理ip端口
	private $sslcert_path; 	//ssl证书
	private $sslkey_path; 	//sll证书key

	function __construct($data,$key,$sslcert_path,$sslkey_path){
		$this->data = $data;
		$this->key = $key;
		$this->sslcert_path = $sslcert_path;
		$this->sslkey_path = $sslkey_path;
	}

	//执行发送红包
	public function exec_send_redpack(){
		$res = $this->postXmlCurl($this->SetDataXml(), self::$wx_redpack_url, $useCert=true);
		return $this->FromXml($res);
	}

	//得到最终post的xml数据
	private function SetDataXml(){
		//将sign整合到$data
		$this->data['sign'] = $this->SetSign();
    	$xml = "<xml>";
    	foreach($this->data as $key=>$val){
    		if(is_numeric($val)){
    			$xml.="<".$key.">".$val."</".$key.">";
    		}else{
    			$xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
    		}
        }
        $xml.="</xml>";
        return $xml; 
	}

	/**
	 * 以post方式提交xml到对应的接口url
	 * 
	 * @param string $xml  需要post的xml数据
	 * @param string $url  url
	 * @param bool $useCert 是否需要证书，默认不需要
	 * @param int $second   url执行超时时间，默认30s
	 */
	private function postXmlCurl($xml, $url, $useCert=false, $second=30){		
		$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOPT_TIMEOUT, $second);
		
		//如果有配置代理这里就设置代理
		if($this->curl_proxy_host != "0.0.0.0" && $this->curl_proxy_port != 0){
			curl_setopt($ch,CURLOPT_PROXY, $this->curl_proxy_host);
			curl_setopt($ch,CURLOPT_PROXYPORT, $this->curl_proxy_port);
		}
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//严格校验
		//设置header
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	
		if($useCert == true){
			//设置证书
			//使用证书：cert 与 key 分别属于两个.pem文件
			curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
			curl_setopt($ch,CURLOPT_SSLCERT, $this->sslcert_path);
			curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
			curl_setopt($ch,CURLOPT_SSLKEY, $this->sslkey_path);
		}
		//post提交方式
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		//运行curl
		$data = curl_exec($ch);
		//返回结果
		if($data){
			curl_close($ch);
			return $data;
		} 
		else{ 
			$error = curl_errno($ch);
			curl_close($ch);
			echo 'Curl error: '.$error;
			exit;
		}
	}

	//生成签名
	//@return String
	private function SetSign(){
		//给$data组装nonce_str
		$this->data['nonce_str'] = $this->getNonceStr();
		//签名步骤一：按字典序排序参数
		ksort($this->data);
		$string = $this->ToUrlParams($this->data);
		//签名步骤二：在string后加入KEY
		$string = $string . "&key=".$this->key;
		//签名步骤三：MD5加密
		$string = md5($string);
		//签名步骤四：所有字符转为大写
		$result = strtoupper($string);
		return $result;
	}

	//格式化参数格式化成url参数
	//忽略sign
	private function ToUrlParams($arr){
		$buff = "";
		foreach($arr as $k => $v){
			if($v!="" && !is_array($v)){
				$buff .= $k . "=" . $v . "&";
			}
		}
		$buff = trim($buff, "&");
		return $buff;
	}

	//产生随机字符串，不长于32位
	//@param int $length
	//@return 产生的随机字符串
	private function getNonceStr($length = 32){
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";  
		$str ="";
		for ( $i = 0; $i < $length; $i++ )  {  
			$str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
		} 
		return $str;
	}

	/**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
	private function FromXml($xml)
	{	
        //将XML转为array
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);		
	}

}

?>