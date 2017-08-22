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
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心-资料
</div>
<div class="box3" >

<?php if($sfrz == 2): ?><ul>
	<h2>基本资料</h2><!--<li>头像</li>-->
    <h3 style=" padding-top:2vw; padding-left:2vw;color:rgba(255,0,0,1); font-weight:normal;">已通过认证</h3>
    <li>姓名：<?php echo ($name); ?></li>
    <li>身份证号：<?php echo ($idnumber); ?></li>
    <!--<li>照片：<img src="/Public/<?php echo ($icphoto); ?>" /></li>--> 
</ul>  
<?php elseif($sfrz == 1): ?>
  <ul>  
    <h2>基本资料</h2><!--<li>头像</li>-->
    <h3 style=" padding-top:2vw; padding-left:2vw;color:rgba(255,0,0,1); font-weight:normal;">审核正在处理中</h3>
    <li>姓名：<?php echo ($name); ?></li>
    <li>身份证号：<?php echo ($idnumber); ?></li>
    <!--<li>照片：<img src="/Public/<?php echo ($icphoto); ?>" width="97%"  /></li>-->
   
  </ul>
 <?php else: ?>
 <ul>  
    <h2>基本资料</h2><!--<li>头像</li>-->
    <h3 style=" padding-top:2vw; padding-left:2vw;color:rgba(255,0,0,1); font-weight:normal;"></h3>
    <form method="post" action="/index.php/Qt/User/sfrz" enctype="multipart/form-data">
    <li>姓名：<input type="text" name="name" value='' /></li>
    <li>身份证号：<input type="text" name="idnumber" value='' /></li>
    <!--<li>照片：<input type="file" name="icphoto"/ ><img src="/Public/img/sfz.jpg" width="97%"  style="display:none;" /></li>
    <p style="margin-bottom:2vw;">请上传真实有效的本人手持身份证正面清晰照片，如下图所示。</p>-->
<!--<img src="/Public/img/sfz.jpg" width="100%"  />-->
  </ul>
  <input type="submit" class="an" value="提交认证"  />
 </form><?php endif; ?>
</div>
</body>
</html>