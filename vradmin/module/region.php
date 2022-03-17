<?php
//商品分类
if(!defined('IN_T')){
   die('hacking attempt');
}
require_once ROOT_PATH.'source/include/cls_region.php';

$act = Common::sfilter($_REQUEST['act']);

if($act == 'add'){
   $name = Common::sfilter($_REQUEST['name']);
   $pid = intval($_REQUEST['pid']);
   $pid = $pid<0?0:$pid;
   $re['status'] = 0;
   if ($name==""||mb_strlen($name)>100) {
      $re['msg'] = '请输入1到100字符长度的区域';
   }else{
      $type=1;
      if($pid>0){
         $type = $Db->query('SELECT type FROM '.$Base->table('region').' WHERE id ='.$pid,'One')+1;
      }
      if ($type>6) {
         $re['msg'] = '只能创建6级区域';
      }else{
         $id = $Db->insert($Base->table('region'),array('name'=>$name,'parentid'=>$pid,'type'=>$type));
         $re['id'] = $id;
         $re['status'] = 1;
      }
   }
   echo $Json->encode($re);
   exit;
}
else if($act=='edit'){
   $id = intval($_POST['id']);
   $name = Common::sfilter($_POST['name']);
   $Db->update($Base->table('region'),array('name'=>$name),array('id'=>$id));
   echo $Json->encode(array('status'=>1));
   exit;
}
else if($act=='del'){
   $id = intval($_REQUEST['id']);
   $re['status'] = 0 ;
   if ($Db->getCount($Base->table('region'),'id',array('parentid'=>$id))>0) {
      $re['msg'] = '请先删除该区域下的下级区域';
   }else{
      $Db->delete($Base->table('region'),array('id'=>$id));
      $re['status'] = 1;
   }
   echo $Json->encode($re);
   exit;
}else{
   $pid = intval($_REQUEST['pid']);
   $tp->assign('regions',Region::listByPid($pid));
   $tp->assign('pid',$pid);
}


$tp->assign('act',$act);
$tp->assign('nav','地区管理');

?>