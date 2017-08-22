<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/sc.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
</head>
<body style="background-color:rgba(204,204,204,0.05)">
<div class="top"><a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>产品-订单列表</div>
<div class="ddk">
  <ul>
  <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><form action="/index.php/Qt/Product/ggdd" method="post">
    <li><h2>订单号：</h2>$v['order_sn']
    <?php if($v['del'] == 1): ?>商品名：<?php echo ($v['gname']); ?>
  商品图片：<?php echo ($v['photo']); ?>
  订单总价：<?php echo ($v['money']); ?>
  <?php else: ?>
   产品名：<?php echo ($v['pname']); ?>
   订单总价：<?php echo ($v['pmoney']); endif; ?>
  <input type="hidden" name='order_id' value="<?php echo ($v['order_id']); ?>" />
   <input type="submit" value="确认付款" class="an1" />
   </li>
   </form><?php endforeach; endif; else: echo "" ;endif; ?> 
  </ul>
</div>
</body>
</html>