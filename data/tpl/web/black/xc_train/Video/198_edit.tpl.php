<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/css/style.css" />
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/bootstrap-select/bootstrap-select.min.css" />
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.css" />
<style>
    .type1,.type2,.type3,.type4{display: none;}
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            列表>编辑
        </h3>
    </div>
    <div class="panel-body">
        <form id="sign-form" class="form-horizontal" role="form" method="post" action="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savemodel','version_id'=>$_GPC['version_id']));?>" name="submit" style="padding: 20px 0;">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">名称</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="name" id="name" value="<?php  echo $list['name'];?>">
                    <input type="hidden" name="id" value="<?php  echo $list['id'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">分类</label>
                <div class="col-sm-8">
                    <select class="selectpicker show-tick form-control bs-select-hidden" data-live-search="true" name="cid" style="width: 50%;">
                        <option value="0" hassubinfo="true">请选择分类</option>
                        <?php  if(is_array($class)) { foreach($class as $index => $vo) { ?>
                        <option value="<?php  echo $vo['id'];?>" <?php  if($vo['id']==$list['cid']) { ?>selected<?php  } ?>><?php  echo $vo['name'];?></option>
                        <?php  } } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">课程</label>
                <div class="col-sm-8">
                    <select class="selectpicker show-tick form-control bs-select-hidden" data-live-search="true" name="pid" style="width: 50%;">
                        <option value="0" hassubinfo="true">请选择课程</option>
                        <?php  if(is_array($service)) { foreach($service as $index => $vo) { ?>
                        <option value="<?php  echo $vo['id'];?>" <?php  if($vo['id']==$list['pid']) { ?>selected<?php  } ?>><?php  echo $vo['name'];?></option>
                        <?php  } } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">视频类型</label>
                <div class="col-sm-8">
                    <label class="radio inline" style="width: 60px;">
                        <input type="radio" class="ui-radio" name="type" id="type1" value="1" <?php  if($list['type']==1) { ?>checked<?php  } ?>>本地上传
                    </label>
                    <label class="radio inline">
                        <input type="radio" class="ui-radio" name="type" id="type2" value="2" <?php  if($list['type']==2) { ?>checked<?php  } ?>>插件
                    </label>
                    <label class="radio inline" style="width: 160px;">
                        <input type="radio" class="ui-radio" name="type" id="type3" value="3" <?php  if($list['type']==3) { ?>checked<?php  } ?>>腾讯视频(标清,无广告)
                    </label>
                    <label class="radio inline" style="width: 160px;">
                        <input type="radio" class="ui-radio" name="type" id="type4" value="4" <?php  if($list['type']==4) { ?>checked<?php  } ?>>腾讯视频(高清,无广告)
                    </label>
                </div>
            </div>
            <div class="form-group type1">
                <label class="col-sm-2 control-label">视频</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_video('video',$list['video']);?>
                </div>
            </div>
            <div class="form-group type2">
                <label class="col-sm-2 control-label">vid</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="vid" value="<?php  echo $list['vid'];?>">
                    <span class="help-block">请在“小程序管理后台→设置→第三方服务→插件管理”中查找插件名称“腾讯视频”，并申请使用。</span>
                </div>
            </div>
            <div class="form-group type3 type4">
                <label class="col-sm-2 control-label">视频链接</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control"  name="link" value="<?php  echo $list['link'];?>">
                        <span class="input-group-btn">
                            <button class="btn btn-default video_test" type="button" data-toggle="modal" data-target="#video_test">测试</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">视频封面（750*320）</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('bimg',$list['bimg']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">价格</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="price" value="<?php  echo $list['price'];?>">
                    <span class="help-block">0则免费</span>
                </div>
            </div>
            <div class="form-group teacher">
                <label  class="col-sm-2 control-label">主讲老师</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="teacher_id" value="<?php  echo $list['teacher_id'];?>">
                        <input type="text" class="form-control" name="teacher_name" value="<?php  echo $list['teacher_name'];?>">
                        <span class="input-group-btn">
                            <button class="btn btn-default link" type="button" data-toggle="modal" data-target="#sort_link">选择教师</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-8">
                    <?php  if($list['status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="sort" value="<?php  echo $list['sort'];?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" name="submit" class="btn btn-default" value="提交">
                    <a class="btn btn-default" href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m']));?>">返回</a>
                    <input id="res" name="res" type="reset" style="display:none;" />
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="sort_link"><div class="modal-dialog">
    <style>
        #sort_link .modal-body {padding: 10px 15px;}
        #sort_link .tab-pane {margin-top: 5px; min-height: 400px; max-height: 400px; overflow-y: auto;}
        #sort_tab{margin-bottom: 10px;}
    </style>
    <div class="modal-content">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">链接</h4>
        </div>
        <div class="modal-body">
            <iframe width="100%" height="395" frameborder="no" border="0" scrolling="no" allowtransparency="yes" src="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'teacher'));?>"></iframe>
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" id="sort_close" type="button">关闭</button>
        </div>
        <script>
            var sort_objc='';
            $(function(){
                $(".sort_customize").on('click','.sort_link',function(){
                    var id=$(this).attr("data-id");
                    if(id==2){
                        $("#sort_link").find("#sort_tab li").eq(1).hide();
                    }else{
                        $("#sort_link").find("#sort_tab li").eq(1).show();
                    }
                    sort_objc=this;
                });
                $("#sort_link").find('#sort_tab a').click(function(e) {
                    $('#tab').val($(this).attr('href'));
                    e.preventDefault();
                    $(this).tab('show');
                });
            });
        </script>
    </div>
</div></div>
<div class="modal fade" id="video_test"><div class="modal-dialog">
    <style>
        #sort_link .modal-body {padding: 10px 15px;}
        #sort_link .tab-pane {margin-top: 5px; min-height: 400px; max-height: 400px; overflow-y: auto;}
        #sort_tab{margin-bottom: 10px;}
    </style>
    <div class="modal-content">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">测试观看</h4>
        </div>
        <div class="modal-body">
            <video src="" id="test_link" controls="controls"></video>
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
        </div>
    </div>
</div></div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
<script>
    require(["../addons/<?php  echo $_GPC['m']?>/resource/bootstrap-select/bootstrap-select.min.js"],function(){

    })
</script>
<script>
    if($("#type1").is(":checked")){
        $(".type2").hide();
        $(".type3").hide();
        $(".type4").hide();
        $(".type1").show();
    }else if($("#type2").is(":checked")){
        $(".type1").hide();
        $(".type3").hide();
        $(".type4").hide();
        $(".type2").show();
    }else if($("#type3").is(":checked")){
        $(".type1").hide();
        $(".type2").hide();
        $(".type4").hide();
        $(".type3").show();
    }else if($("#type4").is(":checked")){
        $(".type1").hide();
        $(".type2").hide();
        $(".type3").hide();
        $(".type4").show();
    }
    var objc="";
    require(["../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.js"],function(){
        $(function(){
            $("input[name='type']").change(function(){
                if($("#type1").is(":checked")){
                    $(".type2").hide();
                    $(".type3").hide();
                    $(".type4").hide();
                    $(".type1").show();
                }else if($("#type2").is(":checked")){
                    $(".type1").hide();
                    $(".type3").hide();
                    $(".type4").hide();
                    $(".type2").show();
                }else if($("#type3").is(":checked")){
                    $(".type1").hide();
                    $(".type2").hide();
                    $(".type4").hide();
                    $(".type3").show();
                }else if($("#type4").is(":checked")){
                    $(".type1").hide();
                    $(".type2").hide();
                    $(".type3").hide();
                    $(".type4").show();
                }
            });
            $("body").on("click",'.link',function(){
                objc=this;
            });
            $("input[name='submit']").click(function(){
                getjson();
                var data=$(".form-horizontal").serialize();
                $.ajax({
                    type:"post",
                    url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savemodel','version_id'=>$_GPC['version_id']));?>",
                    data:data,
                    dataType:'json',
                    success:function(res){
                        if(res.status==1){
                            if($("input[name='id']").val()==""){
                                $("input[name='res']").click();
                                $("body").find(".img-responsive.img-thumbnail").attr("src","");
                            }
                            swal('操作成功!', '操作成功!', 'success');
                        }else{
                            swal('操作失败!', '操作失败!', 'error');
                        }
                    }
                })
            });
            $(".video_test").click(function(){
                var link=$("input[name='link']").val();
                if(link!=""){
                    $.ajax({
                        type:"post",
                        url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'video_change','version_id'=>$_GPC['version_id']));?>",
                        data:{link:link},
                        dataType:'json',
                        success:function(res){
                            if(res.status==1){
                                $("#test_link").attr("src",res.data.link);
                            }else{
                                swal('操作失败!', '操作失败!', 'error');
                            }
                        }
                    })
                }
            });
        })
    })
    function getjson(){
        var teacher=[];
        $(".teacher").find("input[name='list']").each(function(){
            var id=$(this).attr("data-id");
            var name=$(this).val();
            if(id!="" && name!=""){
                var data={id:id,name:name};
                teacher.push(data);
            }
        });
        if(teacher.length>0){
            $("input[name='teacher']").val(JSON.stringify(teacher));
        }
    }
</script>