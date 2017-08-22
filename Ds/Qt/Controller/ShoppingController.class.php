<?php
namespace Qt\Controller;
use Think\Controller;
header('Content-type:text/html;charset=utf-8');
class ShoppingController extends Controller{
    #严重说明：  上面的命名空间给引入类要换成自己的路径
    private $app_id = 'wxfee3b29e6b05017f';    //appid
    private $mch_id = '1471481402';  //商户号
    private $makesign = 'haerbinyunlianjinyang12345678910'; //支付的签名(在商户平台API安全按钮中获取)
    private $parameters=NULL;
    private $notify='http://www.yunlianjinyang.com/wxpay.php';   //注意:不要动我已经给你配置好了    
    private $app_secret='e5cdf6a4f7c3432a687f14e90e14a30a';   //微信官方获取
    public $error  = 0;
    public $orderid = null;
    public $openid = '';
    //进行微信支付
    public function wxpay(){
		
		$_SESSION['openid']=$_GET['openid']  ;
		
//		dump($_SESSION['openid']);exit;
	    #获取openid ID
		if($_SESSION['openid']==null){
			$this->Wxcallback();  //获取用户的信息
		}		
        $reannumb = $this->randomkeys(6);  //生成随机数 以后可以当做 订单号
      //$pays =$_POST['order_money'];  //获取需要支付的价格
	 	$pays=0.01;
		
		//dump($pays);exit;
		
        #插入语句书写的地方
        $conf = $this->payconfig($reannumb,$pays*100, '政兴农业商品费用支付');
		//dump($conf);exit;
        if (!$conf || $conf['return_code'] == 'FAIL') exit("<script>alert('对不起，微信支付接口调用错误!" . $conf['return_msg'] . "');history.go(-1);</script>");
		$this->orderid = $conf['prepay_id'];
        //生成页面调用参数
        $jsApiObj["appId"] = $conf['appid'];
        $timeStamp = time();
        $jsApiObj["timeStamp"] = "$timeStamp";
        $jsApiObj["nonceStr"] = $this->createNoncestr();
        $jsApiObj["package"] = "prepay_id=" . $conf['prepay_id'];
		
        $jsApiObj["signType"] = "MD5";
        $jsApiObj["paySign"] = $this->MakeSign($jsApiObj);
		$json = json_encode($jsApiObj);
		//dump($json);exit;
		/*echo $_SESSION['openid'];
		echo "<br />";
		dump($json);exit;*/
		//$id=$_POST['order_id'];
		//dump($id);exit;
		//$status = $_POST['buyer_status'];
		//dump($status);exit;
		//$data['buyer_status'] = 1;
		
		//$m = $_POST['buyer_status'];
		//$where['order_id']=$id;
		//dump($where);exit;
		//$str=M('Order')->where($where)->save($data);
		//dump($str);exit;
			
		$this->assign('parameters',$json);  
		$this->title="用户订单支付管理";
		$this->display();                 //下面对应的就是我给你发的那个 （wxPay.html）HTML模板
    }
    public function wxpay2(){
		$_SESSION['openid']=$_GET['openid']  ;
		//dump($_SESSION['openid']);exit;
    	#获取openid ID
    	if($_SESSION['openid']==null){
    		$this->Wxcallback();  //获取用户的信息
    	}
    	$reannumb = $this->randomkeys(6);  //生成随机数 以后可以当做 订单号
    	//$pays=$_POST['money'];//获取需要支付的价格
    	$pays=0.01;
    	//dump($pays);exit;
    
    	#插入语句书写的地方
    	$conf = $this->payconfig($reannumb,$pays*100, '政兴农业充值费用支付');
    	//dump($conf);exit;
    	if (!$conf || $conf['return_code'] == 'FAIL') exit("<script>alert('对不起，微信支付接口调用错误!" . $conf['return_msg'] . "');history.go(-1);</script>");
	
    	$this->orderid = $conf['prepay_id'];
    		//生成页面调用参数
    				$jsApiObj["appId"] = $conf['appid'];
    				$timeStamp = time();
    				$jsApiObj["timeStamp"] = "$timeStamp";
    				$jsApiObj["nonceStr"] = $this->createNoncestr();
    				$jsApiObj["package"] = "prepay_id=" . $conf['prepay_id'];
    				$jsApiObj["signType"] = "MD5";
    				$jsApiObj["paySign"] = $this->MakeSign($jsApiObj);
    				$json = json_encode($jsApiObj);
    
    								/*echo $_SESSION['openid'];
    								echo "<br />";
    								 dump($json);exit;*/
    
    			$this->assign('parameters',$json);
    			$this->assign('pay',$pays);
		$this->title="用户充值管理";
	
	
    		$this->display();                 //下面对应的就是我给你发的那个 （wxPay.html）HTML模板
    }
    //订单管理
    #微信JS支付参数获取#
    protected function payconfig($no,$fee,$body)
    {
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $data['appid']=$this->app_id;
		$data['body']=$body;
		$data['device_info']='WEB';
		$data['mch_id']=$this->mch_id;           //商户号
		$data['nonce_str'] = $this->createNoncestr();
        $data['out_trade_no'] =$no;               //订单号
        $data['spbill_create_ip'] = $_SERVER["REMOTE_ADDR"];  //ip地址
		$data['total_fee'] = $fee;                 //金额
        $data['notify_url'] = $this->notify;
        $data['trade_type'] = 'JSAPI';
        $data['openid'] = $_SESSION['openid'];   //获取保存用户的openid
        $data['sign'] = $this->MakeSign($data);
     //  print_r($data);
        $xml = $this->ToXml($data);
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL,$url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        //设置header
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_POST, TRUE); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS,$xml); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        $tmpInfo = curl_exec($curl); // 执行操作
        curl_close($curl); // 关闭CURL会话
        $arr = $this->FromXml($tmpInfo);
        return $arr;
    }

    /**
     *    作用：产生随机字符串，不长于32位
     */
    public function createNoncestr($length = 32){
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";
        for($i = 0; $i < $length; $i++){
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

	 public function Wxcallback()
     {
    	$direct = $this->get_page_url(); //当前访问URL
    	//$code =Yii::app()->request->getParam('code');  //获取code码号
    	$code =$_GET['code'];  //获取code码号
    	if($code==null){
    		header("Location:"."https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->app_id."&redirect_uri=".urlencode($direct)."&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect");
    	}else{
    		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->app_id."&secret=".$this->app_secret."&code={$code}&grant_type=authorization_code";
    		$res = $this->request_get($url);
    		if($res)
    		{
    			$data = json_decode($res, true);
    			$_SESSION['openid'] = $data['openid'];    //设置session
    		}else{
    			echo json_encode(array('status'=>0,'msg'=>'获取openid出错','v'=>4));
    			die();
    		}
    	}
	  
    }
	public function request_get($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }
	
    #获取当前访问完整URL#
    public function get_page_url($site=false){
    	$url = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
    	$url .= $_SERVER['HTTP_HOST'];
    	if($site) return $this->seldir().'/'; //访问域名网址
    	$url .= isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : urlencode($_SERVER['PHP_SELF']) . '?' . urlencode($_SERVER['QUERY_STRING']);
    	return $url;
    }
    //返回访问目录
    public function seldir(){
    	$baseUrl = str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME']));
    	//保证为空时能返回可以使用的正常值
    	$baseUrl = empty($baseUrl) ? '/' : '/'.trim($baseUrl,'/');
    	return 'http://'.$_SERVER['HTTP_HOST'].$baseUrl;
    }
	
    /**
     *    作用：产生随机字符串，不长于32位
     */
    public function randomkeys($length)
    {
        $pattern = '1234567890123456789012345678905678901234';
        $key = null;
        for ($i = 0; $i < $length; $i++) {
            $key .= $pattern{mt_rand(0, 30)};    //生成php随机数
        }
        return $key;
    }

    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
    public function FromXml($xml)
    {
        //将XML转为array
        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    }

    /**
     * 输出xml字符
     * @throws WxPayException
     **/
    public function ToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            } else {
                $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
            }
        }
        $xml .= "</xml>";
        return $xml;
    }

    /**
     * 生成签名
     * @return 签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
     */
    protected function MakeSign($arr)
    {
        //签名步骤一：按字典序排序参数
        ksort($arr);
        $string = $this->ToUrlParams($arr);
        //签名步骤二：在string后加入KEY
        $string = $string . "&key=" . $this->makesign;
        //签名步骤三：MD5加密
        $string = md5($string);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);
		//dump($result);exit;
        return $result;
    }

    /**
     * 格式化参数格式化成url参数
     */
    protected function ToUrlParams($arr)
    {
        $buff = "";
        foreach ($arr as $k => $v) {
            if ($k != "sign" && $v != "" && !is_array($v)) {
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff;
    }

	
	public function callback(){
		$xml = file_get_contents("php://input");
		$log = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		$id = $log['out_trade_no'];  //获取订单号

		
		exit('SUCCESS');
	}
	

}