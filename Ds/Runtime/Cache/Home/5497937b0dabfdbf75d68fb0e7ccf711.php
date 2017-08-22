<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>问题添加</title>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script charset="utf-8" src="/Public/editer/kindeditor-min.js"></script>
<script charset="utf-8" src="/Public/editer/lang/zh_CN.js"></script>
<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true,
					allowImageUpload : true
				});
			});
</script>
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
				<h1>问题添加</h1>
				<a href="javascript:history.go(-1);">返回</a>
				<div class="show clearfix">
					<div class="img_list" >
						
						
					</div>
			<!-- 修改密码页面样式 -->
			<div class="bacen">
				<form method="post" action="/admin.php/Home/Wt/add" enctype="multipart/form-data">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
				    	<tr>
				        	<td width="50%" align="right">常见问题：</td>
				            <td width="50%" align="left"><input type="text" id="nm" name="wt" class="input3" /></td>
				        </tr>
				       
				         <tr>
				        	<td width="50%" align="right">回答：</td>
				            <td width="50%" align="left">
				            <textarea type="text" name="content"></textarea>
				            </td>
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
				$.post("/admin.php/Home/Wt/nickname",{appid:appid},function(t){
					if(t){
						$("#nick").attr("value",t).attr("disabled",true);
					}
				})
			})
		</script>
	</div>
</body>
</html>