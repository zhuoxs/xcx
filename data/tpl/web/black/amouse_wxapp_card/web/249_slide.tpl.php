<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('slide', array('op' => 'post'))?>"><?php  if($id==0) { ?>添加幻灯片<?php  } else { ?>修改幻灯片<?php  } ?></a></li>
	<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('slide', array('op' => 'display'))?>">管理幻灯片</a></li>
</ul>
<?php  if($operation == 'post') { ?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" id="form1">
        <div class="panel panel-default">
            <div class="panel-heading">幻灯片详细设置</div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片名称</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="catename" class="form-control" value="<?php  echo $slide['name'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯图片</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('thumb', $slide['thumb']);?>
                        <span class="help">幻灯片建议宽度：480px，高度：150px。此次幻灯片审核通过显示在百万曝光</span>
                    </div>
                </div>
                <div class="form-group model">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片到期时间</label>
                    <div class="col-sm-8 col-xs-12">
                        <?php echo tpl_form_field_date('endtime', !empty($slide['endtime']) ? date('Y-m-d H:i',$slide['endtime']) : date('Y-m-d H:i'), 1)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="radio" name="status" value="0" id="form-oauth1-0"  <?php  if($slide['isshow'] == 0) { ?>checked="true"<?php  } ?>  />
                        <label for="form-oauth1-0">正常</label>
                        <input type="radio" name="status" value="1" id="form-oauth1-1"  <?php  if($slide['isshow'] == 1) { ?>checked="true"<?php  } ?>  />
                        <label for="form-oauth1-1">到期禁用</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转类型</label>
                    <div class="col-sm-9 col-xs-12">
                        <label class="radio-inline" for="form-oauth-0">
                            <input type="radio" name="status" value="0" onclick="setProStatus()"  id="form-oauth-0"  <?php  if($slide['status'] == 0) { ?>checked="true"<?php  } ?>  /> 小程序</label>
                        <label class="radio-inline" for="form-oauth-1">
                            <input type="radio" name="status" value="1" onclick="setProStatus()"  id="form-oauth-1"  <?php  if($slide['status'] == 1) { ?>checked="true"<?php  } ?>  /> web网页</label>
                    </div>
                </div>

                <div class="form-group show_xcx_div" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序点击类型</label>
                    <div class="col-sm-9 col-xs-12">
                        <label class="radio-inline" for="form-click-0">
                            <input type="radio" name="click" value="0" onclick="toClickApl()" id="form-click-0"  <?php  if($slide['click'] == 0) { ?>checked="true"<?php  } ?>  />
                            直接进入小程序
                        </label>
                        <label class="radio-inline" for="form-click-1">
                            <input type="radio" name="click" value="1"  onclick="toClickApl()" id="form-click-1"  <?php  if($slide['click'] == 1) { ?>checked="true"<?php  } ?>  />
                            弹出图片</label>
                    </div>
                </div>
                <div class="form-group appid" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序Appid</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="appid" class="form-control" value="<?php  echo $slide['appid'];?>" />
                        <span class="help-block">
						加入的小程序必须在同一公众号下关联，详细操作请参考 微信小程序接入指南——公众号关联小程序
					    </span>
                    </div>
                </div>
                <div class="form-group define-icon qrcode2">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">弹出的图片 </label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('qrcode', $slide['qrcode']);?>
                        <span class="help-block"> 请上传已上线的小程序二维码）</span>
                    </div>
                </div>

                <div class="form-group web_div" >
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片外链</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="url" class="form-control" value="<?php  echo $slide['url'];?>" />
                        <span class="help-block">
						  外链需要配置好业务域名 登录小程序后台，选择设置-开发设置-业务域名，新增配置域名模块
					    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        var status_val=$('input:radio[name="status"]:checked').val();
        var click=$('input:radio[name="click"]:checked').val();
        if(status_val == 0){
            $(".show_xcx_div").show();
            $(".web_div").hide();
            if(click==0){
                $(".appid").show();
                $(".qrcode2").hide();
            }else if(click==1){
                $(".appid").hide();
                $(".qrcode2").show();
            }
        }else{
            $(".show_xcx_div").hide();
            $(".web_div").show();
            $(".appid").hide();
            $(".qrcode2").hide();
        }
        var click=$('input:radio[name="click"]:checked').val();
        if(click == 0){
            $(".appid").show();
            $(".qrcode2").hide();
        }else if(click == 1){
            $(".appid").hide();
            $(".qrcode2").show();
        }
    })

    function setProStatus(){
        var pro_val=$('input:radio[name="status"]:checked').val();
        var click=$('input:radio[name="click"]:checked').val();
        console.log(click);
        if(pro_val == 0){
            $(".show_xcx_div").show();
            $(".web_div").hide();
            if(click==0){
                $(".appid").show();
                $(".qrcode2").hide();
            }else if(click==1){
                $(".appid").hide();
                $(".qrcode2").show();
            }
        }else{
            $(".show_xcx_div").hide();
            $(".web_div").show();
            $(".appid").hide();
            $(".qrcode2").hide();
        }
    }
    function toClickApl(){
        var click=$('input:radio[name="click"]:checked').val();
        if(click == 0){
            $(".appid").show();
            $(".qrcode2").hide();
        }else if(click == 1){
            $(".appid").hide();
            $(".qrcode2").show();
        }
    }
</script>
<?php  } else if($operation == 'display') { ?>
<div class="main">
	<div class="slide">
		<form action="" method="post" onsubmit="return formcheck(this)">
            <div class="panel panel-default">
                <div class="panel-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width:10%;">ID</th>
                            <th style="width:30%;">幻灯片图片</th>
                            <td style="width:20%;">  到期时间 </td>
                            <th style="width:20%;">状态</th>
                            <th style="width:10%;">类型</th>
                            <th style="width:20px;" class="text-center">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($slide)) { foreach($slide as $row) { ?>
                        <tr>
                            <td><?php  echo $row['id'];?></td>
                            <td>
                                <?php  if($row['thumb']) { ?><img src="<?php  echo tomedia($row['thumb'])?>" style='width:50px;height:50px;padding:1px;border:1px solid #ccc' /><?php  } ?><?php  echo $row['name'];?>
                            </td>
                            <td>
                                <?php  echo date('Y-m-d H:i:s', $row['endtime'])?>
                            </td>
                            <td>
                                <label data="<?php  echo $row['isshow'];?>" class='label label-default <?php  if($row['isshow']==0) { ?>label-success<?php  } ?>' ><?php  if($row['isshow']==0) { ?>正常<?php  } else if($row['isshow']==1) { ?>禁用<?php  } ?>
                                </label>
                            </td>
                            <td>
                                <label   data="<?php  echo $row['status'];?>" class='label label-default <?php  if($row['status']==0) { ?>label-success<?php  } ?>' ><?php  if($row['status']==0) { ?>小程序<?php  } else if($row['status']==1) { ?>web网页<?php  } ?>
                                </label>
                            </td>
                            <td class="text-center">
                                <a href="<?php  echo $this->createWebUrl('slide', array('op' => 'post', 'id' => $row['id']))?>" title="编辑" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i></a>
                                <a href="<?php  echo $this->createWebUrl('slide', array('op' => 'delete','id' => $row['id']))?>" onclick="return confirm('确认删除此幻灯片吗？');return false;" title="删除" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php  } } ?>
                        <tr>
                            <td></td>
                            <td colspan="4">
                                <a href="<?php  echo $this->createWebUrl('slide', array('op' => 'post'))?>"><i class="fa fa-plus"></i> 添加新幻灯片</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </form>
	</div>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>