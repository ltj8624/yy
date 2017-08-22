<?php
namespace Qt\Controller;
use Think\Controller;
class WapPayController extends Controller {
    public function index(){
    	$_SESSION['order_id']=$_POST['order_id'];
    	$_SESSION['order_money']=$_POST['order_money'];
    	$_SESSION['pname']=$_POST['pname'];
    	$_SESSION['gname']=$_POST['gname'];
    	$_SESSION['buyer_status']=$_POST['buyer_status'];

        $this->display();
    }
	public function indexx(){
// 		$_SESSION['order_id']=$_POST['order_id'];
// 		$_SESSION['order_money']=$_POST['order_money'];
// 		$_SESSION['pname']=$_POST['pname'];
// 		$_SESSION['gname']=$_POST['gname'];
// 		$_SESSION['buyer_status']=$_POST['buyer_status'];
		$_SESSION['name']='云联金阳钱包充值';
		$_SESSION['money']=$_POST['money'];
		$this->display();
	}
	
    //获取前端页面提交的数据
    public function get_data(){
        $wapPay = new \Org\AliPay\wappay\WapPay();
        
		//订单号
        $out_trade_no = time();
       
        $_SESSION['out_trade_no']=$out_trade_no;
        
		//商品名称
		if ($_SESSION['pname']=='') {
			$subject=$_SESSION['gname'];
		}
		if ($_SESSION['gname']=='') {
			$subject=$_SESSION['pname'];
		}
       // $subject = "商品总价值";
		//总金额 
        $total_amount =$_SESSION['order_money'];
		//描述（可以为空）
        $body = "政兴农业商品";
        $_SESSION['body']=$body;

        echo $wapPay->index($out_trade_no,$subject,$total_amount,$body);
    }
    public function get_date(){
    	$wapPay = new \Org\AliPay\wappay\WapPay();
    
    	//订单号
    	$out_trade_no = time();
    	 
    	$_SESSION['out_trade_no']=$out_trade_no;
    
    	//商品名称
    	
    
    		$subject=$_SESSION['name'];
    
    	// $subject = "商品总价值";
    	//总金额
    	$total_amount =$_SESSION['money'];
    	//描述（可以为空）
    	$body = "政兴农业充值";
    	$_SESSION['body']=$body;
    
    	echo $wapPay->index($out_trade_no,$subject,$total_amount,$body);
    }
    

	
	//回调处理
	public function notifyurl(){
		
		require_once($_SERVER['DOCUMENT_ROOT'].'/ThinkPHP/Library/Org/AliPay/wappay/config.php');
		require_once $_SERVER['DOCUMENT_ROOT'].'/ThinkPHP/Library/Org/AliPay/wappay/wappay/service/AlipayTradeService.php';
		$arr=$_POST;
		$alipaySevice = new \AlipayTradeService($config);
		$alipaySevice->writeLog(var_export($_POST,true));
		$result = $alipaySevice->check($arr);
		/* 实际验证过程建议商户添加以下校验。
		1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
		2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
		3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
		4、验证app_id是否为该商户本身。
		*/
		if($result) {//验证OK
			//商户订单号
			$out_trade_no = $_POST['out_trade_no'];
			//支付宝交易号
			$trade_no = $_POST['trade_no'];
			//交易状态
			$trade_status = $_POST['trade_status'];


			if($_POST['trade_status'] == 'TRADE_FINISHED') {

				    //判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
					//如果有做过处理，不执行商户的业务程序
						
				   //注意：
				    //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
			}
			else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
				     //判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
					//如果有做过处理，不执行商户的业务程序			
				   //注意：
				    //付款完成后，支付宝系统发送该交易状态通知
			}
			//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
				
			echo "success";		//请不要修改或删除
				
		}else {
			//验证失败
			echo "fail";	    //请不要修改或删除

		}


	}
	
	
	public function returnurl(){
		
	
		        require_once($_SERVER['DOCUMENT_ROOT'].'/ThinkPHP/Library/Org/AliPay/wappay/config.php');
		        require_once $_SERVER['DOCUMENT_ROOT'].'/ThinkPHP/Library/Org/AliPay/wappay/wappay/service/AlipayTradeService.php';
				$arr=$_GET;
				$alipaySevice = new \AlipayTradeService($config); 
				$result = $alipaySevice->check($arr);
				//dump($result);exit();
				/* 实际验证过程建议商户添加以下校验。
				1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
				2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
				3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
				4、验证app_id是否为该商户本身。
				*/
				if($result) {//验证成功
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//请在这里加上商户的业务逻辑程序代码
					//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
					//获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

					//商户订单号

					$out_trade_no = htmlspecialchars($_GET['out_trade_no']);

					//支付宝交易号

					$trade_no = htmlspecialchars($_GET['trade_no']);
					//dump($_SESSION);exit();
					if (session('money') != '') {
						
					
					$lbw=M('Vip')->where(array('vid'=>session('uid')))->find();
					$wheres['vid']=session('uid');
					$datas['money']=$_SESSION['money']+$lbw['money'];
				
					$vip=M('Vip')->where($wheres)->save($datas);
					}
					$data['buyer_status'] = 1;
					$where['order_id']=$_SESSION['order_id'];
 					//dump($where['order_id']);exit;
					$str=M('Order')->where($where)->save($data);
 					//dump($_SESSION['uid']);exit;
					$this->redirect('Qt/Mr/mr');

					
					
				echo "验证成功<br />外部订单号：".$out_trade_no;

					//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
					
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				}
				else {
					//验证失败
					echo "验证失败";
				}


	}
	
	
}