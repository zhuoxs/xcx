<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('zhtc_llz',array('id'=>$_GPC['id']));

if(checksubmit('submit')){
        $data['name']=$_GPC['name'];
        $data['type']=$_GPC['type'];
        $data['status']=$_GPC['status'];
        $data['src']=$_GPC['src'];
        $data['cityname']=$_GPC['cityname'];
        $data['uniacid']=$_W['uniacid'];
     if($_GPC['id']==''){  
        $res=pdo_insert('zhtc_llz',$data);
        if($res){
             message('添加成功！', $this->createWebUrl('llz'), 'success');
        }else{
             message('添加失败！','','error');
        }
    }else{
        $res=pdo_update('zhtc_llz',$data,array('id'=>$_GPC['id']));
        if($res){
             message('编辑成功！', $this->createWebUrl('llz'), 'success');
        }else{
             message('编辑失败！','','error');
        }
    }
}
include $this->template('web/addllz');