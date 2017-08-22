<?php
namespace Qt\Controller;
use Think\Controller;
Vendor('Wxpay.WxPayConfig');
Vendor('Wxpay.WxPayJsApiPay');
Vendor('Wxpay.WxPayApi');
Vendor('Wxpay.WxPayData');
Vendor('Wxpay.WxPayException');
Vendor('Wxpay.WxPayNotify');
Vendor('Wxpay.log');

class WxpayController extends Controller {

	 //header( 'Content-Type: text/html; charset=UTF-8' );
	/*public function __construct(){  
         parent::__construct(); 
         header('content-type:text/html;charset=utf-8');
         if(!$_SESSION['mobileUser']){
			header("location:".__MODULE__."/Login/index");
			echo"<script>alert('请登录')</script>";
         }
    } */

	public function index(){
		$this->display();

	}

	public function jsapi(){
		
		$user = $_SESSION['uid'];
		dump($user);exit;
    
		//①、获取用户openid
		$tools = new \JsApiPay();
		$openId = $tools->GetOpenid();
		//dump($openId);exit;

		//②、统一下单
		$input = new \WxPayUnifiedOrder();
		$input->SetBody("云联金阳商品");
		$input->SetAttach("云联金阳商品");
		$input->SetOut_trade_no(\WxPayConfig::MCHID.date("YmdHis"));
		$input->SetTotal_fee("1");
		$input->SetTime_start(date("YmdHis"));
		$input->SetTime_expire(date("YmdHis", time() + 600));
		$input->SetGoods_tag("test");
		$input->SetNotify_url("http://www.yunlianjinyang.com/Qt/Wxpay/notify");
		$input->SetTrade_type("JSAPI");
		$input->SetOpenid($openId);
		$order = \WxPayApi::unifiedOrder($input);
		//dump($input);exit;
		
		//echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
		$jsApiParameters = $tools->GetJsApiParameters($order);
		$out_trade_no = $input->GetOut_trade_no();

		    	

    	$this->assign("out_trade_no",$out_trade_no);
    	$this->assign("user",$user);
		$this->assign('jsApiParameters',$jsApiParameters);
		$this->display();
	}






	public function notify(){
			//$id = $_SESSION['mobileUser']['id'];
			$id = $_SESSION['uid'];
    		$user = M('vip')->where("vid='$id'")->find();
    		
    		$res['name'] = $user['name'];
    		$res['mobile'] = $user['mobile'];

			if(isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != ""){
				$out_trade_no = I('out_trade_no');
				$input = new \WxPayOrderQuery();
				$input->SetOut_trade_no($out_trade_no);
				$outorder = \WxPayApi::orderQuery($input);
				var_dump($outorder);
			
				if($outorder['trade_state']== "SUCCESS"){
					$res['status'] = '1';
					$res['out_trade_no'] = $outorder['out_trade_no'];
					$res['transaction_id'] = $outorder['transaction_id'];
					$total = $outorder['total_fee']/100;
					$res['total_fee'] = $total;
					$res['time_end'] = $outorder['time_end'];
					$res['attach'] = $outorder['attach'];
					$trade = M('trade')->add($res);					
				}else{
					$res['trade_state'] = '0';					
				}	
				
				exit();
			}
	}


	public function retund(){

		$id = $_SESSION['mobileUser']['id'];   			//确定用户信息
		$trade = M('trade')->where("id=".$id)->find(); //查找用户数据
		$out_trade_no = $trade['out_trade_no'];		//退款订单号
		$total_fee = $trade['total_fee'];			//订单金额	
		$refund_fee = $trade['total_fee']; 			//退款金额	

		if(isset($_REQUEST["transaction_id"]) && $_REQUEST["transaction_id"] != ""){
				$transaction_id = $_REQUEST["transaction_id"];
				
				$input = new \WxPayRefund();
				$input->SetTransaction_id($transaction_id);
				$input->SetTotal_fee($total_fee);
				$input->SetRefund_fee($refund_fee);
			    $input->SetOut_refund_no(\WxPayConfig::MCHID.date("YmdHis"));
			    $input->SetOp_user_id(\WxPayConfig::MCHID);
				printf_info(\WxPayApi::refund($input));
				exit();
			}


		if(isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != ""){
				$input = new \WxPayRefund();
				$input->SetOut_trade_no($out_trade_no);
				$input->SetTotal_fee($total_fee);
				$input->SetRefund_fee($refund_fee);
			    $input->SetOut_refund_no(\WxPayConfig::MCHID.date("YmdHis"));
			    $input->SetOp_user_id(\WxPayConfig::MCHID);
				printf_info(\WxPayApi::refund($input));
				exit();
			}


		
	}


}