<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品详情页</title>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			
		</div>
		<div class="page">
			<div class="userS showList">
				<h1>产品信息</h1>
				<a href="javascript:history.go(-1);">返回</a>
				<div class="show clearfix">
					<div class="img_list" >
						
						
					</div>
					<div class='userShow' >
						<h1><?php echo ($arr["pname"]); ?></h1>
						<table boder='0' >
							<tr>
								<td><span class="bl">价格：</span></span><?php echo ($arr["pmuch"]); ?></td>
								
							</tr>
							<tr>
								<td><span class="bl">发布日期：</span><?php echo (date('Y-m-d',$arr["createtime"])); ?></td>
								<td><span class="bl">下架剩余时间：<?php echo ($arr["nowtime"]); ?>天</span>
							</tr>
							<tr>
								<td><span class="bl">年化收益：</span><?php echo ($arr["income"]); ?></td>
								<td><span class="bl">养殖周期：</span><?php echo ($arr["cycle"]); ?>天</td>
							</tr>
							<tr>
								<td><span class="bl">产品期数：</span><?php echo ($arr["pnumber"]); ?></td>
								<td><span class="bl">产品数量：</span><?php echo ($arr["pamout"]); ?></td>
								<td><span class="bl">分红周期：</span><?php echo ($arr["ztime"]); ?>天</td>
								
									
							</tr>
							
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>