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
  <a href="<?php echo U('Qt/Mr/mr');?>"><img src="/Public/img/jiantou.png" /></a>牧人中心-资讯
</div>
<div class="box1">
  <ul>
  <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Qt/News/zx_xx',array('id'=>$v['id']));?>">
    <?php if($v['photo'] == '' ): else: ?>
        <img src="/Public/<?php echo ($v['photo']); ?>"/><?php endif; ?>
	    <h2><?php echo ($v['name']); ?></h2>
	    <p><?php echo (mb_substr($v["page"],0,35,'utf-8')); ?>...</p>
	     
	    </a>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</div>
</body>
</html>