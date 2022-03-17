<?php
/*
 * 93lh 背景音乐插件
 * ============================================================================
 * 技术支持：2015-2099 领航数码
 * 官网地址: http://www.93lh.com
 * ----------------------------------------------------------------------------
 * $Author: wanghao 26344137#qq.com $
 * $Id: bind.php 28028 2016-06-19Z yuanjiang $
*/

$plugins['bgmusic'] = array(
		'plugin_name' => '背景音乐',
		"enable" => 1,    			
		"edit_container" => "setting_group",
		"edit_sort" => 1,
		"edit_resource"=>1,
		"view_container" => "right_top",
		"view_sort" => 2,
		"xml" => 'plugin.xml', 
	);


?>