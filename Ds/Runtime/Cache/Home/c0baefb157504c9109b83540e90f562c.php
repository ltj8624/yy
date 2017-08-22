<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员详情页</title>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			
		</div>
		<div class="page">
			<div class="userS showList">
				<h1>会员信息</h1>
				<a href="javascript:history.go(-1);">返回</a>
				<div class="show clearfix">
					<div class="img_list" >
						
						
					</div>
					<div class='userShow' >
						<h1><?php echo ($name); ?></h1>
						<table boder='0' >
							<tr>
								<td><span class="bl">电话号：</span></span><?php echo ($mobile); ?></td>
								<td><span class="bl">昵称：</span><?php echo ($nickname); ?></td>
							</tr>
							
							<tr>
								<td><span class="bl">邮箱：</span><?php echo ($email); ?></td>
								<td><span class="bl">身份证号：</span><?php echo ($idnumber); ?></td>
							</tr>
							<tr>
								
								<td><span class="bl">余额：</span><?php echo ($money); ?></td>
								<td><span class="bl">地址：</span><?php echo ($adds); ?></td>
								
									
							</tr>
                            <tr>
								
								<td><span class="bl">身份证照片：</span><img  width=200 height="120" src="/Public/<?php echo ($idphoto); ?>" /></td>
								
									
							</tr>
							
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>