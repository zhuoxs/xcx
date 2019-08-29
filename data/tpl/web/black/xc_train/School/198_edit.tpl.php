<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/css/style.css" />
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/bootstrap-select/bootstrap-select.min.css" />
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.css" />
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            分校管理>编辑
        </h3>
    </div>
    <div class="panel-body">
        <form id="sign-form" class="form-horizontal" role="form" method="post" action="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savemodel','version_id'=>$_GPC['version_id']));?>" name="submit" style="padding: 20px 0;">
            <div class="form-group">
                <label class="col-sm-2 control-label">名称</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="name" value="<?php  echo $list['name'];?>">
                    <input type="hidden" name="id" value="<?php  echo $list['id'];?>">
                    <input type="hidden" name="content" />
                    <input type="hidden" name="teacher" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">logo（120*120）</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('simg',$list['simg']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">电话</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="mobile" value="<?php  echo $list['mobile'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">地址</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="address" id="address" value="<?php  echo $list['address'];?>">
                </div>
                <div class="col-sm-4">
                    <button type="button" class="btn btn-default search" style="margin-right:5px;">查询</button>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">地图</label>
                <div class="col-sm-10">
                    <div id="container" style="width: 100%;height: 400px;"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <label class="col-sm-2 control-label" style="width: auto;padding-left: 15px;">经度</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="longitude" value="<?php  echo $list['longitude'];?>">
                </div>
                <label class="col-sm-2 control-label" style="width: auto;">纬度</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="latitude" value="<?php  echo $list['latitude'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">营业时间</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="plan_date" value="<?php  echo $list['plan_date'];?>">
                </div>
            </div>
            <div class="form-group teacher">
                <label  class="col-sm-2 control-label">师资</label>
                <div class="col-sm-8">
                    <?php  if($list['teacher']) { ?>
                    <?php  if(is_array($list['teacher'])) { foreach($list['teacher'] as $index => $item) { ?>
                    <div class="input-group" style="margin-bottom: 10px;">
                        <input type="text" class="form-control" name="list" value="<?php  echo $item['name'];?>" data-id="<?php  echo $item['id'];?>">
                        <span class="input-group-btn">
                            <button class="btn btn-default link" type="button" data-toggle="modal" data-target="#sort_link">选择教师</button>
                        </span>
                        <span class="input-group-btn" onclick="parameter.parameter_add(this)">
                            <button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                        </span>
                        <span class="input-group-btn" onclick="parameter.parameter_del(this)">
                            <button class="btn btn-danger" type="button"><i class="fa fa-remove"></i></button>
                        </span>
                    </div>
                    <?php  } } ?>
                    <?php  } else { ?>
                    <div class="input-group" style="margin-bottom: 10px;">
                        <input type="text" class="form-control" name="list" value="">
                        <span class="input-group-btn">
                            <button class="btn btn-default link" type="button" data-toggle="modal" data-target="#sort_link">选择教师</button>
                        </span>
                        <span class="input-group-btn" onclick="parameter.parameter_add(this)">
                            <button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                        </span>
                        <span class="input-group-btn" onclick="parameter.parameter_del(this)">
                            <button class="btn btn-danger" type="button"><i class="fa fa-remove"></i></button>
                        </span>
                    </div>
                    <?php  } ?>
                </div>
            </div>
            <script>
                var parameter={
                    parameter_add:function(objc){
                        $(objc).parent().after('<div class="input-group" style="margin-bottom: 10px;"> ' +
                                '<input type="text" class="form-control" name="list" value=""> '+
                                '<span class="input-group-btn">' +
                                '<button class="btn btn-default link" type="button" data-toggle="modal" data-target="#sort_link">选择教师</button>' +
                                '</span>'+
                                '<span class="input-group-btn" onclick="parameter.parameter_add(this)"> ' +
                                '<button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button> ' +
                                '</span> ' +
                                '<span class="input-group-btn" onclick="parameter.parameter_del(this)"> ' +
                                '<button class="btn btn-danger" type="button"><i class="fa fa-remove"></i></button> ' +
                                '</span> ' +
                                '</div>')
                    },
                    parameter_del:function(objc){
                        if($(objc).parent().siblings().length>0){
                            $(objc).parent().remove();
                        }
                    }
                }
            </script>
            <div class="form-group">
                <label class="col-sm-2 control-label">接收短信手机</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="sms" value="<?php  echo $list['sms'];?>">
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
            <div class="form-group item_content">
                <label class="col-sm-2 control-label">简述</label>
                <div class="col-sm-10" style="overflow: hidden;">
                    <div class="left-content">
                        <?php  if(is_array($list['content'])) { foreach($list['content'] as $index => $item) { ?>
                        <?php  if($item['type']==1) { ?>
                        <div class="box curr" data-type="1" style="min-height: 20px;font-size: 20px;"> <div class="ibox-tools" style="position: absolute;bottom: 0;"> <i class="fa fa-arrow-up" onclick="cmove(this,1)"></i> <i class="fa fa-arrow-down" onclick="cmove(this,2)"></i> <i class="fa fa-times" onclick="cdel(this)"></i> </div> <div class="content-text"><?php  echo $item['content'];?></div> </div>
                        <?php  } else { ?>
                        <div class="box curr" data-type="2" style="overflow: hidden;"> <div class="ibox-tools" style="position: absolute;bottom: 0;"> <i class="fa fa-arrow-up" onclick="cmove(this,1)"></i> <i class="fa fa-arrow-down" onclick="cmove(this,2)"></i> <i class="fa fa-times" onclick="cdel(this)"></i> </div> <img src="<?php  echo $item['content'];?>"> </div>
                        <?php  } ?>
                        <?php  } } ?>
                    </div>
                    <script>
                        function cmove(objc,cid){
                            var $_tobj=  $(objc).parent().parent();
                            var index=$_tobj.index();
                            if(cid==1)
                            {
                                if($_tobj.prev().length>0)
                                {
                                    $_tobj.after( $_tobj.prev() );
                                }

                            }else if(cid==2)
                            {
                                if($_tobj.next().length>0)
                                {
                                    $_tobj.next().after($_tobj);
                                }
                            }
                            if($_tobj.attr("data-type")==1){
                                $(".right_content").children().eq(0).css("margin-top",$_tobj.offset().top);
                            }else{
                                $(".right_content").children().eq(1).css("margin-top",$_tobj.offset().top);
                            }
                        }
                        function cdel(objc){
                            var $_tobj=  $(objc).parent().parent();
                            $(objc).parent().parent().remove();
                            $(".right_content").children().hide();
                            $(".right_content>div:last").show();
                        }
                    </script>
                    <div class="right_content" style="padding: 0 20px;">
                        <textarea style="width: 100%;min-height: 165px;display: none;"></textarea>
                        <div style="height: 165px;display: none;">
                            <?php  echo tpl_form_field_image('bimg');?>
                        </div>

                        <div style="margin-top: 20px;">
                            <button type="button" class="btn btn-primary addcontent">增加文字</button>
                            <button type="button" class="btn btn-primary addimg">增加图片</button>
                        </div>
                    </div>
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
            <iframe width="100%" height="395" frameborder="no" border="0" scrolling="no" allowtransparency="yes" src="<?php  echo url('site/entry/Service',array('m'=>$_GPC['m'],'op'=>'teacher'));?>"></iframe>
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
<script charset="utf-8" src="https://map.qq.com/api/js?v=2.exp&key=CE3BZ-ZH6AW-TDQRN-ORJH6-HSPIE-7XB3W"></script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
<script>
    $(function(){
        var markers=[];
        var longitude=$("input[name='longitude']").val();
        var latitude=$("input[name='latitude']").val();
        if(longitude!="" && latitude!=""){
            var center = new qq.maps.LatLng(latitude, longitude);
        }else{
            var center=new qq.maps.LatLng(39.916527,116.397128);
        }
        var map = new qq.maps.Map(document.getElementById('container'),{
            center: center,
            zoom: 16
        });
        var marker = new qq.maps.Marker({
            map:map,
            position: center
        });
        markers.push(marker);
        //调用地址解析类
        geocoder = new qq.maps.Geocoder({
            complete : function(result){
                console.log(result);
                if(result.detail.location!=""){
                    map.setCenter(result.detail.location);
                    console.log(result.detail.location);
                    $("input[name='longitude']").val(result.detail.location.lng);
                    $("input[name='latitude']").val(result.detail.location.lat);
                    clearOverlays(markers);
                    var marker = new qq.maps.Marker({
                        map:map,
                        position: result.detail.location
                    });
                    markers.push(marker);
                }
                console.log(result);
                if(result.detail.address!=""){
                    $("input[name='address']").val(result.detail.address);
                }
            }
        });
        if($("input[name='address']").val()==""){
            geocoder.getAddress(center);
        }
        qq.maps.event.addListener(
                map,
                'click',
                function(event) {
                    $("input[name='longitude']").val(event.latLng.getLng());
                    $("input[name='latitude']").val(event.latLng.getLat());
                    var center = new qq.maps.LatLng(event.latLng.getLat(), event.latLng.getLng());
                    clearOverlays(markers);
                    var marker = new qq.maps.Marker({
                        map:map,
                        position: center
                    });
                    markers.push(marker);
                    geocoder.getAddress(center);
                }
        );
        $(".search").click(function(){
            var content=$("input[name='address']").val();
            console.log(content);
            if(content!=""){
                geocoder.getLocation(content);
            }
        });
    })
    function clearOverlays(overlays) {
        var overlay;
        if(overlays.length>0){
            while (overlay = overlays.pop() ) {
                overlay.setMap(null);
            }
        }

    }
