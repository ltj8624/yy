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
    $(".szbt h1").click(function(){
		var index = $(this).index()
		$(this).addClass("hover").siblings().removeClass("hover");
		$(".szk div:eq(" + index + ")").addClass("hover").siblings().removeClass("hover");
	})
	 $(".czk li").click(function(){
		$(this).addClass("on").siblings().removeClass("on")
	})
	$(".czk h2").click(function(){
		$(".czk li").removeClass("on")
	})
	$(".czfs p").click(function(){
		$(this).addClass("on").siblings().removeClass("on")
	})
	/*$(".tijiao").click(function(){
		$(".zfmm").fadeIn();
	})
	$(".quxiao").click(function(){
		$(".zfmm").fadeOut();
	})*/
});
</script>
</head>
<body>
<div class="top">
  <!--<div class="biaoqian2"></div>
  <h1><span>第一期</span></h1>-->
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心-提现
</div>
<div class="box1">
  <div class="yue" style="margin-bottom:4vw;">
  当前余额：<?php echo ($money); ?></>元
  </div>
<div class="czk">
 <form action='/index.php/Qt/Money/tixian2' method='post'>
<h2>提现金额<input name="money" type="text" />元</h2>

<input type="submit" value="提现" class="an tijiao"  />
</div>
</form>

</div>
</body>
</html>