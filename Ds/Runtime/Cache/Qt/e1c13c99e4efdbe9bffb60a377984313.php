<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/mr.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".box4 li").click(function(){
		$(this).addClass("hover").next(".wtxx").addClass("hover").siblings(".wtxx").removeClass("hover")
		$(this).siblings("li").removeClass("hover")
	})
})
</script>
</head>
<body>
<div class="top">
  <!--<div class="biaoqian2"></div>
  <h1><span>第一期</span></h1>-->
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心-修改支付密码
</div>
<div class="zc huibg">
  <ul>
  <form action="/index.php/Qt/User/xgmm2" method="post">
    <li><span>手机号：</span><input id="mobile" name="mobile" type="text"  class="text"/></li>
    <div class="verification" class="text2">
									<label for="code"><i class="am-icon-code-fork"></i></label>
									<input type="hidden" id="code-hidden" value="<?php echo rand(100000,999999);?>">
									<input class="text2" type="text" id="code" placeholder="" data-equal-to="#code-hidden" required style="width: 23%;height: 10vw; margin-left:15vw;	background-color: rgba(255,255,255,0.1);	border: 1px solid rgba(255,255,255,0.8);	border-radius: 2vw;	box-sizing: border-box;">
									<a class="btn" href="javascript:sendMobileCode();" id="sendMobileCode">
										<span>获取手机验证码</span></a>
								</div>
    <li><span>支付密码：</span><input name="password" type="password"  class="text"/></li>
    <input type="submit" class="zcan" value="提交" /></a>
  </form>
  </ul>
</div>
<script type="text/javascript">

var InterValObj; //timer变量，控制时间
var count = 60; //间隔函数，1秒执行
var curCount;//当前剩余秒数

function sendMobileCode() {
   var code = $('#code-hidden').val();
   var mobile = $('#mobile').val();
   //alert(code);
   var bid = 'sendMobileCode';
　　//设置button效果，开始计时
   $("#"+bid).attr("disabled", "true");
   $("#"+bid).removeAttr('href');   
   curCount = count;
   InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
   $("#"+bid).html('<span>' + curCount + '秒</span>');   
　　 //向后台发送处理数据
   $.ajax({
   　　type: "POST", //用POST方式传输
   　　dataType: "json", //数据格式:JSON
   　　url: "<?php echo U('regSms');?>",//目标地址
  　　 data: "mobile=" + mobile + "&code=" + code,
  　　 error: function (XMLHttpRequest, textStatus, errorThrown) { },
   　　success: function (msg){ 
  // if(msg==2){
	   //alert('用户已存在');
	   //}
   }
   });
}	

//timer处理函数
function SetRemainTime() {
	  var code = $('#code-hidden').val();
      var bid = 'sendMobileCode';
      if (curCount == 0) {  
      	window.clearInterval(InterValObj);//停止计时器
        $("#"+bid).attr("disabled",false); //启用按钮 
        $("#"+bid).attr("href","javascript:sendMobileCode();");    
        $("#"+bid).html('<span>重新发送</span>');
      }
      else {
	 　    curCount--;
	       $("#"+bid).html('<span>' + curCount + '秒</span>');        
      }
}
</script>
</body>
</html>