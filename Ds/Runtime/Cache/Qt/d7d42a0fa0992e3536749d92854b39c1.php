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
  <div class="dingdan"><a href="<?php echo U('Qt/Goods/goumai_ddlb');?>"><img src="/Public/img/dd.png">订单</a></div><a href="javascript:history.go(-1);"><!--<a href="<?php echo U('Qt/Product/goumai');?>">--><img src="/Public/img/jiantou.png" /></a>购买新羊
</div>
<div class="gmxx">
<h1>预计年化收益率</h1>
<h2><?php echo ($income); ?></h2>
<h3>单价：<span><?php echo ($pmuch); ?></span>元</h3><h3>养殖周期：<span><?php echo ($cycle); ?></span></h3>
<div class="jindu">
  <div class="jdt" style="width:<?php echo ($ww); ?>%;"></div>
</div>
<h5>共计：<?php echo ($pamout); ?>只</h5>
<h6>进度：<span><?php echo ($ww); ?>%</span></h6>
<h4 class="daojishi">剩余时间：<?php echo ($dao); ?>天</h4>
</div>
<div class="gmxx2">
<p>产品规模：<?php echo ($uu); ?>元</p>
<p>约定到期时间：入栏后<?php echo ($cycle); ?></p>
<p>预计收益率：年收益率<?php echo ($income); ?></p>
<p>分红方式：<?php echo ($fhfs); ?> </p>
<p>牧场介绍：<?php echo ($mcjs); ?> </p>
</div>
<div class="gmxx3">
<p><a href="<?php echo U('Qt/News/cpht');?>">产品合同</a></p>
<p><a href="<?php echo U('Qt/News/cpbx');?>">产品保险</a></p>
<p><a href="#">抢购排名</a></p>
</div>
<div class="baoxian"><img src="/Public/img/dun.png" />投资有风险 请谨慎决策</div>
<input type="button" value="购买新羊" class="an1"  style=" margin-bottom:18vw" onclick="location='goumai_dd.html'"/>
</body>
</html>