</script>
<script>
    require(["../addons/<?php  echo $_GPC['m']?>/resource/bootstrap-select/bootstrap-select.min.js"],function(){

    })
</script>
<script>
    var objc="";
    require(["../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.js"],function(){
        $(function(){
            $("body").on("click",'.link',function(){
                objc=this;
            });
            $(".item_content .img-responsive.img-thumbnail").parent().remove();
            var upload;
            $(".left-content").on("click",".box",function(){
                $(this).siblings('.box').removeClass("curr");
                $(this).addClass("curr");
                var index=$(this).index();
                $(".right_content").children().hide();
                $(".right_content>div:last").show();
                if($(this).attr("data-type")==1){
                    $(".right_content").children().eq(0).val($(this).find(".content-text").text());
                    $(".right_content").children().eq(0).show();
                    $(".right_content").children().eq(0).css("margin-top",$(this).position().top);
                }else{
                    $(".right_content").children().eq(1).show();
                    $(".right_content").children().eq(1).find("input[name='bimg']").val($(this).find("img").attr("src"));
                    $(".right_content").children().eq(1).css("margin-top",$(this).position().top);
                }
                upload=$(this);
            });
            $(".addcontent").click(function(){
                $(".left-content").find(".box").removeClass("curr");
                $(".left-content").append('<div class="box curr" data-type="1" style="min-height: 20px;font-size: 20px;"> <div class="ibox-tools" style="position: absolute;bottom: 0;"> <i class="fa fa-arrow-up" onclick="cmove(this,1)"></i> <i class="fa fa-arrow-down" onclick="cmove(this,2)"></i> <i class="fa fa-times" onclick="cdel(this)"></i> </div> <div class="content-text"></div> </div>');
                upload=$(".left-content .box:last");
                $(".right_content").children().eq(0).val($(".left-content .box:last").find(".content-text").text());
                $(".right_content").children().hide();
                $(".right_content>div:last").show();
                $(".right_content").children().eq(0).show();
                $(".right_content").children().eq(0).css("margin-top",$(".left-content .box:last").position().top);
            });
            $(".addimg").click(function(){
                $(".left-content").find(".box").removeClass("curr");
                $(".left-content").append('<div class="box curr" data-type="2" style="overflow: hidden;"> <div class="ibox-tools" style="position: absolute;bottom: 0;"> <i class="fa fa-arrow-up" onclick="cmove(this,1)"></i> <i class="fa fa-arrow-down" onclick="cmove(this,2)"></i> <i class="fa fa-times" onclick="cdel(this)"></i> </div> <img src="./resource/images/nopic.jpg"> </div>');
                upload=$(".left-content .box:last");
                $(".right_content").children().hide();
                $(".right_content>div:last").show();
                $(".right_content").children().eq(1).show();
                $(".right_content").children().eq(1).css("margin-top",$(".left-content .box:last").position().top);
                $("input[name='bimg']").val("");
            });
            $(".right_content").on("keyup"," textarea ",function(){
                var content=$(this).val();
                upload.find(".content-text").html(content);
            })
            $("body").on('click','.item',function(){
                var url=$(this).css("background-image");
                url=url.substring(5,url.length-2);
                console.log(url);
                upload.find('img').attr('src',url);
            });
            //收集内容
            function getcontent(){
                var content=[];
                $("body").find(".box").each(function(){
                    var item={};
                    if($(this).attr('data-type')==1){
                        if($(this).find(".content-text").text()!=""){
                            item['type']=1;
                            item.content=$(this).find(".content-text").text();
                            content.push(item);
                        }
                    }else{
                        if($(this).find("img").attr("src")!="./resource/images/nopic.jpg"){
                            item.type=2;
                            item.content=$(this).find("img").attr("src");
                            content.push(item);
                        }
                    }
                });
                if(content.length>0){
                    content=JSON.stringify(content);
                    $("input[name='content']").val(content);
                }
            }
            $("input[name='submit']").click(function(){
                getcontent();
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