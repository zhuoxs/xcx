<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">
<style type="text/css">
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
    .moda{
    	position: fixed;
    	top: 30%;
    	left: 0;
    	right: 0;
    	margin:auto;
    }
    .ygmargin{margin-top: 10px;color: #999;}
    .op{
    	opacity: 0
    }
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li ><a href="<?php  echo $this->createWebUrl('messagelist')?>">发送记录</a></li>
    <li class="active"><a href="<?php  echo $this->createWebUrl('message')?>">群发模板消息</a></li>
</ul>



<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <div class="panel panel-default ygdefault">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">备注</label>
                    <div class="col-sm-9">
                        <input type="text" name="bz" class="form-control" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">信息来源</label>
                    <div class="col-sm-9">
                        <input type="text" name="ly" class="form-control" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">信息内容</label>
                    <div class="col-sm-9">
                        <input type="text" name="nr" class="form-control" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">通知时间</label>
                    <div class="col-sm-9">
                        <input type="text" name="sj" class="form-control" value="" />
                        <font color="red">*不填默认为系统当前时间</font>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转地址</label>
                    <div class="col-sm-9">
                        <input type="text" name="dz" class="form-control" value="" />
                        <font color="red">*不填默认跳转到小程序首页</font>
                        <div class="ygmargin">*跳转到积分商城(zh_cjdianc/pages/integral/integral)</div>
                        <div class="ygmargin">*跳转合作加盟(zh_cjdianc/pages/ruzhu/index)</div>
                        <div class="ygmargin">*跳转分销中心(zh_cjdianc/pages/distribution/index)</div>
                        <div class="ygmargin">*跳转会员中心(zh_cjdianc/pages/hyk/hyk)</div>
                        <div class="ygmargin">*跳转商家详情(zh_cjdianc/pages/seller/index?sjid=1) sjid=商家id</div>
                    </div>
                </div>
            </div>
        </div>

		 <div class="moda op"  style="z-index: 9999999999999999;">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
			            <button type="button" class="close cancels" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
		           	</div>
		            <div class="modal-body" style="font-size: 20px">
		                温馨提示:请不要频繁的推送!
		            </div>
		        	<div class="modal-footer">
		            	<button type="button" class="btn btn-default cancels" data-dismiss="modal">取消</button>
		                <input type="submit" class="btn btn-info" name="submit" value="发送"/>
		                <!-- <button class="btn btn-info yes">确定</button> -->
		        	</div>
		        </div>
			</div>
		</div>

        <div class="form-group">
            <!-- <input type="submit" value="发送" class="btn col-lg-3" style="color: white;background-color: #44ABF7;" /> -->
			<p class="btn col-lg-3 form_sub" style="color: white;background-color: #44ABF7;">发送</p>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        // $("#frame-8").addClass("in");
        $("#frame-17").show();
        $("#yframe-17").addClass("wyactive");
        $(".moda").hide()
        $('.form_sub').click(function(){
        	 $(".moda").show()
        	 $(".moda").css('opacity','1')
        });
        $(".cancels").click(function(){
        	$(".moda").css('opacity','0')
        })
        $(".yes").click(function(){
        	console.log(2)
        	$('.submit').submit();
        })
    })
</script>

