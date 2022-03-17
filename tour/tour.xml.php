<?php
	define('IN_T',true);
	require("../source/include/init.php");
	header("Content-type:text/xml;charset=utf-8");
    $view_uuid = Common::sfilter($_REQUEST['view']);
    //查询imgagesmain
    $worksmain = $Db->query("SELECT w.pk_works_main,w.pk_user_main,w.cdn_host,p.hotspot,p.scene_group,p.video_tie_hotspot FROM ".$Base->table('worksmain')." w LEFT JOIN ".$Base->table('pano_config')." p ON w.pk_works_main = p.pk_works_main WHERE w.view_uuid = '$view_uuid'",'Row');
	if (empty($worksmain)) {
		die("未找到相关项目");
	}
	$scene_group = $Json->decode($worksmain['scene_group']);
	$groups = $scene_group['sceneGroups'];
	if (empty($groups)) {
		$scenes = $Db->query("SELECT i.view_uuid AS viewuuid , i.filename AS sceneTitle ,i.thumb_path AS imgPath FROM ".$Base->table('imgsmain')."i LEFT JOIN ".$Base->table('imgs_works')." iw ON i.pk_img_main = iw.pk_img_main WHERE iw.pk_works_main =".$worksmain['pk_works_main']);
		$groups[]['scenes'] = $scenes;
	}
	//查询图片  imagesmain   
	$scenesRes;
	// if(count($groups)>1){
	// 	foreach ($groups as  $g) {
	// 		foreach ($g['scenes'] as $k => $s) {
	// 			if ($k==0) 
	// 				$s['album'] = $g['groupName'];
	// 			$scenesRes[] = $s;
	// 		}
	// 	}
	// }else{
	// 	$scenesRes = $groups[0]['scenes'];
	// }


	$size = sizeof($groups);
	foreach ($groups as  $g) {
		foreach ($g['scenes'] as $k => $s) {
			$row = $Db->query("SELECT levels,pk_img_main,location FROM ".$Base->table('imgsmain')." WHERE view_uuid = '".$s['viewuuid']."'",'Row');
			if(!empty($row['levels']) && $row['levels'] != 'null'){
				$s['levels'] = explode(",", $row['levels']);
				$s['pk_img_main'] = $row['pk_img_main'];
				$s['lcount'] = sizeof($s['levels']);
				$s['multi'] = 1;
			}else{
				$s['multi'] = 0;
			}
			if ($k==0&&$size>1) 
				$s['album'] = $g['groupName'];
			$location =  explode("/sourceimg", $row['location']);
			if(!empty($location)){
				// $prefix = substr(string, start);
				$prefix = $location[0];
			}else{
				$prefix = $cdn_host.$worksmain['pk_user_main'];
			}
			$s['prefix'] = $prefix.'/works';
			$scenesRes[] = $s;
		}
	}
	// print_r($scenesRes);die;
	// print_r($worksmain);die;
	require_once ROOT_PATH.'plugin/plugin_init_function.php';
	plugin_get_plugins("view",true);
	
	$cdn_host = empty($worksmain['cdn_host'])?$_lang['cdn_host']:$worksmain['cdn_host'];
	$tp->assign('cdn_host',$cdn_host);
	$type=$GLOBALS['_lang']['global_storage'];
	$tp->assign('prefix',$cdn_host.$worksmain['pk_user_main'].'/works');
	$tp->assign('scenesRes',$scenesRes);
	$tp->assign('hotspot',$Json->decode($worksmain['hotspot']));
	$tp->assign('video_tie_hotspot',$Json->decode($worksmain['video_tie_hotspot']));
	$tp->assign('startscene',Common::sfilter($_REQUEST['startscene']));
	$tp->setTemplateDir(ROOT_PATH.'tour');
	$tp->display('tour.xml');
?>