<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>客服列表</title>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform">
					<form action="/admin.php/Home/Kf/index">
						<div class="cfD">
							
						</div>
					</form>
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0" width="100%">
						<tr>
							<td class="tdColor tdC">序号</td>
							<td class="tdColor">电话</td>
							<td class="tdColor">邮箱</td>
							<td class="tdColor">微信</td>
							<td class="tdColor">QQ</td>
							
							<td class="tdColor">操作&nbsp;&nbsp;&nbsp;
							
							</td>
						</tr>
						
						
						<tr height="40px">
							<td><?php echo ($id); ?></td>
							<td><?php echo ($phone); ?></td>
							<td><?php echo ($email); ?></td>
							<td><?php echo ($wx); ?></td>
							
							<td><?php echo ($qq); ?></td>
							
							<td>
								<a href="<?php echo U('Home/Kf/save',array('id'=>$id));?>" >修改</a>
								
							</td>
						</tr>
						
						
					</table>
					<div class="pagelist"><?php echo ($show); ?></div>
				</div>
				<!-- user 表格 显示 end-->
			</div>
			<!-- user页面样式end -->
		</div>
	</div>
	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="/Public/img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
	var del = $(this).attr('value');
	$('.yes').attr('href','/admin.php/Home/Kf/delete/gid/'+del);
    $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
</script>
</html>