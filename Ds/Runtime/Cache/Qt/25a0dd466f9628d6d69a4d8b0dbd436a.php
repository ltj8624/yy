<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<script type="text/javascript" src="/Public/js/jquery.js"></script>
<script type="text/javascript" src="/Public/js/jquery.zclip.js"></script>
<link rel="stylesheet" href="/Public/css/mr.css" type="text/css" />
<link rel="stylesheet" href="css/mr.css" type="text/css" />
</head>
<body>
<div class="top" style=" position:absolute; top:0px; left:0px; background-color:rgba(255,255,255,0.5); z-index:999;">
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心-推广
</div>
<div class="box5" style="padding:0px; margin:0px; height:100vh;">
<div class="yongjin" onclick="location='<?php echo U('Qt/Tg/tger');?>'"></div>
<div class="fenxiang"  onclick="location='<?php echo U('Qt/Login/zc');?>?scode=<?php echo ($scode); ?>'"></div>
<a class="currentpath"></a>
<script type="text/javascript">
$(document).ready(function(){
	var url = window.location.href
	$(".currentpath").zclip({
		path: "/Public/js/ZeroClipboard.swf",
		copy: function(){
		return url;
		},
		afterCopy:function(){/* 复制成功后的操作 */
			alert("复制成功，请将网址发送给好友。")
        }
	});
});
</script>
<img src="/Public/img/tg2.jpg" width="100%" height="100%" border="0" alt="我的佣金"/>
</div>
</body>
</html>