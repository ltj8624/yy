<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/slick.css" type="text/css"/>
<link rel="stylesheet" href="/Public/css/sc.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/Public/js/slick.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.single-item').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1
    });
	$(".fl li").click(function(){
		$(this).addClass("hover").siblings().removeClass("hover")
		var index = $(this).index();
		$(".box ul:eq("+ index +")").show().siblings().hide()
	})
})
</script>
</head>
<body>
<div class="top"><div class="dingdan"><a href="<?php echo U('Qt/Goods/dd');?>"><img src="/Public/img/dd.png">订单</a></div>　　　商城</div>
<div class="slider single-item">
	<?php if(is_array($acc)): $i = 0; $__LIST__ = $acc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div><img src="/Public/<?php echo ($v['photo']); ?>"></div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<?php if(is_array($abb)): $i = 0; $__LIST__ = $abb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v['access']); ?>"><img src="/Public/<?php echo ($v['photo']); ?>" class="gg1"></a><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="fl">
  <ul>
    <li class="hover">综合<span>></span></li>
    <li>销量<span>></span></li>
    <li>价格<span>></span></li>
</ul>
</div>

<div class="box">
 <!-- <ul class="hover">-->
  <ul  style="display:block;">
    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Qt/Goods/sc_xx',array('gid'=>$v['gid']));?>"><img src="/Public/<?php echo ($v['photo']); ?>"><h1><?php echo ($v['gname']); ?></h1><p><span>月销<?php echo ($v['xl']); ?>笔</span>￥<?php echo ($v['much']); ?></>元</p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
  <ul style="display:none;">
    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Qt/Goods/sc_xx',array('gid'=>$v['gid']));?>"><img src="/Public/<?php echo ($v['photo']); ?>"><h1><?php echo ($v['gname']); ?></h1><p><span>月销<?php echo ($v['xl']); ?>笔</span>￥<?php echo ($v['much']); ?></>元</p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
  <ul style="display:none;">
    <?php if(is_array($agg)): $i = 0; $__LIST__ = $agg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Qt/Goods/sc_xx',array('gid'=>$v['gid']));?>"><img src="/Public/<?php echo ($v['photo']); ?>"><h1><?php echo ($v['gname']); ?></h1><p><span>月销<?php echo ($v['xl']); ?>笔</span>￥<?php echo ($v['much']); ?></>元</p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</div>
</body>
</html>