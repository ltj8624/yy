<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告位添加</title>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<style>
	.bacen td { height:30px; line-height:30px; }
</style>
</head>
<body>
	
		<div id="pageAll">
		<div class="pageTop">
			
		</div>
		<div class="page ">
		<div class="userS showList">
				<h1>广告位添加</h1>
				<a href="javascript:history.go(-1);">返回</a>
				<div class="show clearfix">
					<div class="img_list" >
						
						
					</div>
			<!-- 修改密码页面样式 -->
			<div class="bacen">
				<form method="post" action="/admin.php/Home/Access/add" enctype="multipart/form-data">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
				    	
				        <tr>
				        	<td width="50%" align="right">链接：</td>
				            <td width="50%" align="left"><input type="text" name="access" class="input3" /></td>
				        </tr>
						 <tr>
				        	<td width="50%" align="right">广告位图片：</td>
				            <td width="50%" align="left"><input type="file" name="photo" /></td>
				        </tr>
					
				        <tr>
				        	<td colspan="2" align="center">
				            	<input type="submit" value="提交" />
				                <input type="reset" value="重置" />
				            </td>
				        </tr>
				    </table>
				</form>
			</div>
			<!-- 修改密码页面样式end -->
		</div>
		<script>
			$("#nm").blur(function(){
				var appid=$(this).val();
				$.post("/admin.php/Home/Access/nickname",{appid:appid},function(t){
					if(t){
						$("#nick").attr("value",t).attr("disabled",true);
					}
				})
			})
		</script>
	</div>
</body>
</html>