<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/sc.css" type="text/css" />

<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".dd1 h4").click(function(){
		$(this).addClass("on").siblings().removeClass("on")
		$(this).children("input").attr("checked","checked")
		$(this).siblings().children("input").removeAttr("checked","checked"); 
	})
})
</script>
</head>
<body style="background-color:rgba(204,204,204,0.05)">
<div class="top" style="background-color:rgba(204,0,0,0.6)"><a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>商城-支付</div>

  <h1 class="cheng zffsh1">选择支付方式</h1>
  
  
  <form action="<?php echo U('Qt/WapPay/index');?>" method="post">
  	<div class="ddk">
  	<div class="dd1">
  	<h4><input  type="submit" class="zfann" value="支付宝支付"/><!--<input name="zhifubao" type="radio"  class="danxuan" />支付宝支付--></h4> 
  	</div>
  	</div>
	<input type="hidden" name="order_money" value="<?php echo ($a['order_money']); ?>"/>
	<input type="hidden" name="buyer_status" value="<?php echo ($a['buyer_status']); ?>"/>
	<input type="hidden" name="order_id" value="<?php echo ($a['order_id']); ?>"/>
	<input type="hidden" name="gname" value="<?php echo ($b['gname']); ?>"/>
	<input type="hidden" name="pname" value="<?php echo ($b['pname']); ?>"/>
	<!--<input  type="submit" class="an" value="确认"/>-->
  </form>



  <form action="/wxpay/example/jsapi.php" method="post">
  	<div class="ddk">
  	<div class="dd1">
  	<h4><input  type="button" class="zfann2" id="submit"  value="微信支付"/><!--<input name="weixin" type="radio"  class="danxuan"/>微信支付--> </h4>
  	</div>
  	</div>
	<input type="hidden" name="order_money" id='wx' value="<?php echo ($a['order_money']); ?>"/>
	<input type="hidden" name="buyer_status" value="<?php echo ($a['buyer_status']); ?>"/>
	<input type="hidden" name="order_id" id='order_id' value="<?php echo ($a['order_id']); ?>"/>
	<!--<input  type="submit" class="an" value="确认"/>-->
  </form>
<script>
 	$("#submit").on('click',function(){
		var yuan=$('#wx').val();
		var id=$('#order_id').val();
        top.location.href = '/wxpay/example/jsapi.php?pay='+yuan+'&id='+id;
    })
</script>

</body>
</html>