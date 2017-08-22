<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品详情页</title>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
		</div>
		<div class="page">
			<div class="userS showList">
				<h1>商品信息</h1>
				<a href="javascript:history.go(-1);">返回</a>
				<div class="show clearfix">
					<div class="img_list" >
						
						
					</div>
					<div class='userShow' >
						<h1></h1>
						<table boder='0' >
							<tr>
								<td><span class="bl">商品名称：</span></span><?php echo ($arr["gname"]); ?></td>
								<td><span class="bl">现价格：</span></span><?php echo ($arr["much"]); ?>元</td>
							</tr>
							<tr>
								<td><span class="bl">原价格：<?php echo ($arr["gmuch"]); ?>元</span>
								<td><span class="bl">发布日期：</span><?php echo (date('Y-m-d',$arr["time"])); ?></td>
								
							</tr>
							<tr>
								<td><span class="bl">销量：</span><?php echo ($arr["xl"]); ?>件</td>
								<td><span class="bl">库存：</span><?php echo ($arr["nowamout"]); ?>件</td>
							</tr>
							<tr>
								<td><span class="bl">快递费：</span><?php echo ($arr["kmuch"]); ?>元</td>
								<td><span class="bl">快递：<?php echo ($arr["kd"]); ?></span></td>
																
							</tr>
							
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>