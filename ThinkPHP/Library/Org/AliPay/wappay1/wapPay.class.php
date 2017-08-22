<?php
namespace Org\AliPay\wappay;
class wapPay{
    function __construct()
    {
        $this->_alipay_config=array(
            //应用ID,您的APPID。
            // 'app_id' => "2016042901349061",
            'app_id' => "2017052707362444",

            //商户私钥，您的原始格式RSA私钥
            // 'merchant_private_key' => "MIICXgIBAAKBgQDD5yeySHTOUUJO9dVA6VWe3SRMjgtIXrc42h5+Pi97H7leV+vnYb2h37gsrL6gxJRAYJOCJQn8Pn9bbduAOjiMaUd71JJOSEA8mby8q7dDqRQatdm/akJ8fDBPbTDszKKwS7oCTy95B8tg6DYrozSuBFDbIzGgnTG6RYJYNxXj6wIDAQABAoGBAIyssAfJGf+RwHDc/R7Yr4AdwtQqaBW21hFAKAd1djkO5djGgAMuX7Me6K1D+ruNjfvQnfwlxs7YvjGUaLvikvmV1zkIVOGTLNMloCaZ0X1KXAY1lGlQ5x6Azy3W4vnKBcMS6WcLmR9lc1I8hguFGaupI6GObq8AqPeS4e5DNm+JAkEA98BDGVrnkSA/9KzeV1UBdatfv4vY8hzYSVNxbqPZVhYIEt0jWCx6BcOnxHrmmEm4hLDrHgjqq+QLsWrEkCTlxwJBAMps9Y2HR2zzqX2GNuOOuPZUdAp0h0s09+lO5wu0lMxt34CrmRMzFsbJk2ZCE8pWCUoUaOFQsij8IMJ2lMhlwL0CQQCt3Vc5a/omdqNragV+9EDZ+zJukg3lmyiODOkF5CaZq0xvMJGlR1E6ylvqHvXE2beMJzxZD5jgmGE8WNko7zvxAkAM3uayDALvm4KQV6NPzrhV+UKzk3syvfhxXjH0nZPEd8v5O2/tN5dgJlr36oWlnNjUW/3bLa1WS8mtc6q8HzQlAkEAxyRNKG9nWwmDDQOo25QjtXSEMsJTH6uwrFpidvtMzFwbycSDBCswYrgQo1d4gBuOE1QcKnPKc7x/ogQGy2FeZg==",
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
            //'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB",
            'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB",

        );
    }

    public function index($out_trade_no,$subject,$total_amount,$body){
        header("Content-Type:text/html;charset=utf-8");

        require_once dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'/wappay/service/AlipayTradeService.php';
        require_once dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';
//        require dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'config.php';

        $config = file_get_contents(dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'config.php');

        if (!empty($out_trade_no)&& trim($out_trade_no!="")){
            //超时时间
            $timeout_express="1m";

            $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
            $payRequestBuilder->setBody($body);
            $payRequestBuilder->setSubject($subject);
            $payRequestBuilder->setOutTradeNo($out_trade_no);
            $payRequestBuilder->setTotalAmount($total_amount);
            $payRequestBuilder->setTimeExpress($timeout_express);

            $payResponse = new \AlipayTradeService($this->_alipay_config);
            $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

            return ;
        }
    }
}
?>