<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<div class="head">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php  echo $_W['siteroot'];?>">
					<img src="<?php  if(!empty($_W['setting']['copyright']['blogo'])) { ?><?php  echo tomedia($_W['setting']['copyright']['blogo'])?><?php  } else { ?>./resource/images/logo/logo.png<?php  } ?>" class="pull-left" width="110px" height="35px">
				</a>
			</div>
		</div>
	</nav>
</div>
<div class="main bind-account third-bind" ng-controller="userBindCtrl" ng-cloak>
	<div class="register" style="">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="javascript:;" class="we7-form">
					<?php  if($_W['setting']['copyright']['bind'] == 'mobile') { ?>
					<div class="name">
						<span class="icon"><i class="wi wi-iphone"></i></span>
						请绑定手机号
						<small class="color-gray">(绑定后，可以用手机号登录系统)</small>
					</div>
					<div class="form-group input-group">
						<input type="text" class="form-control" placeholder="输入手机号" ng-model="mobile">
					<span class="input-group-btn">
						<button class="btn btn-primary send-code" ng-disabled="isDisable" ng-click="sendMessage(bindmobile.third_nickname)">{{text}}</button>
					</span>
					</div>
					<div class="form-group input-group">
						<input type="text" ng-model='imagecode' class="form-control" placeholder="输入图形验证码">
						<a href="javascript:;" class="input-group-btn imgverify" style="" ng-click="changeVerify()"><img ng-src="{{image}}" style="width: 127px; height: 32px;"/></a>
					</div>
					<div class="form-group">
						<input type="text" ng-model='smscode' class="form-control" placeholder="输入手机验证码">
					</div>
					<?php  if(empty($bind_mobile)) { ?>
					<div class="form-group">
						<input type="password" ng-model='password' class="form-control" placeholder="输入密码">
					</div>
					<div class="form-group">
						<input type="password" ng-model='repassword' class="form-control" placeholder="再次输入密码">
					</div>
					<?php  } ?>
					<div class="form-group text-right">
						<button type="button" class="btn btn-primary" ng-click="mobileBind(bindmobile.third_nickname, 3)">确定</button>
						<button type="button" class="btn smscodebtn-default" data-dismiss="modal">取消</button>
					</div>
					<?php  } ?>
					<?php  if($_W['setting']['copyright']['bind'] == 'qq') { ?>
					<div class="bind-qq">
						<div class="icon">
							<i class="wi wi-qq"></i>
						</div>
						<div>请绑定QQ</div>
						<div class="color-gray">
							<small>绑定后，可以直接用QQ登录系统</small>
						</div>
						<div>
							<a href="<?php  echo $support_bind_urls['qq'];?>" class="btn btn-primary">去绑定</a>
						</div>
					</div>
					<?php  } ?>
					<?php  if($_W['setting']['copyright']['bind'] == 'wechat') { ?>
					<div class="bind-wechat">
						<div class="icon">
							<i class="wi wi-wechat"></i>
						</div>
						<div>请绑定微信</div>
						<div class="color-gray">
							<small>绑定后，可以直接用微信登录系统</small>
						</div>
						<div>
							<a href="<?php  echo $support_bind_urls['wechat'];?>" class="btn btn-primary">去绑定</a>
						</div>
					</div>
					<?php  } ?>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	angular.module('userProfile').value('config',{
		'bind_sign': "<?php echo !empty($bind_sign) ? $bind_sign : 'null'?>",
		'image' : "<?php  echo url('utility/code')?>",
		'links':{
			'img_verify_link': "<?php  echo url('utility/code')?>",
			'send_code_link': "<?php  echo url('utility/verifycode')?>",
			'valid_mobile_link' : "<?php  echo url('user/third-bind/validate_mobile')?>",
			'bind_mobile_link' : "<?php  echo url('user/third-bind/bind_mobile')?>",
		},
	});
	angular.bootstrap($('.bind-account'), ['userProfile']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>