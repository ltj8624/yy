<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品修改列表</title>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script charset="utf-8" src="/Public/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/Public//kindeditor/lang/zh_CN.js"></script>
<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="minute"]', {
					allowFileManager : true
					
				});
			});
</script>
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
		<div class="page ">
		<div class="userS showList">
				<h1>商品修改</h1>
				<a href="javascript:history.go(-1);">返回</a>
				<div class="show clearfix">
					<div class="img_list" >
						
						
					</div>
			<!-- user页面样式 -->
			<div class="connoisseur">
				
				<!-- user 表格 显示 -->
				<div class="conShow">
					<form action="/admin.php/Home/Goods/save" method="post" enctype="multipart/form-data">
    					<input type="hidden" name="gid" value="<?php echo ($gid); ?>"/>
						<table border="1" class="xianwei" width="100%">
						<tr>
							<td class="tdColor">商品名称</td>
						</tr>
						<tr height="40px">
				
							<td><input type="text" name="name" value="<?php echo ($gname); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">商品价格</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="gmuch" value="<?php echo ($gmuch); ?>" /></td>
						</tr>
                        <tr>
							<td class="tdColor">商品售价</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="much" value="<?php echo ($much); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">商品销量</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="xl" value="<?php echo ($xl); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">商品库存</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="nowamout" value="<?php echo ($nowamout); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">快递方式</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="kd" value="<?php echo ($kd); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">商品简介</td>
						</tr>
						<tr height="40px">
							<td><textarea name="minute" value="" ><?php echo ($minute); ?></textarea>
							</td>
						</tr>
						<tr>
							<td class="tdColor">快递费</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="kmuch" value="<?php echo ($kmuch); ?>" /></td>
						</tr>
                        <tr>
							<td class="tdColor">地址</td>
						</tr>
						<tr height="40px">
							<td><input type="text" name="location" value="<?php echo ($location); ?>" /></td>
						</tr>
						<tr>
							<td class="tdColor">商品主页图片</td>
						</tr>
						<tr height="40px">
							<td><input type="file" name="photo" value="<?php echo ($photo); ?>"/><img style="width:150px;height:75px;" src="/Public/<?php echo ($photo); ?>"></td>
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
	$('.yes').attr('href','/admin.php/Home/Goods/tokendel/id/'+del);
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