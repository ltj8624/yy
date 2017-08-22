<?php
return array(
	//'配置项'=>'配置值'
    //-----------------商户配置-------------------//
    /*
        * TODO: 修改这里配置为您自己申请的商户信息
        * 微信公众号信息配置
        *
        * APPID：绑定支付的APPID（必须配置，开户邮件中可查看）
        *
        * MCHID：商户号（必须配置，开户邮件中可查看）
        *
        * KEY：商户支付密钥，参考开户邮件设置（必须配置，登录商户平台自行设置）
        * 设置地址：https://pay.weixin.qq.com/index.php/account/api_cert
        *
        * APPSECRET：公众帐号secert（仅JSAPI支付的时候需要配置， 登录公众平台，进入开发者中心可设置），
        * 获取地址：https://mp.weixin.qq.com/advanced/advanced?action=dev&t=advanced/dev&token=2005451881&lang=zh_CN
        * @var string
    */
        'APPID' => 'wxfee3b29e6b05017f',
        'MCHID' => '1471481402',
        'KEY' => 'Hzhengxingnongyeyingyanglianmeng',
        'APPSECRET' => '8c7a9d6b598524c226243d4ed581539b',

    //=======【证书路径设置】=====================================//
    /*
        * TODO：设置商户证书路径
        * 证书路径,注意应该填写绝对路径（仅退款、撤销订单时需要，可登录商户平台下载，
        * API证书下载地址：https://pay.weixin.qq.com/index.php/account/api_cert，下载之前需要安装商户操作证书）
        * @var path
    */
        'SSLCERT_PATH'              => COMMON_PATH.'/cert/apiclient_cert.pem',
        'SSLKEY_PATH'               => COMMON_PATH.'/cert/apiclient_key.pem',
    /*
        * TODO：这里设置代理机器，只有需要代理的时候才设置，不需要代理，请设置为0.0.0.0和0
        * 本例程通过curl使用HTTP POST方法，此处可修改代理服务器，
        * 默认CURL_PROXY_HOST=0.0.0.0和CURL_PROXY_PORT=0，此时不开启代理（如有需要才设置）
        * @var unknown_type
    */
        'CURL_PROXY_HOST'      =>   "0.0.0.0",//"10.152.18.220";
        'CURL_PROXY_PORT'      => 0,//8080;
    /*
        * TODO：接口调用上报等级，默认紧错误上报（注意：上报超时间为【1s】，上报无论成败【永不抛出异常】，
        * 不会影响接口调用流程），开启上报之后，方便微信监控请求调用的质量，建议至少
        * 开启错误上报。
        * 上报等级，0.关闭上报; 1.仅错误出错上报; 2.全量上报
        * @var int
    */
        'REPORT_LEVENL'        => 1,
     	'NOTIFY_URL'    =>"http://www.yunlianjinyang.com/weixin.php",
//        'NOTIFY_URL'    => 'http://www.wanfangsm.com/index.php/Service/Index/test',
       // 'NOTIFY_URL' =>"",
    /*微信网站配置*/
    //'配置项'=>'配置值'
    //显示页面调试TRACE
    'SHOW_PAGE_TRACE' => True,
    'URL_CASE_INSENSITIVE' => false,

    //默认访问控制器
    'DEFAULT_CONTROLLER' => 'Index',

    //跳转模板
    //'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
    //'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',

   


    //设置模板标识符
    'TMPL_L_DELIM' => '<{',
    'TMPL_R_DELIM' => '}>',

    //加载网站设置配置文件
    'LOAD_EXT_CONFIG' => 'site',

    'OrderStatus' => array(
        '0' => '全部',
        '1' => '提交未支付',
        '2' => '已取消订单',
        '3' => '已付款',
        '4' => '确认收货',
        '5' => '待发货',
        '6' => '已完成',
    ),
   /*微信网站配置*/ 
);