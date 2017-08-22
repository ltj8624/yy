<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/sc.css" type="text/css" />
<link rel="stylesheet" href="css/sc.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
</head>
<body style="background-color:rgba(204,204,204,0.05)">
<div class="top"><a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>商城-提交订单</div>
<div class="ddk">
<form action="/index.php/Qt/Goods/dd_xx" method="post">
		
          
  <div class="dd1">
  <h1><span></span>收货人：<?php echo ($uname); ?></h1>
  <h2>收货地址：<input type="text" name='adds' value="<?php echo ($adds); ?>" /></h2>
  </div>
  <ul>
    <li style="padding-top:2.5vw;padding-bottom:2.5vw;">
    <div><span>￥<?php echo ($much); ?>元</span><a href="sc_xx.html"><img src="/Public/img/sp.jpg"></a><h1><?php echo ($gname); ?> <input type="number" name='number' class='num' min="1" value="1" /></h1></div>
    <input type="hidden" class="woo" name="much" value="<?php echo ($much); ?>">
    <input type="hidden" class="wo" name="kmuch" value="<?php echo ($kmuch); ?>">
    </li>
  </ul>
  <div class="dd1">
  <h3><span>￥<?php echo ($kmuch); ?>元</span>配送方式：顺丰 </h3>
  <h3>买家留言：<input type="text" placeholder="对本次交易的说明" /></h3>
  </div>
 <input type="hidden" value="<?php echo ($gid); ?>" name="gid"/>
<!-- <div class="baoxian" style=" margin-top:5vw; margin-bottom:2.5vw;"><input name="" type="checkbox" value="" />同意<a href="<?php echo U('Qt/News/cpht');?>">《云联金阳牧场运营协议》</a></div>
-->  <div class="tjdd"><input name="提交" type="submit" class="tjddan" value="提交订单"/><span class='ddzj'>共计：￥<?php echo ($vv); ?></>元</span></div>
</div>
 </form>
 <script>
	$('.num').click(function(){
		var woo = $('.woo').val();
		var wo=$('.wo').val();
		var num = $('.num').val();
		$.post('/index.php/Qt/Goods/ajax',{'woo':woo,'num':num}, function(t) {
			if (t == 1) {
				var qian = parseInt(woo*num)+parseInt(wo);
				$('.ddzj').html('共计：'+qian+'元');
			}
		});
	})
</script> 
</body>
</html>