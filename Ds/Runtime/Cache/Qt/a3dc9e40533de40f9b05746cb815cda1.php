<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<title>云联金阳</title>
<link rel="stylesheet" href="/Public/css/mr.css" type="text/css" />
<link rel="stylesheet" href="css/mr.css" type="text/css" />
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
})
</script>
<link rel="stylesheet" href="/Public/css/slick.css" type="text/css"/>
</head>
<body>

<div class="top">
  <div class="dingdan"><a href="<?php echo U('Qt/Goods/goumai_ddlb');?>"><img src="/Public/img/dd.png">订单</a></div><a href="javascript:history.go(-1);">
<img src="/Public/img/jiantou.png" /></a>购买新羊
</div>
<div class="slider single-item">
<?php if(is_array($apo)): $k = 0; $__LIST__ = $apo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div><a href="<?php echo ($v['access']); ?>"><img src="/Public/<?php echo ($v['photo']); ?>" width="100%"></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="goumai1">
<?php if(is_array($arr)): $k = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><!--<div class="biaoqian2"></div>-->
  <form name="dd<?php echo ($v["pid"]); ?>" action="/index.php/Qt/Product/goumai_xx" method="post">
            <input type="hidden" value="<?php echo ($v['pid']); ?>" name="pid"/>
            <input type="hidden" value="<?php echo ($v['pamout']); ?>" name="pamout"/>
            <input type="hidden" value="<?php echo ($v['pname']); ?>" name="pname"/>
            <input type="hidden" value="<?php echo ($v['pmuch']); ?>" name="pmuch"/>
            <input type="hidden" value="<?php echo ($v['income']); ?>" name="income"/>
            <input type="hidden" value="<?php echo ($v['cycle']); ?>" name="cycle"/>
            <input type="hidden" value="<?php echo ($v['nowamout']); ?>" name="nowamout"/>
            <input type="hidden" value="<?php echo ($v['time']); ?>" name="time"/>
            <input type="hidden" value="<?php echo ($v['count']); ?>" name="count"/>
             <input type="hidden" value="<?php echo ($v['fhfs']); ?>" name="fhfs"/>
              <input type="hidden" value="<?php echo ($v['mcjs']); ?>" name="mcjs"/>
        </form>
  <h1><a href="javascript:document.dd<?php echo ($v["pid"]); ?>.submit()"><span>第<?php echo ($v['pnumber']); ?>期</span><?php echo ($v['pname']); echo ($v['pamout']); ?>只</a></h1>
  <ul>
  <form action="/index.php/Qt/Product/goumai_dd" method="post">
          <input type="hidden" value="<?php echo ($v['pid']); ?>" name="pid"/>
          <input type="hidden" value="<?php echo ($v['pamout']); ?>" name="pamout"/>
          <input type="hidden" value="<?php echo ($v['pname']); ?>" name="pname"/>
          <input type="hidden" value="<?php echo ($v['pmuch']); ?>" name="pmuch"/>
          <input type="hidden" value="<?php echo ($v['income']); ?>" name="income"/>
          <input type="hidden" value="<?php echo ($v['cycle']); ?>" name="cycle"/>
          <input type="hidden" value="<?php echo ($v['nowamout']); ?>" name="nowamout"/>
          <input type="hidden" value="<?php echo ($v['time']); ?>" name="time"/>
           <input type="hidden" value="<?php echo ($v['fhfs']); ?>" name="fhfs"/>
              <input type="hidden" value="<?php echo ($v['mcjs']); ?>" name="mcjs"/>
<a href="javascript:document.dd<?php echo ($v["pid"]); ?>.submit()">
  <li><img src="/Public/img/gm_03.png" />
    <br />每只/元<span><?php echo ($v['pmuch']); ?></span>
    </li>
    <li><img src="/Public/img/gm_05.png" />
    <br />预期年化收益<span style="font-size:7vw; color:rgba(0,0,0,1)"><strong><?php echo ($v['uu']); ?></strong></span>
    </li>
    <li><img src="/Public/img/gm_07.png" />
    <br />养殖周期<span><?php echo ($v['cycle']); ?></span>
    </li>
</a>  

    <input type="submit" value="购买新羊" class="an1" />
      </form>
  <div class="baoxian"><img src="/Public/img/bao.png" />全部羊只由太平洋保险公司承保</div>
  </ul><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<!--<div class="gmlb">
  <ul>
    <li>
    <div class="biaoqian3"></div>
    <h1><span>第二期</span>杜泊羊30只，按年分红</h1>
    <h2><span>2000元/只</span><span>1000元/年</span><span>三年期限</span></h2>
    </li>
    <li>
    <div class="biaoqian3"></div>
    <h1><span>第一期</span>杜泊羊30只，按年分红</h1>
    <h2><span>2000元/只</span><span>1000元/年</span><span>三年期限</span></h2>
    </li>
  </ul>
</div>-->
</body>
</html>