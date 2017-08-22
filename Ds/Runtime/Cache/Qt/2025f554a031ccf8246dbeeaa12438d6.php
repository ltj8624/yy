<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/mr.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".box3 li input").focus(function(){
		$(this).addClass("focus");
		
	})
	$(".box3 input").blur(function(){
		$(this).removeClass("focus");
		
	})
})
</script>
</head>
<body>
<div class="top">
  <!--<div class="biaoqian2"></div>
  <h1><span>第一期</span></h1>-->
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心-资料
</div>
<div class="box3">
  <ul>
    <h2>基本资料</h2><!--<li>头像</li>-->
 <form action="/index.php/Qt/User/zl" method="post" enctype="multipart/form-data">
 <input type="hidden" name="vid" value="<?php echo ($vid); ?>"/>
 <?php if($idphoto != '' ): if($openid != '' ): ?><li><div class="touxiang"><img src="<?php echo ($idphoto); ?>"  /></div><input type="file" name="idphoto" class="up" /></li>
  <?php else: ?>
    <li><div class="touxiang"><img src="/Public/<?php echo ($idphoto); ?>"  /></div><input type="file" name="idphoto" class="up" /></li><?php endif; ?>
  <?php else: ?>
    <li><div class="touxiang"><img src="/Public/img/logo3.jpg"  /></div><input type="file" name="idphoto" class="up" /></li><?php endif; ?>
    <li>昵称：<input type="text" name="nickname" value="<?php echo ($nickname); ?>"  /></li>
     <li>
     <?php if($mobile != '' ): ?>手机：<input  disabled="disabled" name="mobile" value="<?php echo ($mobile); ?>" />
     <?php else: ?>
     	手机：<input type="text" name="mobile" value="<?php echo ($mobile); ?>"  placeholder="*请填写手机号*"/><?php endif; ?>
     </li>
    <li>邮箱：<input type="text" name="email" value="<?php echo ($email); ?>" />
    <!--<input type="button"  value="验证"  style="background-color:rgba(255,255,255,0); border:0px; width:12%; color:rgba(255,51,0,1)" /></li>-->
    <h2>安全资料</h2>
    <li>姓名：<input type="text" name="name" value="<?php echo ($name); ?>" class="duantext" disabled='disabled' />
    <a href="<?php echo U('Qt/User/sfrz');?>">身份认证</a></li>
     <li>身份证：<input type="text" name="idnumber" value="<?php echo ($idnu); ?>" disabled='disabled' /></li>
    <li>收件地址：<input type="text" name="adds" value="<?php echo ($adds); ?>" /></li>
	<li>支付密码：****** <a href="xgmm2.html">修改</a></li>
    <li>登录密码：****** <a href="xgmm.html">修改</a></li>
    <input type="submit" class="an" value="确认修改"  />
 </form>
  </ul>
</div>
</body>
</html>