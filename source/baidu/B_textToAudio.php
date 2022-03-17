<?php

if(!defined('IN_T')){
    die('hacking attempt');
}
require_once ROOT_PATH.'/source/baidu/Response.php';
/**
* 百度TTS
*/
class B_textToAudio
{
    /**
    * 认证URL
    */
    private static $token_url="https://openapi.baidu.com/oauth/2.0/token?";
    /**
    * 语音合成URL
    */
    private static $textToAudio_url="http://tsn.baidu.com/text2audio";

    /**
    *获取百度语音合成认证
    *@param $apikey 必须参数，应用的 API Key
    *@param $secretKey 必须参数，应用的 Secret Key
    *@return 响应数据包如下所示，其中 “access_token” 字段即为请求 REST API 所需的令牌, 默认情况下，Access Token 
    *有效期为一个月，开发者需要对 Access Token的有效性进行判断，如果Access Token过期可以重新获取。
    {
    "access_token": "1.a6b7dbd428f731035f771b8d********.86400.1292922000-2346678-124328",
    "expires_in": 86400,
    "refresh_token": "2.385d55f8615fdfd9edb7c4b********.604800.1293440400-2346678-124328",
    "scope": "public",
    "session_key": "ANXxSNjwQDugf8615Onqeik********CdlLxn",
    "session_secret": "248APxvxjCZ0VEC********aK4oZExMB",
    }
    */
    public static function getAccess_token($apiKey,$secretKey){
        if(empty($apiKey)||empty($secretKey)){
            return new Response(0,"参数不能为空");
        }
        $url=self::$token_url."grant_type=client_credentials&client_id=$apiKey&client_secret=$secretKey";
        $response=Curl::callWebServer($url);
        return new Response(1,'',$response);
    }
    /**
    * 百度TTS 文字转语音
    *@param $txt    必填 合成的文本，使用UTF-8编码，请注意文本长度必须小于1024字节
    *@param $tok    必填  开放平台获取到的开发者 access_token
    *@param $cuid   必填  用户唯一标识，用来区分用户，填写机器 MAC 地址或 IMEI 码，长度为60以内
    *@param $lan    必填  语言选择,填写zh
    *@param $ctp    必填  客户端类型选择，web端填写1
    *@param $spd    选填  语速，取值0-9，默认为5中语速
    *@param $pit    选填  音调，取值0-9，默认为5中语调
    *@param $vol    选填  音量，取值0-9，默认为5中音量
    *@param $per    选填  发音人选择, 0为女声，1为男声，3为情感合成-度逍遥，4为情感合成-度丫丫，默认为普通女声
    *@param $timeout 默认超时时间 300s
    *@return 如果合成成功，下行数据为二进制语音文件，具体header信息 Content-Type：audio/
    *mp3；如果合成出现错误，则会返回json结果，具体header信息为：Content-Type:application/json
    */
    public static function textToAudio($tex,$tok,$cuid,$lan='zh',$ctp=1,$per=0,$spd=5,$pit=5,$vol=5,$timeout=300){
        if(empty($tex)||empty($tok)||empty($cuid)){
            return new Response(1,"参数不能为空");
        }
        $arr=array('tex'=>$tex,'lan'=>$lan,'tok'=>$tok,'ctp'=>$ctp,'cuid'=>$cuid,'spd'=>$spd,'pit'=>$pit,'vol'=>$vol,
            'per'=>$per);
        foreach($arr as $key => $v){
                 $params[]="$key=".urlencode(urlencode($v))."";
        }
        $data=implode('&', $params);
        $response=self::postData(self::$textToAudio_url,$data);
        // file_put_contents("test.mp3", $response);
        return new Response(1,'',$response);
    }
    /**
    * 存储文件
    *@param $filename 文件路径
    *@param $data 数据
    *@return 
    */
    public static function saveFile($filename,$data){
        try{
            file_put_contents($filename, $data);
        }
        catch(Exception $e){
            return new Response(0,'存储错误');
        }
        return new Response(1,'成功');
    }

    /**
    * 以POST方式请求接口
    *@param $url 接口地址
    *@param $data 数据
    *@param $timeout 默认超时时间 300s
    *@return 
    */
    public static function postData($url,$data,$timeout=300){
        // 1. 初始化
        $ch=curl_init();
        // 2. 设置选项，包括URL
        curl_setopt($ch, CURLOPT_URL, $url);     
        curl_setopt($ch, CURLOPT_POST, true);      
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);      
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);      
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);   
        // 3. 执行并获取HTML文档内容   
        $response = curl_exec($ch);    
        // 4. 释放curl句柄  
        curl_close($ch);      
        return $response;   
    }
}
?>
