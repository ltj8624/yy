<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => " 2017052707362444",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAuGzzAXODuYg6oDBkIQ5R2bCB9Dd+yRxH4YLTtlJ6RoY9PNHGjkUusFgqSvX59DA2vS66f2BzJ50U5BXdelvs8RFZuRGacnHaaq105t9+76HcS4ZCY9RPL9HYtZpKeNRKmrq2GtecXBKIWYuBBrzW/WKvvydiKlmZK1DQn4SYeQ1pqdMvqWfPsL0CuL8S4VSPRSY6/pbyO+gD8j6IdnSGds+Mcw66gNVKsexBVdupwikx8jeDraQdsFZGapbs9O+v2Mbc62wJURbI2mIAj/0HRJY6lSk+FP3iwL4Wz+RnbUBEEbNBfxpNQc8ljeIg7LeKHSx9BX3Un00NqhTsTmOTcQIDAQABAoIBACzkkG6tAMab67FstiL5ymDUP34EOD+aO8EgSIrcHtml+aghZFTjcE8K1xiyMasIRXrdshYpkz50VU6EKAqN7+pqj82mBFORdVp8aLV+d/a7DtXvk5+bYb9BNKBYM4KgIpzxkDyOeYhMFpa9h6XtN+QsLp24Z4PplYhevrnl2/uzJqHzXz/ueulf8X9xxyUGoEqwiEdVOpo573gJj2oCEGpP4FVv1hXBzQgN2zigHX6zAmhoshI7MxgpW8dbQLLu28ymoWFqfrb/XDPNF2PjFGhOH4P5ogHikw3E0aAqKpCEpMOkk0aGQyPf4Cjk7NZInYlus3SUTmrWbi2O3Ogl1rUCgYEA9BnILbjvyO8calsJ/bT5MiFIv10tX3ZvTq/6ubsvOFG41qaR3scQjHGEcF9HCj63C+M+/MdDatK8YUN65xrlfBrYCZt/YKUUrWBYvwHcdrrDKifBtUkAM+7cVJposVTOXvBK6waF2jZvhYWRx5k1+VhU761uZjzBvlKgNXAbH9MCgYEAwWp15PQNPDYyMWKlPBc5+w4PV4bQa6QiCtazT9ZyaC7v3Z9stN2zLMleogSBCy07id1uf3BtSlxh4CJ0jdUKTX1Jw5nvk81/VgOagv7qPYU13okE6K+sqXBE6FZRrBIzAHRFANeFrORlEIbP5VmlGMSEaehLuGh3z/nFpgz7+SsCgYAgvUyCBWnz005GXYuLgbhipuAw+nhZc3MeZLAGNTryHNPjxleOP7jSfW87+yt2Dk9Swtnx4XADZdxqVzimwo7BBICxWS/OcJXDY0bD56YALrB6ePacL/xc+s6GcmdUUYGUbjo+J5PQXri6ed3BnaUFmnlZ5DMId2Gs+zwNrsmUjQKBgQCEb+xYIJBreUS3Mi+oTNMjyAXTTfmqqxGwUEEp2tIt6m3OWBqsYd4NPblxwRnHWGqbRScjVg1PzKAsRAuBDq5mTvLSX7Z/g0e80uza48fq5irzvOjCl3/n6XsVh/2WkEOh/Ps+z1S2BRH61gTGq7JzmiR9DFXE6KuZmhKvV9a1TwKBgQDgsezQOrY31Ng6kTYDzW6XtQwZ5Sxh7+9Aswlnh1eWW57eHamd3+8F1E0LpIKpu0zgQUsy5/DS1CJTYUhH/Ug1cL9oepeO1mM+LgMNTx+SVZwko+Yd8iMjw+NxwiB7LtqEuQQFmAVDhot/sTA2mdF7ZndhNTniMxJ1xxbZ8/mEpg==",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmM71ROxD6w6d8n8Gg0CJWf4UobapHIs1/FVTsRZoMLJNVO6xDF+ccZyvjL2bJrkjaksWs8dHJAq3TDIcgU4COaNqIlEXOHFECv0T7ZIvBcEXX9ajKu3jWGCzGql6qf+yjoyCHZg0H3yYQABNs4NG46OStLj6P37cO3Y3zrosR6o2B96FSvt0JeN+pqDirhAyii/K8Zuqsi2WTrQHWFMOpbTXfHlagqucADyPWVh72cBvJCO0zZ/E1jYY6T2F5dDCRxrUyUFJ9TfDIykz2uWa2C5CIceahpn5PHPBGDcfGp4Kq8vHzJWOLU1ggyEJzZJqZynpP6IierPFw3uhV071AQIDAQAB",
);
		
	