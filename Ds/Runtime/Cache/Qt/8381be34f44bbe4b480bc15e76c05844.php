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
	$(".box4 h2 span").click(function(){
		var index=$(this).index()
		$(this).addClass("hover").siblings().removeClass("hover")
		$(".a1:eq(" + index + ")").addClass("hover").siblings().removeClass("hover")
	})
	$(".a4 div span").click(function(){
		$(this).addClass("hover").nextAll().addClass("hover")
		$(this).removeClass("hover").prevAll().removeClass("hover")
	})
})
</script>
</head>
<body>

<div class="top">
  <!--<div class="biaoqian2"></div>
  <h1><span>第一期</span></h1>-->
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心-客服
</div>
<div class="box4">
  <div class="lx"><img src="/Public/img/dh2.png" /><span><?php echo ($phone); ?></span><img src="/Public/img/yj.png" /><span><?php echo ($email); ?></span>
  </div>
  <h2><span class="hover">客服信息</span><span>常见问题</span></h2>
  <div class="a2">
    <div class="a1 hover">
<!--<div class="a3">客服：三号客服（丽丽）</div>-->      
	  <!--<div class="a3">电话：0451-88888888</div>
      <div class="a3">手机：13813888888</div>-->
      <div class="a3">QQ：<?php echo ($qq); ?></div>
      <div class="a3">微信：<?php echo ($wx); ?></div>
      <div class="a4"><h3>意见反馈</h3>
      <div><h4>满意度：</h4>
      <span><img class='xing' ids='1' src="/Public/img/xing.png" /><img class='xing' ids='1' src="/Public/img/xing1.png" /></span>
      <span><img class='xing' ids='2' src="/Public/img/xing.png" /><img class='xing' ids='2' src="/Public/img/xing1.png" /></span>
      <span><img class='xing' ids='3' src="/Public/img/xing.png" /><img class='xing' ids='3' src="/Public/img/xing1.png" /></span>
      <span><img class='xing' ids='4' src="/Public/img/xing.png" /><img class='xing' ids='4' src="/Public/img/xing1.png" /></span>
      <span><img class='xing' ids='5' src="/Public/img/xing.png" /><img class='xing' ids='5' src="/Public/img/xing1.png" /></span>
      </div>
      <form action='/index.php/Qt/Kefu/kefu' method='post'>
      <input name="xing"  class='xx' type="hidden" value="5"  />
      <textarea name="yijian" placeholder="您有什么意见建议，可以在这里留言给我们，我们会悉心采纳您的想法，给您带来更好的体验。"></textarea>
      <input type="submit"  class="an" value="提交意见"/>
      </form>
      </div>
    </div>
    <div class="a1">
    <?php if(is_array($att)): $i = 0; $__LIST__ = $att;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><ul>
        <li><?php echo ($v['wt']); ?></li>
        <div class="wtxx "><?php echo ($v['content']); ?></div>
       
      </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    
  </div>
</div>
<script type="text/javascript">
$('.xing').click(function(){
		var ids=$(this).attr('ids');
		$.post('/index.php/Qt/Kefu/ajax',{'o':1},function(t){
			if(t == 1){
				$('.xx').val(ids);
			}
		})
		
})
</script>
</body>
</html>