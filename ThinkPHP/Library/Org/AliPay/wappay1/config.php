<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016042901349061",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIICeAIBADANBgkqhkiG9w0BAQEFAASCAmIwggJeAgEAAoGBAMPnJ7JIdM5RQk711UDpVZ7dJEyOC0hetzjaHn4+L3sfuV5X6+dhvaHfuCysvqDElEBgk4IlCfw+f1tt24A6OIxpR3vUkk5IQDyZvLyrt0OpFBq12b9qQnx8ME9tMOzMorBLugJPL3kHy2DoNiujNK4EUNsjMaCdMbpFglg3FePrAgMBAAECgYEAjKywB8kZ/5HAcNz9HtivgB3C1CpoFbbWEUAoB3V2OQ7l2MaAAy5fsx7orUP6u42N+9Cd/CXGzti+MZRou+KS+ZXXOQhU4ZMs0yWgJpnRfUpcBjWUaVDnHoDPLdbi+coFwxLpZwuZH2VzUjyGC4UZq6kjoY5urwCo95Lh7kM2b4kCQQD3wEMZWueRID/0rN5XVQF1q1+/i9jyHNhJU3Fuo9lWFggS3SNYLHoFw6fEeuaYSbiEsOseCOqr5AuxasSQJOXHAkEAymz1jYdHbPOpfYY244649lR0CnSHSzT36U7nC7SUzG3fgKuZEzMWxsmTZkITylYJShRo4VCyKPwgwnaUyGXAvQJBAK3dVzlr+iZ2o2tqBX70QNn7Mm6SDeWbKI4M6QXkJpmrTG8wkaVHUTrKW+oe9cTZt4wnPFkPmOCYYTxY2SjvO/ECQAze5rIMAu+bgpBXo0/OuFX5QrOTezK9+HFeMfSdk8R3y/k7b+03l2AmWvfqhaWc2NRb/dstrVZLya1zqrwfNCUCQQDHJE0ob2dbCYMNA6jblCO1dIQywlMfq7CsWmJ2+0zMXBvJxIMEKzBiuBCjV3iAG44TVBwqc8pzvH+iBAbLYV5m",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB",
		
	
);