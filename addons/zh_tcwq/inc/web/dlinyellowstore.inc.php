<?php
global $_GPC, $_W;
$sql="select * from".tablename('zhtc_account'). " where uid={$_W['user']['uid']} and find_in_set('hydel',city_qx)";
$account=pdo_fetch($sql);
$action = 'start';
$GLOBALS['frames'] = $this->getNaveMenu($_COOKIE['cityname'], $action);
$where=" where a.uniacid=:uniacid and a.cityname=:cityname ";
$type=isset($_GPC['type'])?$_GPC['type']:'wait';
if(isset($_GPC['keywords'])){
    $where.=" and a.company_name LIKE  concat('%', :name,'%') ";
    $data[':name']=$_GPC['keywords']; 
    $type='all';  
}
if(!empty($_GPC['time'])){
   $start=strtotime($_GPC['time']['start']);
   $end=strtotime($_GPC['time']['end']);
  $where.=" and a.sh_time >={$start} and a.sh_time<={$end} ";

}
if(!empty($_GPC['state'])){

  $where.=" and a.state ={$_GPC['state']}";

}
$data[':uniacid']=$_W['uniacid'];
$data[':cityname']=$_COOKIE["cityname"];
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;

if($type=='wait'){
  $_GPC['state']=1;
}
if(!empty($_GPC['state'])){

  $where.=" and a.state ={$_GPC['state']}";

}
$sql="SELECT a.*,b.days as typename FROM ".tablename('zhtc_yellowstore'). " a"  . " left join " . tablename("zhtc_yellowset") . " b on b.id=a.rz_type".$where. " ORDER BY a.sort ASC";
$total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('zhtc_yellowstore'). " a" ." left join " . tablename("zhtc_yellowset") . " b on b.id=a.rz_type".$where,$data);
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql,$data);
$pager = pagination($total, $pageindex, $pagesize);
if($_GPC['op']=='delete'){
    $res=pdo_delete('zhtc_yellowstore',array('id'=>$_GPC['id']));
    if($res){
         message('删除成功！', $this->createWebUrl2('dlinyellowstore'), 'success');
        }else{
              message('删除失败！','','error');
        }
}
if($_GPC['op']=='tg'){
    $res=pdo_update('zhtc_yellowstore',array('state'=>2,'sh_time'=>time()),array('id'=>$_GPC['id']));
    if($res){
         message('通过成功！', $this->createWebUrl2('dlinyellowstore'), 'success');
        }else{
              message('通过失败！','','error');
        }
}
if($_GPC['op']=='jj'){
    $res=pdo_update('zhtc_yellowstore',array('state'=>3,'sh_time'=>time()),array('id'=>$_GPC['id']));
    if($res){
         message('拒绝成功！', $this->createWebUrl2('dlinyellowstore'), 'success');
        }else{
              message('拒绝失败！','','error');
        }
}
include $this->template('web/dlinyellowstore');