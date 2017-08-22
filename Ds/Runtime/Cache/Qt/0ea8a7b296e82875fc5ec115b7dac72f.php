<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/mr.css" type="text/css" />
<link rel="stylesheet" href="css/mr.css" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".szbt h1").click(function(){
		var index = $(this).index()
		$(this).addClass("hover").siblings().removeClass("hover");
		$(".szk div:eq(" + index + ")").addClass("hover").siblings().removeClass("hover");
	})
});
</script>
</head>
<body>
<div class="top">
  <!--<div class="biaoqian2"></div>
  <h1><span>第一期</span></h1>-->
  <a href="javascript:history.go(-1);"><img src="/Public/img/jiantou.png" /></a>牧人中心-钱包
</div>
<div class="box1">
  <div class="yue">
  
  余额：<?php echo ($money); ?>元
  </div>
  <div class="qianbaoanniu"><a href="<?php echo U('Qt/Money/chongzhi');?>">充值</a><a href="<?php echo U('Qt/Money/tixian');?>">提现</a></div>
  <div class="yhklb"><h1>银行卡信息</h1>
    <?php if($bank != ''): ?><p><?php echo ($nickname); ?>：<?php echo ($card); ?></p>
  <p><a href="<?php echo U('Qt/Money/yhk');?>">修改银行卡</a></p>
      <?php else: ?>
      <p><a href="<?php echo U('Qt/Money/yhk');?>">+添加银行卡</a></p><?php endif; ?>
  </div>
  <div class="szbt">
    <h1 class="szjl hover">全部收支记录</h1>
    <h1 class="szjl ">收入记录</h1>
    <h1 class="szjl ">支出记录</h1>
  </div>
  <div class="szk">
  <div class="qbk hover">
  <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; switch($v['type']): case "1": ?><p><?php echo (date('Y-m-d',$v['time'] )); ?>购买<?php echo ($v['xname']); ?>,支出<?php echo ($v['money']); ?>元。</p><?php break;?>
  		    <?php case "2": ?><p><?php echo (date('Y-m-d',$v['time'] )); ?>充值<?php echo ($v['money']); ?>元。</p><?php break;?>
            <?php case "3": ?><p><?php echo (date('Y-m-d',$v['time'] )); echo ($v['xname']); echo ($v['money']); ?>元。</p><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="qbk">
     <?php if(is_array($acz)): $i = 0; $__LIST__ = $acz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><?php echo (date('Y-m-d',$v['time'] )); echo ($v['xname']); echo ($v['money']); ?>元。</p><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="qbk">
    <?php if(is_array($axf)): $i = 0; $__LIST__ = $axf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; switch($v['type']): case "1": ?><p><?php echo (date('Y-m-d',$v['time'] )); ?>购买<?php echo ($v['xname']); ?>,支出<?php echo ($v['money']); ?>元。</p><?php break;?>
  		    <?php case "2": ?><p><?php echo (date('Y-m-d',$v['time'] )); ?>充值<?php echo ($v['money']); ?>元。</p><?php break;?>
            <?php case "3": ?><p><?php echo (date('Y-m-d',$v['time'] )); echo ($v['xname']); echo ($v['money']); ?>元。</p><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
  </div>
  </div>
</div>
</body>
</html>