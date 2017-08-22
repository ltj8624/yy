<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品修改列表</title>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
</head>
<style>
	.pages a,.pages span {
	    display:inline-block;
	    padding:2px 5px;
	    margin:0 1px;
	    border:1px solid #f0f0f0;
	    -webkit-border-radius:3px;
	    -moz-border-radius:3px;
	    border-radius:3px;
	}
	.pages a,.pages li {
	    display:inline-block;
	    list-style: none;
	    text-decoration:none; color:#58A0D3;
	}
	.pages a.first,.pages a.prev,.pages a.next,.pages a.end{
	    margin:0;
	}
	.pages a:hover{
	    border-color:#50A8E6;
	}
	.pages span.current{
	    background:#50A8E6;
	    color:#FFF;
	    font-weight:700;
	    border-color:#50A8E6;
	}
</style>
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
			<!-- user页面样式 -->
			<div class="connoisseur">
				
				<!-- user 表格 显示 -->
				<div class="conShow">
					<form action="/admin.php/Home/Product/save" method="post" enctype="multipart/form-data">
    					<input type="hidden" name="pid" value="<?php echo ($pid); ?>"/>
						<table border="1" class="xianwei" width="100%">
						<tr>
							<td class="tdColor">产品名称</td>
						</tr>
						<tr height="40px">
				
							<td><input type="text" name="pname" value="<?php echo ($pname); ?>" /></td>
						</tr>
                      
						<tr>
							<td class="tdColor">产品价格</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="pmuch" value="<?php echo ($pmuch); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">产品数量</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="pamout" value="<?php echo ($pamout); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">产品期数</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="pnumber" value="<?php echo ($pnumber); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">牧场介绍</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="mcjs" value="<?php echo ($mcjs); ?>" /></td>
						</tr>
						
						<tr>
							<td class="tdColor">分红方式</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="fhfs" value="<?php echo ($fhfs); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">年化收益</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="income" value="<?php echo ($income); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">分红周期</td>
						</tr>
						<tr height="40px">
							<td><input type="text" disabled="disabled" value="<?php echo ($ztime); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">养殖周期</td>
						</tr>
						
						<tr height="40px">
						 <?php if($cycles == 1): ?><td><input type="text" disabled="disabled"  value="<?php echo ($cycle); ?>" />月</td>
							 <?php else: ?>
							<td><input type="text" disabled="disabled"  value="<?php echo ($cycle); ?>" />天</td><?php endif; ?>
						</tr>
						
						 
					</table>
					<tr>
				        	<td colspan="2" align="center">
				            	<input type="submit" value="提交" />
				                <input type="reset" value="重置" />
				            </td>
				        </tr>
					</form>
					
					<div class="pages" style="float:right; padding-top:10px;">
                       
	                </div>
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
$(".delban").click(function(){
	var del = $(this).attr('value');
	$('.yes').attr('href','/admin.php/Home/Product/tokendel/id/'+del);
	$(".banDel").show();
});
// 广告弹出框
$(".delban").click(function(){
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