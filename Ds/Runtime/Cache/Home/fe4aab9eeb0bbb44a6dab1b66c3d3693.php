<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			
		</div>
		<div class="page ">
		<div class="userS showList">
				<h1>权限修改</h1>
				<a href="javascript:history.go(-1);">返回</a>
				<div class="show clearfix">
					<div class="img_list" >
						
						
					</div>
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baBody">
				<form action="/admin.php/Home/AuthRule/edit/id/<?php echo ($arr['id']); ?>" enctype="multipart/form-data" method="post">
					<div class="bbD">
						&nbsp;&nbsp;U&nbsp;R&nbsp;L&nbsp;&nbsp;&nbsp;：<input type="text" value="<?php echo ($arr["name"]); ?>" name='rname'  class="input1" />
					</div>
					<div class="bbD">
						权限名称：<input type="text" name='rtitle' value="<?php echo ($arr["title"]); ?>" class="input1" />
					</div>
					
					<div class="bbD">
						<p class="bbDP">
							<input type="submit" value='提交' class="btn_ok btn_yes" />
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
				</form>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>