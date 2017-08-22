<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/swiper.min.css">
<link rel="stylesheet" href="/Public/css/sc.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/Public/js/swiper.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".sctop ul li").click(function(){
		$(this).addClass("hover").siblings().removeClass("hover")
		var index = $(this).index();
		$(".spp .sp1:eq("+ index +")").css("height","auto").siblings().css("height","0px");
	})
	$(".sctop ul li:eq(1)").click(function(){
		$(".sctop img").css("height","5.5vw")
	})
	$(".pj ul div").click(function(){
		$(".sctop ul li:eq(2)").addClass("hover").siblings().removeClass("hover")
		$(".spp .sp1:eq(2)").css("height","auto").siblings().css("height","0px");
	})
	$(".sp22 div").click(function(){
		$(".sctop ul li:eq(1)").addClass("hover").siblings().removeClass("hover")
		$(".spp .sp1:eq(1)").css("height","auto").siblings().css("height","0px");
	})
	
	
	/*$(window).scroll(function(){
		var zh= $(document).height()*0.95  //是获取整个页面的高度
		var sh= $(window).height()  //是获取当前也就是浏览器所能看到的页面的那部分的高度。
		var gh= $(document).scrollTop()//滚动条距离顶部的高度
		
    	if(sh+gh>=zh){
        	if($('.sctop ul li:eq(0)').is('.hover')){
			setTimeout(function () { 
				$(".sctop ul li:eq(1)").addClass("hover").siblings().removeClass("hover");
				$(".spp .sp1:eq(1)").css("height","auto").siblings().css("height","0px"); 
				$(window).scrollTop(0);
			},1000);
		
    	}
		}else{false}
	})*/
	
})
</script>
</head>
<body>
<div class="top sctop" style=" margin-bottom:0;" id="top">
<div class="dingdan"><a href="<?php echo U('Qt/Goods/dd');?>"><img src="/Public/img/dd.png">订单</a></div>
<a href="<?php echo U('Qt/Goods/sc');?>"><img src="/Public/img/jiantou.png" /></a>
<ul>
<li class="hover">商品</li><li>详情</li><li>评价</li>
</ul>
</div>
<div class="spp">
  <div class="sp1 hover">
    <div class="swiper-container">
      <div class="swiper-wrapper">
      <?php if(is_array($acc)): $i = 0; $__LIST__ = $acc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><img src="/Public/<?php echo ($v['photo']); ?>" width="100%"/></div><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
  <script type="text/javascript">
  var mySwiper = new Swiper('.swiper-container',{
    loop: true,
	autoplay: 3000,
  });
</script>
    </div>
   
    <div class="cpwz">
    
      <a href="<?php echo U('Qt/Goods/dd_xx',array('gid'=>$gid));?>"><input type="submit"  value="购买商品" /></a><h1><?php echo ($gname); ?></h1>
      <h2>￥<?php echo ($much); ?></h2>
      <p>原价：<span>￥<?php echo ($gmuch); ?></span></p>
      <ul>
        <li><?php echo ($location); ?></li>
        <li>快递：￥<?php echo ($kmuch); ?>起</li>
        <li>月销量：<?php echo ($xl); ?> </li>
       
      </ul>
    </div>
  
   </form>
    <div class="sp22">
   <div><a href="#top">商品详情</a></div>
  </div>
    <div class="pj">
      <h1>商品评价</h1>
      <ul>
      <?php if(is_array($app)): $i = 0; $__LIST__ = $app;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
         <?php if($v['goods_pj'] == '' ): else: ?>
         <h2><?php echo ($v['buyer_name']); ?></h2>
          <p><?php echo ($v['goods_pj']); ?></p><?php endif; ?>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <div><a href="#top">查看全部评价</a></div>
      </ul>
    </div>
  </div>
  <div class="sp1">
 
  <div><?php echo ($minute); ?></div>
  
   
    
  </div>
  <div class="sp1">
    <div class="pj">
      <h1>商品评价</h1>
      <ul>
      <?php if(is_array($att)): $i = 0; $__LIST__ = $att;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
           <?php if($v['goods_pj'] == '' ): else: ?>
         <h2><?php echo ($v['buyer_name']); ?></h2>
          <p><?php echo ($v['goods_pj']); ?></p><?php endif; ?>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
</div>
<div class="dcf"></div>
</body>
</html>