<?php
/*
 * 93lh 隐藏logo插件
 * ============================================================================
 * 技术支持：2015-2099 领航数码
 * 官网地址: http://www.93lh.com
 * ----------------------------------------------------------------------------
 * $Author: wanghao 26344137#qq.com $
 * $Id: bind.php 28028 2016-06-19Z yuanjiang $
*/

$plugins['showlogo'] = array(
		'plugin_name' => '隐藏logo',
		"enable" => 1,    			
		"edit_container" => "option_group",
		"edit_sort" => 4,
		"view_container" => "",
		"view_sort" => 1,
		"view_resource"=>1,
		"table"=>"worksmain",
  		"column"=>"hidelogo_flag"
	);


?>