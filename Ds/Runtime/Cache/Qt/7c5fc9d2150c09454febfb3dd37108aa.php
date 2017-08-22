<?php if (!defined('THINK_PATH')) exit();?>-<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>微信用户在线支付</title>
    <script type="text/javascript">
        //调用微信JS api 支付
        //在线充值
        
        
        function jsApiCall()
        {
            var b=<?php echo ($parameters); ?>;

            WeixinJSBridge.invoke(
                    'getBrandWCPayRequest',
                    {
                         "appId":b.appId,
                         "nonceStr":b.nonceStr,
                         "package":b.package,
                         "paySign":b.paySign,
                         "signType":b.signType,
                         "timeStamp":b.timeStamp
                    },
                    function(res){
                        if(res.err_msg == 'get_brand_wcpay_request:ok'){

							 window.open("http://www.yunlianjinyang.com/index.php/Qt/Goods/goumai_ddlb");     //登录成功 跳转到主要页面

                        }else{
						
							var res = '您取消了支付';

                             alert(JSON.stringify(res));

                        }
                    }
            );

        }
        function callpay(){

            if (typeof WeixinJSBridge == "undefined"){

                if( document.addEventListener ){

                    document.addEventListener('WeixinJSBridgeReady', jsApiCall,false);

                }else if (document.attachEvent){

                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }

            }else{

                jsApiCall();

            }
        }
    </script>
</head>
<body>
<br/>
<div align="center">

     <!--<?php echo ($parameters); ?>-->
	
    <button style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onClick="callpay()" >立即支付</button>
</div>
</body>
</html>