<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/sc.css" type="text/css" />
<link rel="stylesheet" href="/Public/css/sc.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
</head>
<body style="background-color:rgba(204,204,204,0.05)">
<div class="top"><a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>商品-订单列表</div>
<div class="ddk">
  <ul>
  <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v['pid'] == 0 ): ?><form action="/index.php/Qt/Goods/ggdd" method="post">
  
    <?php if($v['del'] == 1): ?><li><h2><!--<span><?php echo (date('Y-m-d H:i:s',$v['create_time' ])); ?></span>-->订单号：<?php echo ($v['order_sn']); ?> </h2>
    
    <div><a href="<?php echo U('Qt/Goods/sc_xx',array('gid'=>$v['gid']));?>"><img src="/Public/<?php echo ($v['photo']); ?>"><h1><?php echo ($v['gname']); ?></h1></a></div>
    <p>共<?php echo ($v['number']); ?>件，总价：<span>￥<?php echo ($v['order_money']); ?>元<input type="hidden" name="money" value="<?php echo ($v['money']); ?>"/></span></p></li>
  <?php else: endif; ?>
 <input type="hidden" name='order_id' value="<?php echo ($v['order_id']); ?>" />
 
        <?php if($v['buyer_status'] == 0): ?><input type="submit" value="余额支付" />
         <!--<a href="<?php echo U('Qt/Goods/zhifufangshi');?>" class='an1'>其他支付方式</a>-->
            <?php else: ?>
            <?php if(empty($v['goods_pj'])): ?><p><a href="<?php echo U('Qt/Goods/pj',array('order_id'=>$v['order_id']));?>"  class="rrr">评价</a><span>已付款</span></p>
            <?php else: ?>
            <p><span class="rrr">已评价</span><span>已付款</span></p><?php endif; endif; ?>
          
   </form>
   
   <form action="/index.php/Qt/Goods/zhifufangshi?order_id=<?php echo ($v['order_id']); ?>" method="post" class="zhifu2an">
   <input type="hidden" name="order_money" value="<?php echo ($a['order_money']); ?>"/>
   <input type="hidden" name="buyer_status" value="<?php echo ($a['buyer_status']); ?>"/>
   <input type="hidden" name="order_id" value="<?php echo ($a['order_id']); ?>"/>
   <input type="hidden" name="gname" value="<?php echo ($b['gname']); ?>"/>
	<input type="hidden" name="pname" value="<?php echo ($b['pname']); ?>"/>
   <?php if($v['buyer_status'] == 0): ?><input type="submit" value="其他支付方式"  style="margin-bottom:2.5vw;" />
   	 <?php else: ?>
            <?php if(empty($v['goods_pj'])): ?><span>&nbsp;</span><a href="<?php echo U('Qt/Goods/pj',array('order_id'=>$v['order_id']));?>">&nbsp;</a>
            <?php else: ?>
            <span>&nbsp;</span>
            <span>&nbsp;</span><?php endif; endif; ?>
  		 
  
   </form>
   <?php else: endif; endforeach; endif; else: echo "" ;endif; ?> 
  </ul>
</div>
</body>
</html>