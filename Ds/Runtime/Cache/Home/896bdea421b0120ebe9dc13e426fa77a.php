<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员列表</title>
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
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0" width="100%">
						<tr>
							<td class="tdColor tdC">序号</td>
							<td class="tdColor">会员姓名</td>
							<td class="tdColor">银行卡</td>
							<td class="tdColor">金额</td>
							<td class="tdColor">时间</td>
							<td class="tdColor">审核是否通过</td>
							
						</tr>
						<?php if(empty($arr)): ?><tr height="40px">
							<td style="font-size:16px;" colspan="4">没有符合条件的数据。。。</td>
						</tr>
						<?php else: ?>
						<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr height="40px" id="ww_<?php echo ($v['id']); ?>">
							<td><?php echo ($v['id']); ?></td>
							<td><?php echo ($v['name']); ?></td>
							<td><?php echo ($v['bank']); ?></td>
							<td><?php echo ($v['money']); ?></td>
							<td><?php echo (date('Y-m-d h-i-s',$v['time'] )); ?></td>
							<td class="aa_<?php echo ($v['id']); ?>">
							<?php if($v['number'] == 0): ?><a class='sh' money="<?php echo ($v['money']); ?>" idv="<?php echo ($v['vid']); ?>" ids="<?php echo ($v['id']); ?>">确认审核</a>								
								<a class='qx' idv="<?php echo ($v['vid']); ?>" ids="<?php echo ($v['id']); ?>">未通过审核</a>
								<?php elseif($v['number'] == 1): ?>
								<span>提现成功</span> 
								<?php else: ?>
								<span>提现失败</span><?php endif; ?>
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
	$('.yes').attr('href','/admin.php/Home/VipRecord/delete/vid/'+del);
    $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
$(".sh").click(function(){
	if(confirm('确认审核通过')){
		var ids=$(this).attr('ids');
		var idv=$(this).attr('idv');
		var money=$(this).attr('money');
		$.post('/admin.php/Home/VipRecord/ss',{'id':ids,'act':'qr','idv':idv,'money':money},function(t){
			if(t==1){
				$('.aa_'+ids).html('审核通过');
				
			}
		})
	}
});
$(".qx").click(function(){
	if(confirm('审核未通过')){
		var idv=$(this).attr('idv');
		var ids=$(this).attr('ids');
		$.post('/admin.php/Home/VipRecord/ss',{'id':ids,'act':'qx','idv':idv},function(t){
			if(t==1){
				$('.aa_'+ids).html('审核未通过');
				
			}
		})
	}
});
</script>
</html>