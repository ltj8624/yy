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
<body>

<div class="top">
  <a href="<?php echo U('Qt/Product/goumai');?>"><img src="/Public/img/jiantou.png" /></a>购买新羊
</div>
<form action="/index.php/Qt/Product/dd" method="post">
<h1 class="ddbt">产品名称：<?php echo ($pname); ?></h1>
<div class="gmxx2">

<p>单价：<?php echo ($pmuch); ?></p>
<p>数量：<input type="number" name="number" class="num" min="1" value="1" />只</p>
<p>预计收益率：年收益率<?php echo ($income); ?></p>
<p>养殖周期：<?php echo ($cycle); ?></p>
</div>
<h2 class="ddzj">共计：<?php echo ($pmuch); ?>元</h2>
	<input type="hidden" class="woo" name="pmuch" value="<?php echo ($pmuch); ?>">
	<input type="hidden" value="<?php echo ($pid); ?>" name="pid"/>
	<div class="baoxian" style=" margin-top:5vw; margin-bottom:2.5vw;"><input name="ty" class="ty" id='oopp'  type="checkbox" value="1" /><span>同意</span><a href="<?php echo U('Qt/News/cpht');?>">《云联金阳牧场运营协议》</a></div>
<input type="buttom" id='uiui' value="提交订单" class="an1 pp"   style=" margin-bottom:18vw;display:block; text-align:center;"/>
<input type="submit" id='iuiu' value="提交订单" class="an1 pp"   style=" margin-bottom:18vw;display:none; text-align:center;"/>
</form>
<script>
	$('.num').click(function(){
		var woo = $('.woo').val();
		var num = $('.num').val();
		$.post('/index.php/Qt/Product/ajax',{'woo':woo,'num':num}, function(t) {
			if (t == 1) {
				var qian = woo*num;
				$('.ddzj').html('共计：'+qian+'元');
			}
		});
	})
	$('#oopp').click(function(){
		if($(this).attr('checked')){
				$('#iuiu').css('display','block')
				$('#uiui').css('display','none')
			
			}else{
				
				$('#iuiu').css('display','none')
				$('#uiui').css('display','block')
				}
			
			
	})
				
	$('#uiui').click(function(){
		alert('请仔细阅读，并同意《云联金阳牧场运营协议》');
		})
</script>
</body>
</html>