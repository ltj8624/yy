<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="/Public/css/public.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/page.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/js/public.js"></script>
</head>
<body>

	<!-- 登录页面头部 -->
	<div class="logHead">
		<img src="/Public/img/webwxgetmsgimg.jpg" height="80" />
		<span>云联金阳后台</span>
	</div>
	<!-- 登录页面头部结束 -->
	<!-- 登录form start -->
	<div class="logDiv">
		<img class="logBanner" src="/Public/img/logBanner.png" />
		<div class="logGet">
			<!-- 头部提示信息 -->
			<div class="logD logDtip">
				<p class="p1">登录</p>
			</div>
			<form action="<?php echo U('Home/Login/login');?>" method="post">
			<!-- 输入框 -->
			<div class="lgD">
				<img class="img1" src="/Public/img/logName.png" />
				<input type="text" placeholder="输入用户名" name="uname"/>
			</div>
			<div class="lgD">
				<img class="img1" src="/Public/img/logPwd.png" />
				<input type="password" placeholder="输入用户密码" name="upwd"/>
			</div>
			<div class="lgD logD2">
				<input class="getYZM" type="text" name="yzm"/>
				<div class="logYZM">
					<img src="yzm" onclick="this.src=this.src+'?'"/>
				</div>
			</div>
			<div class="logC">
				<input type="submit" value="登 录" class="logB"/>
			</div>
			</form>
		</div>
	</div>
	<!-- 登录form  end -->
	<!-- 登录页面底部 -->
	<div class="logFoot">
		<p class="p1">版权所有：哈尔滨千石科技有限公司 登记序号：黑ICP备11003578号-2</p>
	</div>
	<!-- 登录页面底部end -->
	<script>
		$(".yzm").click(function(){
			$(this).attr("src","/Dsupport/index.php/Home/Login/yzm/"+Math.random());
		})
	</script>
</body>
</html>