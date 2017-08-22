<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/mr.css" type="text/css" />
<link rel="stylesheet" href="css/mr.css" type="text/css" />
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
	$(".zf1").click(function(){
		$(".aaa1").show();
		$(".aaa2").hide();
	})
	$(".zf2").click(function(){
		$(".aaa2").show();
		$(".aaa1").hide();
	})
});
</script>
</head>
<body>
<div class="top">
  <!--<div class="biaoqian2"></div>
  <h1><span>第一期</span></h1>-->
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心-充值
</div>
<div class="box1">
  <div class="yue" style="margin-bottom:2.5vw;">
  
  当前余额：<?php echo ($arr['money']); ?>元
  </div>
<div class="czk">
<h1>充值方式</h1>
<div class="czfs">
  <p class="on zf1"><img src="/Public/img/weixinzhifu.jpg" /></p>
  <p class="zf2"><img src="/Public/img/zhifubaozhifu.jpg" /></p>
</div>
<form action="/wxpay/example/jsapi.php" method='post' class="aaa1" >
<h1>充值金额</h1>
<h2>请输入微信金额<input name="money" type="text" id="yuan" />元</h2>
<input type="button" value="充值" class="an" id="submit" />
</form>

<form action="<?php echo U('Qt/WapPay/indexx');?>" method='post' class="aaa2" style="display:none;" >
<h1>充值金额</h1>
<h2>请输入支付宝金额<input name="money" type="text"  />元</h2>
<input type="submit" value="充值" class="an" id="" />
</form>

<script>
 	$("#submit").on('click',function(){
		var yuan=$("#yuan").val();
		var se=1;
        top.location.href = '/wxpay/example/jsapi.php?pay='+yuan+'&se='+se;
    })
</script>
</div>
</div>
</body>
</html>