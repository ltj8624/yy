<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品列表</title>
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
					<form action="/admin.php/Home/Goods/index">
						<div class="cfD">
							<input class="userinput" name="name" type="text" placeholder="输入商品名称" />&nbsp;&nbsp;&nbsp;
							<button class="userbtn">搜索</button>
						</div>
					</form>
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0" width="100%">
						<tr>
							<td class="tdColor tdC">序号</td>
							<td class="tdColor">商品名称</td>
							<td class="tdColor">商品原价</td>
							<td class="tdColor">商品售价</td>
							<td class="tdColor">商品首页图片</td>
							<td class="tdColor">销量</td>
							
							<td class="tdColor">时间</td>
							<td class="tdColor">操作&nbsp;&nbsp;&nbsp;
							<a href="/admin.php/Home/Goods/add">添加</a>
							</td>
						</tr>
						<?php if(empty($arr)): ?><tr height="40px">
							<td style="font-size:16px;" colspan="4">没有符合条件的数据。。。</td>
						</tr>
						<?php else: ?>
						<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr height="40px">
							<td><?php echo ($v['gid']); ?></td>
							<td><?php echo ($v['gname']); ?></td>
							<td><?php echo ($v['gmuch']); ?></td>
							<td><?php echo ($v['much']); ?></td>
							<td><img style="width:150px;height:75px;" src="/Public/<?php echo ($v['photo']); ?>" alt="" /></td>
							<td><?php echo ($v['xl']); ?></td>
							
							<td><?php echo (date('Y-m-d H:i:s',$v['time'] )); ?></td>
							<td>
								<a href="<?php echo U('Home/Goods/save',array('gid'=>$v['gid']));?>" >修改</a>
								<a href="<?php echo U('Home/Goods/details',array('gid'=>$v['gid']));?>" >查看</a>
								<a href="<?php echo U('Home/Goods/style',array('gid'=>$v['gid']));?>">商品图片</a>&nbsp;
								<a class="delban" style="cursor:pointer;" value="<?php echo ($v["gid"]); ?>">删除</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
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
	$('.yes').attr('href','/admin.php/Home/Goods/delete/gid/'+del);
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