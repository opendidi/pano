<?php
/**
 * 地区管理
 * @author wh 10.18.2014
*/
class Region{

	/**
	*  根据父级id返回子集的集合
	*/
	public static function listByPid($pid = 0 ){
		return  $GLOBALS['Db']->query('SELECT * FROM '.$GLOBALS['Base']->table('region').' WHERE parentid = '.$pid);
	}

	/**
	* 查询最大层级
	*/
	public static function getMaxNode(){
		return  $GLOBALS['Db']->query('SELECT MAX(type) AS m FROM '.$GLOBALS['Base']->table('region'),'One');
	}
}



?>