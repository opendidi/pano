<?php
/*
 * 93lh 点赞插件
 * ============================================================================
 * 技术支持：2015-2099 领航数码
 * 官网地址: http://www.93lh.com
 * ----------------------------------------------------------------------------
 * $Author: wanghao 26344137#qq.com $
 * $Id: bind.php 28028 2016-06-19Z wanghao $
*/

$plugins['praise'] = array(
		'plugin_name' => '隐藏点赞',
		"enable" => 1,    			
		"edit_container" => "option_group",
		"edit_sort" => 8,
		"view_container" => "right_bottom",
		"view_sort" => 4,
		"table"=>"worksmain",
  		"column"=>"hidepraise_flag"
	);


?>