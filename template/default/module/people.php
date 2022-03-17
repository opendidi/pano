<?php
//用户空间
if(!defined('IN_T')){
	die('hacking attempt');
}

$uid = intval($_REQUEST['uid']);

//查询用户是否存在
$author = $Db->query('SELECT u.phone,u.nickname,u.level,p.*,u.pk_user_main FROM '.$Base->table('user').' u LEFT JOIN '.$Base->table('user_profile').'p ON u.pk_user_main = p.pk_user_main WHERE u.pk_user_main = '.$uid,'Row' );

//作者主页
if($author){	
	$type = Common::sfilter($_REQUEST['type']);
	$size = 24;
	$page = intval($_REQUEST['page']);
	//全景视频
	if($type=='video'){
		$sql = 'select id,vname,thumb_path,browsing_num from '.$GLOBALS['Base']->table('video').' '.
		       'WHERE pk_user_main = '.$uid.' ORDER BY id DESC LIMIT '.($page-1)*$size.' , '.$size;
		echo $Json->encode($Db->query($sql));
		exit;
	}
	//全景图片
	else if($type=='pic'){
		$sql = 'SELECT name , view_uuid , thumb_path , browsing_num FROM '.$Base->table('worksmain').' '.
		       'WHERE pk_user_main = '.$uid.' ORDER BY pk_works_main DESC LIMIT '.($page-1)*$size.' , '.$size;
		echo $Json->encode($Db->query($sql));
		exit;
	}
	//显示非列表其他内容
	else{
		$addr = "";
		for($i=0 ; $i<7 ; $i++){
			if ($author['region_'.$i]>0) {
				$re = $Db->query('SELECT name FROM '.$Base->table('region').' WHERE id = '.$author['region_'.$i],'One');
				if (!empty($re)) {
					$addr .= $re;
				}
			}
		}
		$author['addr'] = $addr;
		
		//循环取出地区
		$author['region'] = '';
		$r_type = 1;
		while($author['region_'.$r_type]>0){
			$author['region'] .= ' '.$Db->query("select name from ".$Base->table('region')." where id=".$author['region_'.$r_type]."","One");
			$r_type++;
		}
		
		$tp->assign('author',$author);
		
		//首页推荐的项目
		$index_show = $Db->query('SELECT view_uuid FROM '.$Base->table('worksmain').' WHERE pk_user_main='.$uid.' ORDER BY pk_works_main DESC LIMIT 1','One' );
		if($index_show){
			$index_show = !empty($author['index_show']) ? $author['index_show'] : $_lang['host'].'tour/'.$index_show;
			$tp->assign('index_show',$index_show);
		}	
		
		//人气、作品数
		$tp->assign('work_stat',$Db->query("select count(*) as counts,sum(browsing_num) as browses from ".$Base->table('worksmain')." where pk_user_main=$uid","Row"));
	}
}
//作者列表
else{
	$ajax = intval($_REQUEST['ajax']);
	
	$page = intval($_REQUEST['page']);
	$page = $page<1? 1: $page;
	$size = 20;

	$spm = Common::sfilter($_REQUEST['spm']);
	$spm = explode('.',$spm);	
	$level = intval($spm[0]);
	$filter = intval($spm[1]);
	$region = intval($spm[2]);
	
	//获取区域信息
	require_once ROOT_PATH.'source/include/cls_region.php';
	$maxNode = Region::getMaxNode();
	
	//刷新页
	if(!$ajax){
		$tp->assign('spm',$levle.'.'.$filter.'.'.$region);
		$tp->assign("level",$level);
		$tp->assign('filter',$filter);
		$tp->assign('region',$region);
		
		$tp->assign('maxNode',$maxNode);
		//根据最终端region_id递归取出完整region层级
		do{
			$r = $Db->query("select id,type,parentid from ".$Base->table('region')." where id=$region","Row");
			$region = $r['parentid'];
			if($r) $rs['region_'.$r['type']] = $r['id'];
		}
		while($region>0);
		$tp->assign('regions',$Json->encode($rs));
		$tp->assign('groups',$Db->query('SELECT level_name,id FROM '.$Base->table('user_level')));   //查询所有组别
	}
	//ajax
	else{
		$res = listMembers($level,$filter,$region,$page,$size,$maxNode);
		echo $Json->encode($res);
		exit;
	}
}

function listMembers($level,$filter,$region,$page,$size,$maxNode){
	$sql = 'SELECT u.level,u.nickname,u.phone,u.pk_user_main,p.avatar,COUNT(w.pk_works_main) AS total , SUM(w.browsing_num) AS popular FROM '.$GLOBALS['Base']->table('user').' u LEFT JOIN '.$GLOBALS['Base']->table('user_profile').' p ON p.pk_user_main  = u.pk_user_main LEFT JOIN '.$GLOBALS['Base']->table('worksmain').' w ON u.pk_user_main = w.pk_user_main WHERE 1=1 ';
	if ($level>0) {
		$sql.=' AND u.level = '.$level;
	}
	if($region>0){
		$sql .= " AND p.region_$maxNode=$region ";
	}
	$sql.=' GROUP BY u.pk_user_main ';
	switch($filter) {
		case 1: //人气
			$sql .= ' ORDER BY popular DESC';
			break;
		case 2:
			$sql .= ' ORDER BY total DESC';
			break;
		case 3:
			$sql .= ' ORDER BY u.create_time DESC';
			break;
		case 4:
			$sql .= ' ORDER BY  popular DESC,total DESC';
			break;
	}
	$sql = 'select * from ('.$sql.') as temp where total>0 ';

	$res['count'] = count($GLOBALS['Db']->query($sql));
	$sql .= ' LIMIT '.($page-1)*$size.','.$size;
	//$res['count'] = $GLOBALS['Db']->query("SELECT COUNT(*) AS num FROM ".$GLOBALS['Base']->table('user'),"One");
	$list = $GLOBALS['Db']->query($sql);

	foreach ($list as &$l) {
		if (empty($l['total'])) {
			$l['total'] = 0 ;
		}

		if (empty($l['popular'])){
			$l['popular'] = 0 ;
		}else if($l['popular']>10000){
			$l['popular'] = round($l['popular']/10000,1).'万';
		}
	}

	$res['res'] = $list;
	return $res;
}
?>