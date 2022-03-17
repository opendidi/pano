<?php 
/**
* 统一返回接口
*/
class Response
{
	/**
	*  返回状态 0:失败 非0:成功  默认状态为 0
	*/
	public $code=0;
	/**
	* 返回状态值说明
	*/
	public $msg;
	/**
	* 返回跳转页面URI
	*/
	public $href;
	/**
	* 返回的数据
	*/
	public $data;

	/**
	* 统一返回接口
	*@param $code  返回状态 0:失败 非0:成功  默认状态为 0
	*@param $msg     返回状态值说明
	*@param $data    返回的数据
	*@param $href    返回跳转页面URI
	*/
	public function Response($code=0,$msg='',$data='',$href=''){
		$this->code=$code;
		$this->msg=$msg;
		$this->data=$data;
		$this->href=$href;
	}
}
 ?>