<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员添加</title>
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
				<h1>会员添加</h1>
				<a href="javascript:history.go(-1);">返回</a>
				<div class="show clearfix">
					<div class="img_list" >
						
						
					</div>
			<!-- 修改密码页面样式 -->
			<div class="bacen">
				<form method="post" action="/admin.php/Home/Vip/add" enctype="multipart/form-data">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
				    	<tr>
				        	<td width="50%" align="right">会员账号：</td>
				            <td width="50%" align="left"><input type="text" id="nm" name="mobile" class="input3" /></td>
				        </tr>
				        <tr>
				        	<td width="50%" align="right">会员真实姓名：</td>
				            <td width="50%" align="left"><input type="text" name="name" class="input3" /></td>
				        </tr>
						<tr>
							<td width="50%" align="right">登录密码：</td>
							<td width="50%" align="left"><input type="text" id="nick" name="pwd" class="input3" /></td>
						</tr>
                        <tr>
							<td width="50%" align="right">账户余额：</td>
							<td width="50%" align="left"><input type="text" id="nick" name="pwd" class="input3" /></td>
						</tr>
						
						<tr>
							<td width="50%" align="right">身份证号：</td>
							<td width="50%" align="left"><input type="text" id="nick" name="idnumber" class="input3" /></td>
						</tr>
						<tr>
							<td width="50%" align="right">身份证照片：</td>
							<td width="50%" align="left"><input type="file" id="nick" name="idphoto" class="input3" /></td>
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
				$.post("/admin.php/Home/Vip/nickname",{appid:appid},function(t){
					if(t){
						$("#nick").attr("value",t).attr("disabled",true);
					}
				})
			})
		</script>
	</div>
</body>
</html>