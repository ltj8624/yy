<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/mr.css" type="text/css" />

<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
</head>
<body>
<div class="top">
  <!--<div class="biaoqian2"></div>
  <h1><span>第一期</span></h1>-->
  牧人中心
  </div>
<!--<div class="box">-->
<div class="mr2">
<div class="dingbu">
 <?php if($idphoto != '' ): if($openid != '' ): ?><img src="<?php echo ($idphoto); ?>"  />
		<?php else: ?>
		<img src="/Public/<?php echo ($idphoto); ?>"  /><?php endif; ?>
 <?php else: ?>
 <img src="/Public/img/logo3.jpg"  /><?php endif; ?>
<h2>余额：<span><?php echo ($money); ?></>元</span></h2><h1><?php echo ($mobile); ?></h1></div>
  <div class="yangjuan">
  <div><a href="<?php echo U('Qt/Product/goumai');?>">购买羊只</a></div>
  <div><img src="/Public/img/sy1.png" class="a" />羊栏：<strong><?php echo ($count); ?></strong>只羊<img src="/Public/img/yang2.png" class="b" /></div>
  <div><img src="/Public/img/sy2.png" />预计收益：<strong><?php echo ($zz); ?></strong>元</div>
  <div onclick="location='<?php echo U('Qt/Yl/yl');?>'" style=" color:rgba(255,102,0,1)">查看详细</div>
  </div>
  <a href="<?php echo U('Qt/Tg/tg');?>"><img src="/Public/img/tg.jpg" class="tg" /></a>
  <p><a href="<?php echo U('Qt/Information/xx');?>"><img src="/Public/img/xiaoxi.png" /><br />消息</a></p>
  <p><a href="<?php echo U('Qt/Money/qb');?>"><img src="/Public/img/qianbao.png" /><br />钱包</a></p>
  <p><a href="<?php echo U('Qt/Cont/ht');?>"><img src="/Public/img/hetong.png" /><br />合同</a></p>
  <p><a href="<?php echo U('Qt/News/zx');?>"><img src="/Public/img/zixun.png" /><br />资讯</a></p>
  <p><a href="<?php echo U('Qt/Tg/tg');?>?scode=<?php echo ($scode); ?>" target= "_parent"><img src="/Public/img/tuiguang.png" /><br />推广</a></p>
  <p><a href="<?php echo U('Qt/User/zl');?>"><img src="/Public/img/ziliao.png" /><br />资料</a></p>
  <p><a href="<?php echo U('Qt/Kefu/kf');?>"><img src="/Public/img/kefu.png" /><br />客服</a></p>
  <p><a href="<?php echo U('Qt/News/gy');?>"><img src="/Public/img/gy.png" /><br />关于</a></p>
  <p><a href="<?php echo U('Qt/Login/quit');?>"><img src="/Public/img/zhuxiao.png"  style="opacity:0.7;"/><br />注销</a></p>
</div>
<h1 CLASS="banquan">版权所有：云联金阳<br />
©YUN YANG JIN LIAN</h1>
</body>
</html>