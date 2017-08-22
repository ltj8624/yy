<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/mc.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
</head>
<body>
<div class="top">
  <!--<div class="biaoqian2"></div>
  <h1><span>第一期</span></h1>-->
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧场-视频列表
</div>
<div class="mck2">
  <ul>
  <?php if(is_array($ys)): foreach($ys as $key=>$v): ?><li><a href="<?php echo U('Qt/Video/mc_xx',array('id'=>$v['id']));?>"><img src="/Public/<?php echo ($v['photo']); ?>" /><h1><?php echo ($v['vname']); ?></h1></a></li><?php endforeach; endif; ?>
   
  </ul>
</div>
</body>
</html>