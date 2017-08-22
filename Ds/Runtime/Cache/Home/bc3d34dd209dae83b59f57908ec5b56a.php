<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页左侧导航</title>
<link rel="stylesheet" type="text/css" href="/Public/css/public.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/js/public.js"></script>
<head></head>

<body id="bg">
	<!-- 左边节点 -->
	<div class="container">

		<div class="leftsidebar_box">
			
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/Public/img/coin03.png" /><img class="icon2"
						src="/Public/img/coin02.png" /> 产品管理<img class="icon3"
						src="/Public/img/coin19.png" /><img class="icon4"
						src="/Public/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/Product/index');?>" target="main">产品列表</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
                <dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/ProductPhoto/index');?>" target="main" class="cks">产品轮播图</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/Public/img/coin07.png" /><img class="icon2"
						src="/Public/img/coin08.png" /> 会员管理<img class="icon3"
						src="/Public/img/coin19.png" /><img class="icon4"
						src="/Public/img/coin20.png" />
				</dt>
				
				
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/Vip/yj');?>" target="main" class="cks">会员满意度表</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/Vip/index');?>" target="main" class="cks">会员列表</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/Vip/sfrz');?>" target="main" class="cks">会员审核列表</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/VipRecord/index');?>" target="main" class="cks">会员提现列表</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				
			</dl>
			
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/Public/img/coin17.png" /><img class="icon2"
						src="/Public/img/coin18.png" /> 订单管理<img class="icon3"
						src="/Public/img/coin19.png" /><img class="icon4"
						src="/Public/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/WorkExperience/index');?>" target="main">产品订单</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/WorkExperience/indexx');?>" target="main">商城订单</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
			</dl>
						
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/Public/img/coin03.png" /><img class="icon2"
						src="/Public/img/coinL2.png" /> 商城管理<img class="icon3"
						src="/Public/img/coin19.png" /><img class="icon4"
						src="/Public/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/Goods/index');?>" target="main">商品列表</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/Lbt/index');?>" target="main">商城轮播图</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>	
                <dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/Access/index');?>" target="main" class="cks">商城广告位</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
			</dl>
		   <dl class="system_log">
				<dt>
					<img class="icon1" src="/Public/img/coin10.png" /><img class="icon2"
						src="/Public/img/coin09.png" /> 合同管理<img class="icon3"
						src="/Public/img/coin19.png" /><img class="icon4"
						src="/Public/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/Cont/index');?>" target="main">合同列表</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/Ht/ht');?>" target="main" class="cks">合同图片</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/Public/img/coin17.png" /><img class="icon2"
						src="/Public/img/coin18.png" /> 分红管理<img class="icon3"
						src="/Public/img/coin19.png" /><img class="icon4"
						src="/Public/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/Order/index');?>" target="main">分红列表</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				
				
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/Public/img/coin11.png" /><img class="icon2"
						src="/Public/img/coin12.png" /> 视频管理<img class="icon3"
						src="/Public/img/coin19.png" /><img class="icon4"
						src="/Public/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/Video/index');?>" target="main">视频列表</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/Video/indexd');?>" target="main">羊舍列表</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/Public/img/coin05.png" /><img class="icon2"
						src="/Public/img/coin06.png" /> 权限管理<img class="icon3"
						src="/Public/img/coin19.png" /><img class="icon4"
						src="/Public/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/UserInfo/index');?>" target="main">管理员</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/AuthRule/index');?>" target="main">权限管理</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a class="cks" href="<?php echo U('Home/AuthGroup/index');?>" target="main">权限组管理</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
			</dl>
			
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/Public/img/coin07.png" /><img class="icon2"
						src="/Public/img/coin08.png" /> 讯息管理<img class="icon3"
						src="/Public/img/coin19.png" /><img class="icon4"
						src="/Public/img/coin20.png" />
				</dt>
				
				
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/News/zx');?>" target="main" class="cks">资讯</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				
				
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/News/gy');?>" target="main" class="cks">关于</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/infomation/index');?>" target="main" class="cks">消息</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/Kf/index');?>" target="main" class="cks">客服信息</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/Public/img/coin111.png" /><img class="coin22"
						src="/Public/img/coin222.png" />
						<a href="<?php echo U('Home/Wt/index');?>" target="main" class="cks">常见问题</a><img class="icon5" src="/Public/img/coin21.png" />
				</dd>
				
			</dl>
		</div>

	</div>
</body>
</html>