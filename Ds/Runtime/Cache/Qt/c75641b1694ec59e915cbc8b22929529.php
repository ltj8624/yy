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
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心-钱包
</div>
<div class="box3">
  <ul>
    <h2>绑定银行卡</h2><!--<li>头像</li>-->
    <form action="/index.php/Qt/Money/yhk" method="post">
    <li>姓名：<input type="text" value="<?php echo ($name); ?>" name="name"/></li>
    <li>卡号：<input type="text" value="<?php echo ($bank); ?>" name="bank" /></li>
    <p>请务必填写真实信息，一旦实名认证成功就不能自行修改，账户资金只能提现至真实姓名对应的银行卡。</p>
    <input type="submit" class="an" value="提交"  />
    </form>
  </ul>
</div>
</body>
</html>