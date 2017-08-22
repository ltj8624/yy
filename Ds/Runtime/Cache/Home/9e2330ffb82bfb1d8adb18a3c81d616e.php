<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>订单列表</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
    <script type="text/javascript" src="/Public/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">
    <div class="pageTop">

    </div>

    <div class="page">
        <!-- user页面样式 -->
        <div class="connoisseur">
            <div class="conform">
                <form action="/admin.php/Home/WorkExperience/indexx">
                    <div class="cfD">
                        <input class="userinput" name="order_sn" type="text" placeholder="订单号" />&nbsp;&nbsp;&nbsp;
                        <button class="userbtn">搜索</button>
                    </div>
                </form>
                &nbsp&nbsp 订单总价：<?php echo ($zhong); ?>   订单总数：<?php echo ($count); ?>
            </div>
            <!-- user 表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td class="tdColor tdC">序号</td>
                        <td class="tdColor">订单号</td>
                        <td class="tdColor">收货人</td>

                        <td class="tdColor">联系电话</td>
                        <td class="tdColor">收货地址</td>
                        <td class="tdColor">货物名称</td>
                        <td class="tdColor">购买数量</td>
                        <td class="tdColor">总价</td>
                        <td class="tdColor">订单生成时间</td>
                        <td class="tdColor">是否付款</td>
                        <td class="tdColor">备注</td>
                        <td class="tdColor">操作</td>
                    </tr>
                    <?php if(empty($arr)): ?><tr height="40px">
                            <td style="font-size:16px;" colspan="10">没有符合条件的数据。。。</td>
                        </tr>
                        <?php else: ?>
                        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr height="40px">
                                <td><?php echo ($v['order_id']); ?></td>
                                <td><?php echo ($v['order_sn']); ?></td>
                                <td><?php echo ($v['buyer_name']); ?></td>
                                <td><?php echo ($v['tel']); ?></td>
                                <td><?php echo ($v['adds']); ?></td>
                                <td><?php echo ($v['pname']); ?></td>
                                <td><?php echo ($v['number']); ?></td>
                                <td><?php echo ($v['order_money']); ?></td>
                                <td ><?php echo (date('Y-m-d H:i:s',$v['create_time'] )); ?></td>
                                <td><?php if($v['buyer_status'] == 0): ?>否<?php else: ?>是<?php endif; ?></td>
                                <td class="aoo"><?php echo ($v["remark"]); ?></td>
                                <td class="aop" style="display: none"> <textarea name="remark" ids="<?php echo ($v["order_id"]); ?>" id="re_<?php echo ($v["order_id"]); ?>" class="mark" ><?php echo ($v["remark"]); ?></textarea></td>
                                <td><?php if($v['status'] == 1): ?><span>已发货</span><?php else: ?><a href="" ids="<?php echo ($v["order_id"]); ?>" id="wo_<?php echo ($v["order_id"]); ?>" class="wfh">未发货</a><?php endif; ?></td><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </table>
                <div class="pagelist"><?php echo ($show); ?></div>
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
    // 广告弹出框
    $(".delban").click(function(){
        var del = $(this).attr('value');
        $('.yes').attr('href','/admin.php/Home/WorkExperience/delete/pid/'+del);
        $(".banDel").show();
    });
    $(".close").click(function(){
        $(".banDel").hide();
    });
    $(".no").click(function(){
        $(".banDel").hide();
    });
    // 广告弹出框 end
    //ajax 发货
    $('.wfh').click(function(){
        var ids = $(this).attr('ids');
        if(confirm('确定发货？')) {
            $.post('/admin.php/Home/WorkExperience/ajax', {'ids':ids}, function (t) {
                if (t == 1) {
                    $('#wo_'+ids).parent().html("已发货");
//
                }
            })

        }
    })
           $('.aoo').click(function(){

            $(this).css('display','none');
            $(this).next().css('display','block');
        })
        //ajax 备注
        $('.mark').blur(function(){
            var ids = $(this).attr('ids');
            var mark=$(this).val();
            $.post('/admin.php/Home/WorkExperience/zz', {'ids':ids,'remark':mark}, function (t) {

                $('#re_'+ids).parent().css('display',"none");
                $('#re_'+ids).parent().prev().removeAttr('style').html(mark);


            })


        })
</script>
</html>