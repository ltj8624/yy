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
	$(".box4 li").click(function(){
		$(this).addClass("hover").next(".wtxx").addClass("hover").siblings(".wtxx").removeClass("hover")
		$(this).siblings("li").removeClass("hover")
	})
})
</script>
</head>
<body class="bg">
<div class="dl">
<form method="post" action="/index.php/Qt/Login/dl">
  <ul>
    <li><span>账号：</span><input name="mobile" type="text"  class="text"/></li>
    <li><span>密码：</span><input name="pwd" type="password"  class="text"/></li>
    <div>
    <a href="<?php echo U('Qt/Login/wjmm');?>">忘记密码？</a></div>
   <input type="submit" class="an2" value="登录" />
    
    <a href="<?php echo U('Qt/Login/zc');?>"><input type="button" class="an4" value="注册"  /></a>
    <h1>其他登录方式</h1>
    <h2><a href="<?php echo U('Qt/Login/redirec');?>
"><img src="/Public/img/weixin2.png" /></a><a href="#"><img src="/Public/img/QQ.png" /></a></h2>
  </ul>
  </form>
</div>
</body>
</html>