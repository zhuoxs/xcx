<?php
global $_GPC, $_W;

$GLOBALS['frames'] = $this->getMainMenu();

   $list = pdo_get('yzcj_sun_system',array('uniacid'=>$_W['uniacid']));
        if(checksubmit('submit')){
           
            $data['tz_audit']=$_GPC['tz_audit'];
            $data['is_car']=$_GPC['is_car'];
            $data['uniacid']=$_W['uniacid'];

            if($_GPC['id']==''){
                $res=pdo_insert('yzcj_sun_system',$data);
                if($res){
                    message('添加成功',$this->createWebUrl('red',array()),'success');
                }else{
                    message('添加失败','','error');
                }
            }else{
                $res = pdo_update('yzcj_sun_system', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
                if($res){
                    message('编辑成功',$this->createWebUrl('red',array()),'success');
                }else{
                message('编辑失败','','error');
                }
            }
        }

include $this->template('web/red');