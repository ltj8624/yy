<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/yl.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
</head>
<body>
<div class="top">
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心
</div>
<div class="ylk">
<div class="ri"></div>
<img src="/Public/img/yanglan/yun1.png" class="yun1" />
<img src="/Public/img/yanglan/yun2.png" class="yun2" />
<img src="/Public/img/yanglan/shan.png" class="shan" />
<img src="/Public/img/yanglan/di.png" class="di" />
<!--风车-->
<div class="fengche">
<img src="/Public/img/fengche1.png" class="fengche1" />
<img src="/Public/img/fengche2.png" class="fengche2" />
</div>
<!--树-->
<img src="/Public/img/shu.png" class="shu1" />
<img src="/Public/img/shu.png" class="shu2" />
<img src="/Public/img/shu.png" class="shu3" />
<img src="/Public/img/shu.png" class="shu4" />
<img src="/Public/img/shu.png" class="shu5" />
<!--草-->
<img src="/Public/img/yanglan/cao1.png" class="cao1" />
<img src="/Public/img/yanglan/cao2.png" class="cao2" />
<img src="/Public/img/yanglan/cao3.png" class="cao3" />
<!--羊-->
<div class="yang11">
	<div class="yang2">
		<img src="/Public/img/yang.png" width="100%"/>
		<div class="zu1"></div>
		<div class="zu2"></div>
		<div class="zu3"></div>
		<div class="zu4"></div>
	</div>
</div>
<div class="yang12">
	<div class="yang2">
		<img src="/Public/img/yang.png" width="100%"/>
		<div class="zu1"></div>
		<div class="zu2"></div>
		<div class="zu3"></div>
		<div class="zu4"></div>
	</div>
</div>
<div class="yang13">
	<div class="yang2">
		<img src="/Public/img/yang.png" width="100%"/>
		<div class="zu1"></div>
		<div class="zu2"></div>
		<div class="zu3"></div>
		<div class="zu4"></div>
	</div>
</div>
</div>
<div class="box">
  <div class="yangjuan">
  <div><a href="<?php echo U('Qt/Product/goumai');?>">购买羊只</a></div>
  
  <div>羊栏：<strong><?php echo ($count); ?></strong>只羊<img src="/Public/img/yang2.png" class="b" /></div>
  <div>预计收益：<strong><?php echo ($zz); ?></strong>元</div>
  </div>
  <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="yzlb"><?php echo ($v['pname']); echo ($v['number']); ?>只：<?php echo (date('Y-m-d',$v['create_time'] )); ?>至<?php echo (date('Y-m-d',$v['jtime'] )); ?>，共<?php echo ($v['cycle']); ?>，收益为<?php echo ($v['pmoney']); ?>元/1年。</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</body>
</html>