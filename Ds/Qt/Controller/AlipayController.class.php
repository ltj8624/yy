<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/20
 * Time: 16:33
 */
namespace Qt\Controller;
use Think\Controller;
use Think\Auth;
class AlipayController extends Controller {

public $config = array (
		//应用ID,您的APPID。
		'app_id' => " 2017052707362444",
		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpgIBAAKCAQEAvtPuguH6TJACB+jNIi0VuZV+ocoVKot0ZeOsTXH7Dzl3X25oNUIuj34obxOpcA490POBlfZAjbnt4BuNOaV1F+r9Mo4JiKq3rlONPF5yQGlL+0jpqGwh0IzhvLxl3Jz4yrLRJc11SuyADMve1HGcsB8DkbGE3+eQ0EcHh/L05YHi7c3FtU/yzJJiH32haeCkC3tyCmH8DVZR1xUjM7/+JbYNnAHBYCiNp7d6EDU/k4GkBOvAEp026drEHlQOMazXg9n3pj+PKWTD1FMHJedfgn0Fpz5hynOEf9rbUspzuQas4OpkoG8s4oy5vNlZdt/TSMnocBx1njsU1zr47h+mFQIDAQABAoIBAQCkIsI6TYjvJca5auJWjRTspctf+eOuznh10xi3HFznwXQN33c+qAhIYCkDMZRBz94XxfsmM8NepBgY9VnJxakrw3G5dDZ7GOwYw8DttgbrpCY4o4Rm22tSaHsZzaqH0XSlVJ1UuJ40rauOViT58iblzidRv7EcrZ7/prixlKZUaKDbp637nxcf2H6fJt2sbcNu/PH7TVXwMPB8p4/cpzcUqfVjDSZRbMd4vPNyvlnN9Hhg3eTknBNS9lv3gscherYq11G7nFkaJjK1T9wXpFlrlax3N7IQqtzJswxAOR4uwli/lf7F/P+WMHqLg+llFwz4nmsFhaUurhTLgMcTdHOZAoGBAOy4p10nTo8majQHQXEfboDowHJ/xUkbe7kcBcKm3YtlzOsE6rf1AQohcu2gW0aZktEGDgoaprlMpsefF3NMg/EOZNPwP55wNqxsi84yqI1TedmS6zlNckmlKvp1MSUCVeJzXZMEYmW3s6OyXdhjzS053m+nf3Fb7SjBy37EkLbfAoGBAM5edNTTTXtg1qHUc8D03FpIhcAKytWPxfm4G6Cn9KRzl4aIgnQRFXieQO7JkEo/iub9a6+UwXAmCZ6lAkf8W6p1ppDT+Qi8c/rjMX6U32RPCukZM5uMUsc1etpbRaAYs3/pnk031LF/2E+LYlTdHmR7TJGuFE66T26txAuBRgWLAoGBAJblXkpTNBCsPCbOOTkTAC3MMGDMccYYbtWgt0tNcwvY6LcnezeoRfFfQROYlJZ8bsovQePO+VhFNEsrbpdgvvp6Ymt3ShaFEVT4HGZkhG0SOSooLSlp5OBtGOhuq9UbmAOx5oRA1zhf0XMX0BqQA8pAiTpDW0m3f4Xrgvxb8KOhAoGBAKM4PfteLHgavWc9W1gP0oBtv6uGXarPjevWW7OTY4D2E7BKI7OdF3hQ4lZ6gW7YFwpfAV7brqr+yrj5FXbN98o4R0dhACSSuMCEFM9i+9SgV6bJUfIC6C269LHjYowfPUk8AwJb2BOTZAh12433XWRnyMWoA1PJM638LYRT+IfFAoGBANzColFI8QRB3tz/5ytHXb7gXrBDKbLt7s6UbaG8PVURtvercrdluPnmZ4vI7ZQLth4HrzXRCeD3JcjU4uwtmMh8FcMxKPfIxdaMoRdPmceJ9a0ndLrMWe0ZeDa8tVmqRGd6CgG7zWQ/Is4KQVRJ4OD30Mbt2s+ehgzV8Pn94qlK",

		//异步通知地址
		'notify_url' => "#",

		//同步跳转
		'return_url' => "#",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2VSVJIfGuj0Ny9oQzQKwv2PCkdPXZb2Is0WRxAra5c3pUnqprrxoLagT7ERuXLE9u2Q+5DrebtgsNRkh9KQNGbsv6H6RxqoxlASLN7o4qad/f3l9XiRKFwiDdf99ZB8ED404BJerzCzkWCSksfiZflydmjc5vxNDg3e1oHyjzDBLbkocGt+2PNVbF3FOJn9tHw9OrW+v6ZUNDfTNS2k/tY0/S/LspV0PEeUwil3lcu8BVtZfZuqExq6CRDuPYj3IqTpTcCp3ACbgJL21Me+wf/KNM7gdQoZ1uhMvILdu9uO8u1WXeQarzTyshMs5IGrA9fgUZnJuCGFQb9ICALQduQIDAQAB",
);


function _initialize()
{		//import('Alipay.AlipayTradeWapPayContentBuilder');
       // vendor('alpay.AlipayTradeService');
        //vendor('alpay.AlipayTradeWapPayContentBuilder');
}	
public function pay()//支付方式
{

   if(IS_POST){
	
		if (!empty($_POST['WIDout_trade_no'])&& trim($_POST['WIDout_trade_no'])!=""){
			//商户订单号，商户网站订单系统中唯一订单号，必填
			$out_trade_no = $_POST['WIDout_trade_no'];

			//订单名称，必填
			$subject = $_POST['WIDsubject'];

			//付款金额，必填
			$total_amount = $_POST['WIDtotal_amount'];

			//商品描述，可空
			$body = $_POST['WIDbody'];

			//超时时间
			$timeout_express="1m";
			//import("Org.AlipayTradeService");
			//import("@.AlipayTradeWapPayContentBuilder");
			
			//import('Alipay.AlipayTradeWapPayContentBuilder');
			
			//$payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
			include_once ("ThinkPHP/Library/Org/AliPay/AlipayTradeWapPayContentBuilder.php");
			include_once ("ThinkPHP/Library/Org/AliPay/AlipayTradeService.php");

			$payRequestBuilder->setBody($body);
			$payRequestBuilder->setSubject($subject);
			$payRequestBuilder->setOutTradeNo($out_trade_no);
			$payRequestBuilder->setTotalAmount($total_amount);
			$payRequestBuilder->setTimeExpress($timeout_express);

			$payResponse = new \AlipayTradeService($this->config);
			$result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);
			return ;
		}

	   
   }else{
	   $this->display();
   }
   
}

}