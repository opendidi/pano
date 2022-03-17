<?php
//商品分类
if(!defined('IN_T')){
   die('hacking attempt');
}

$act = Common::sfilter($_REQUEST['act']);
//编辑，添加
if($act=='edit'){
   $aid = intval($_REQUEST['id']);
   //检验id是否存在
   if($aid>0){
      $a = $Db->query("select * from ".$Base->table('ad')." where id=$aid","Row");
      if(empty($a)){
         $aid = 0;
      }
   }
   if(empty($_POST)){
      $tp->assign('ad',$a);
   }
   else{
      $data = array(
      'title'=>Common::sfilter($_POST['title']),
      'content'=>Common::sfilter(stripslashes($_POST['content']),'html'),
      'postion'=>intval($_POST['postion']),
      'create_time'=>date("Y-m-d H:i:s",Common::gmtime())
      );
      $re['status'] = 0;
      if(empty($data['title'])||mb_strlen($data['title'])>50){
         $re['msg'] = '请填写0到50个字符长度的标题';
      }
      else if($data['postion']<=0){
         $re['msg'] = '请选择广告位置';
      }
      else if(empty($data['content'])){
         $re['msg'] = '请填写广告详情';
      } 
      else if($aid==0&&$Db->getCount($Base->table('ad'),'id',array('postion'=>$data['postion']))>0){
         $re['msg'] = '已经存在 "'.getAdPostion($data['postion']).'" 的广告，请重新选择或者删除。';
      }
      else{
         if($aid>0){
            $Db->update($Base->table('ad'),$data,array('id'=>$aid));
         }
         else{
            $Db->insert($Base->table('ad'),$data);
         }
         $re = array('status'=>1,'msg'=>$aid>0?'编辑成功':'添加成功','href'=>'/'.$_lang['admin_path'].'/?m=ad',);
      }
      echo $Json->encode($re);
      exit;
   }
}
//删除文章
else if($act=='delete'){
   $aid = intval($_REQUEST['aid']);
   $ad = $Db->query("select * from ".$Base->table('ad')." where id =$aid",'Row');
   if(!empty($ad)){
         $res = $Db->execSql("DELETE FROM ".$Base->table('ad')." WHERE id =$aid");
         $pics = Common::get_pics_from_html($ad['content']);
          chdir(ROOT_PATH);
          foreach($pics as $v){
            @unlink(substr($v,1));
          }
         if($res>0){
            $re['status'] = 1;
         }else{
            $re['msg']='删除失败!';
         }   
   }
   echo $Json->encode($re);
   exit;
}
//列表
else{
   $adList = $Db->query("SELECT * FROM ".$Base->table('ad'));
   if (!empty($adList)) {
      foreach ($adList as $k => $v) {
         $adList[$k]['postion']=getAdPostion($v['postion']);
      }
   }
   $tp->assign('adList',$adList);
}
function getAdPostion($postion){
   switch ($postion) {
      case 1:
         $postion = '首页顶部';
         break;
      case 2:
         $postion = '首页底部';
         break;
      case 3:
         $postion = '全景摄影页';
         break;
      case 4:
         $postion = '全景视频页';
         break;
      case 5:
         $postion = '物体环视页';
         break;
      case 6:
         $postion = '上传页';
         break;   
   }
   return $postion;
}
$tp->assign('act',$act);
$tp->assign('nav','广告列表');

?>