<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Public/img/webwxgetmsgimg.jpg">
<title>盈羊联盟后台管理首页</title>
</head>
<frameset rows="100,*" cols="*" scrolling="No" framespacing="0" frameborder="no" border="0"> 
	<!-- 引用头部 -->
	<frame src="<?php echo U('Home/Public/head');?>" name="headmenu" id="mainFrame" title="mainFrame">
	<!-- 引用左边和主体部分 --> 
	<frameset rows="100*" cols="220,*" scrolling="No" framespacing="0" frameborder="no" border="0"> 
		<frame src="<?php echo U('Home/Public/left');?>" name="leftmenu" id="mainFrame" title="mainFrame">
		<frame src="<?php echo U('Home/Public/main');?>" name="main" scrolling="yes" noresize="noresize" id="rightFrame" title="rightFrame">
	</frameset>
</frameset>
</html>