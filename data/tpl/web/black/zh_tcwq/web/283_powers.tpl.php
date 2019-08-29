<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">
<style type="text/css">
    .storeset{border-bottom: 1px solid #eee;padding-bottom: 10px;}
    .storesetfont{font-size: 14px;font-weight: bold;}
    .ygstoreimg>.input-group:nth-child(1){float: left;width: 50%;margin-right: 30px;}
    .ygstoreimg>.input-group:nth-child(2){float: left;width: 50px;}
    .btn{padding: 7px 12px;}
    .ygstoreimg>.input-group:nth-child(2)>img{width: 45px;height: 35px;margin-top: -7px;}
    .wyheader{height: 40px;}
</style>
<style type="text/css">
    .ygmargin{margin-top: 10px;color: #999;}
    input[type="radio"] + label::before {
        content: "\a0"; /*不换行空格*/
        display: inline-block;
        vertical-align: middle;
        font-size: 16px;
        width: 1em;
        height: 1em;
        margin-right: .4em;
        border-radius: 50%;
        border: 2px solid #ddd;
        text-indent: .15em;
        line-height: 1; 
    }
    input[type="radio"]:checked + label::before {
        background-color: #44ABF7;
        background-clip: content-box;
        padding: .1em;
        border: 2px solid #44ABF7;
    }
    input[type="radio"] {
        position: absolute;
        clip: rect(0, 0, 0, 0);
    }
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="javascript:void(0);">权限设置</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <!--<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />-->
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                <span class="ygxian"></span>
                <div class="ygdangq storesetfont">权限设置</div>
            </div>
            <div class="panel-body">
                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">拼车功能</label>
                    <div class="col-sm-9">
                        <span class="radio-inline">
                            <input id="is_pcqx" type="radio" name="is_pcqx" value="1" <?php  if($item['is_pcqx']==1 || empty($item['is_pcqx'])) { ?>checked<?php  } ?> />
                            <label for="is_pcqx">开启</label>              
                        </span>
                        <span class="radio-inline">
                            <input id="is_pcqx2" type="radio" name="is_pcqx" value="2" <?php  if($item['is_pcqx']==2) { ?>checked<?php  } ?> /> 
                            <label for="is_pcqx2">关闭</label>
                        </span>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">黄页114</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_hyqx1" name="is_hyqx" value="1" <?php  if($item['is_hyqx']==1 || empty($item['is_hyqx'])) { ?> checked <?php  } ?> />
                            <label for="is_hyqx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_hyqx2" name="is_hyqx" value="2" <?php  if($item['is_hyqx']==2) { ?> checked <?php  } ?> />
                            <label for="is_hyqx2">关闭</label>
                        </label>    
                    </div>
                </div>
                      <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">优惠券功能</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_yhqqx1" name="is_yhqqx" value="1" <?php  if($item['is_yhqqx']==1 || empty($item['is_yhqqx'])) { ?>checked<?php  } ?> />
                            <label for="is_yhqqx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_yhqqx2" name="is_yhqqx" value="2" <?php  if($item['is_yhqqx']==2) { ?>checked<?php  } ?> />
                            <label for="is_yhqqx2">关闭</label>
                        </label>
                        
                    </div>
                    
                </div>
                       <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">收银功能</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_syqx1" name="is_syqx" value="1" <?php  if($item['is_syqx']==1 || empty($item['is_syqx'])) { ?>checked<?php  } ?> />
                            <label for="is_syqx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_syqx2" name="is_syqx" value="2" <?php  if($item['is_syqx']==2) { ?>checked<?php  } ?> />
                            <label for="is_syqx2">关闭</label>
                        </label>
                        
                    </div>
                    
                </div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动报名</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_hdqx1" name="is_hdqx" value="1" <?php  if($item['is_hdqx']==1 || empty($item['is_hdqx'])) { ?>checked<?php  } ?> />
                            <label for="is_hdqx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_hdqx2" name="is_hdqx" value="2" <?php  if($item['is_hdqx']==2) { ?>checked<?php  } ?> />
                            <label for="is_hdqx2">关闭</label>
                        </label>
                        
                    </div>
                    
                </div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">红包福利</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_hbqx1" name="is_hbqx" value="1" <?php  if($item['is_hbqx']==1 || empty($item['is_hbqx'])) { ?>checked<?php  } ?> />
                            <label for="is_hbqx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_hbqx2" name="is_hbqx" value="2" <?php  if($item['is_hbqx']==2) { ?>checked<?php  } ?> />
                            <label for="is_hbqx2">关闭</label>
                        </label>
                        
                    </div>
                    
                </div>
                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">合伙人</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_hhrqx1" name="is_hhrqx" value="1" <?php  if($item['is_hhrqx']==1 || empty($item['is_hhrqx'])) { ?>checked<?php  } ?> />
                            <label for="is_hhrqx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_hhrqx2" name="is_hhrqx" value="2" <?php  if($item['is_hhrqx']==2) { ?>checked<?php  } ?> />
                            <label for="is_hhrqx2">关闭</label>
                        </label>
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">多城市</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_dcsqx1" name="is_dcsqx" value="1" <?php  if($item['is_dcsqx']==1 || empty($item['is_dcsqx'])) { ?>checked<?php  } ?> />
                            <label for="is_dcsqx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_dcsqx2" name="is_dcsqx" value="2" <?php  if($item['is_dcsqx']==2) { ?>checked<?php  } ?> />
                            <label for="is_dcsqx2">关闭</label>
                        </label>
                        
                    </div>
                    
                </div>
                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">积分功能</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_jfqx1" name="is_jfqx" value="1" <?php  if($item['is_jfqx']==1 || empty($item['is_jfqx'])) { ?>checked<?php  } ?> />
                            <label for="is_jfqx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_jfqx2" name="is_jfqx" value="2" <?php  if($item['is_jfqx']==2) { ?>checked<?php  } ?> />
                            <label for="is_jfqx2">关闭</label>
                        </label>
                        
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家商品功能</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_spqx1" name="is_spqx" value="1" <?php  if($item['is_spqx']==1 || empty($item['is_spqx'])) { ?>checked<?php  } ?> />
                            <label for="is_spqx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_spqx2" name="is_spqx" value="2" <?php  if($item['is_spqx']==2) { ?>checked<?php  } ?> />
                            <label for="is_spqx2">关闭</label>
                        </label>
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">限时抢购功能</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_qgqx1" name="is_qgqx" value="1" <?php  if($item['is_qgqx']==1 || empty($item['is_qgqx'])) { ?>checked<?php  } ?> />
                            <label for="is_qgqx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_qgqx2" name="is_qgqx" value="2" <?php  if($item['is_qgqx']==2) { ?>checked<?php  } ?> />
                            <label for="is_qgqx2">关闭</label>
                        </label>                       
                    </div>                   
                </div>
             <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">拼团功能</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="g_qx1" name="g_qx" value="1" <?php  if($item['g_qx']==1 || empty($item['g_qx'])) { ?>checked<?php  } ?> />
                            <label for="g_qx1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="g_qx2" name="g_qx" value="2" <?php  if($item['g_qx']==2) { ?>checked<?php  } ?> />
                            <label for="g_qx2">关闭</label>
                        </label>                       
                    </div>                   
                </div>
              <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">消息推送</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_message1" name="is_message" value="1" <?php  if($item['is_message']==1 || empty($item['is_message'])) { ?>checked<?php  } ?> />
                            <label for="is_message1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_message2" name="is_message" value="2" <?php  if($item['is_message']==2) { ?>checked<?php  } ?> />
                            <label for="is_message2">关闭</label>
                        </label>                       
                    </div>                   
                </div> 
             <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">视频管理</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_video1" name="is_video" value="1" <?php  if($item['is_video']==1 || empty($item['is_video'])) { ?>checked<?php  } ?> />
                            <label for="is_video1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_video2" name="is_video" value="2" <?php  if($item['is_video']==2) { ?>checked<?php  } ?> />
                            <label for="is_video2">关闭</label>
                        </label>                       
                    </div>                   
                </div>                              

            </div>         
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="提交" class="btn col-lg-3" style="color: white;background-color: #44ABF7;"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-21").show();
        $("#yframe-21").addClass("wyactive");
    })
</script>