<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/sc.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
</script>
</head>
<body>

<div class="top">
  <!--<div class="biaoqian2"></div>
  <h1><span>第一期</span></h1>-->
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心-客服
</div>
<div class="pjk">
  <div class="a4"><h3>商品评价</h3>
  <form action='/index.php/Qt/Goods/pj' method='post'>
  <input type="hidden" name="order_id" value='<?php echo ($oid); ?>'/>
      <textarea name="goods_pj" placeholder="请填写您对商品的评价"></textarea>
      <input type="submit"  class="an" value="提交评价"/>
  </form>
      </div>
    
    
  </div>
</div>
</body>
</html>