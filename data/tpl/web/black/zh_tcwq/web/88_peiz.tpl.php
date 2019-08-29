<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_tcwq/template/public/ygcss.css">
<ul class="nav nav-tabs">    
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li class="active"><a href="javascript:void(0);">小程序设置</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                系统设置&nbsp;>&nbsp;小程序设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">默认城市</label>
                    <div class="col-sm-9">
                        <input type="text" name="cityname" class="form-control" value="<?php  echo $item['cityname'];?>" />
                        <span class="help-block" style="color:red">*请填写运营的所在城市,如(北京市)，此项必须优先填写</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序appid：</label>
                    <div class="col-sm-9">
                        <input type="text" name="appid" value="<?php  echo $item['appid'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序appsecret：</label>
                    <div class="col-sm-9">
                        <input type="text" name="appsecret" value="<?php  echo $item['appsecret'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微信小程序JavaScript SDK的key</label>
                    <div class="col-sm-9">
                        <input type="text" name="mapkey" class="form-control" value="<?php  echo $item['mapkey'];?>" />
                        <span class="help-block">*腾讯地图申请网站 http://lbs.qq.com/qqmap_wx_jssdk/index.html</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">高德地图key</label>
                    <div class="col-sm-9">
                        <input type="text" name="gd_key" class="form-control" value="<?php  echo $item['gd_key'];?>" />
                        <span class="help-block">*申请网址:http://lbs.amap.com/dev/key/app</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <input type="submit" name="submit" value="保存设置" class="btn col-lg-3" style="color: white;background-color: #44ABF7;" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-12").show();
        $("#yframe-12").addClass("wyactive");
    })
</script>