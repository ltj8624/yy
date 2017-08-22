<?php
namespace Qt\Controller;
use Think\Controller;

class ProductController extends Controller {
	public function __construct()
	{
		parent::__construct();
		$this->model = D('Product');
		$this->order = D('Order');
		$this->vip = D('Vip');
		$this->ht = D('Dcht');
	}

	public function mr(){
		$this->display();
	}
	public function goumai(){
		
			$vip=M('Vip')->where(array('vid'=>session('uid')))->find();
			
			
		//产品广告位
			$str=M('ProductPhoto');
			$apo=$str->select();
			$this->assign('apo',$apo);
			
			//$where['time']=array('gt',time());
			$where['nowamout'] = array('gt',0);
			$arr=$this->model->where($where)->order('pid desc')->select();
			foreach ($arr as $k=>$v) {
				//$arr[$k]['uu']=$arr[$k]['income']*$arr[$k]['pmuch']/100;
				$arr[$k]['uu']=$arr[$k]['income'];
				if ($v['cycles'] == 1) {
				$opopo=$v['cycle']/30;
				$arr[$k]['cycle']=$opopo.'个月';
			}elseif ($v['cycles'] == 2) {
				$arr[$k]['cycle']=$v['cycle'].'天';
			}
		
			$this->assign('arr',$arr);
			}
		
		
		$this->display();
	}
	public function goumai_xx(){
		$_POST['uu'] = $_POST['pmuch']*$_POST['pamout'];
		$_POST['ww'] = $_POST['nowamout']/$_POST['pamout']*100;
		$_POST['dao'] = round(($_POST['time']-time())/60/60/24);
		//$_POST['dao'] =round($_POST['time']/60/60/24/30);
		$_POST['ww']=number_format($_POST['ww'],2);
		//$str=M('Product');
		//dump($_POST);exit;
		$this->assign($_POST);
		
// 		echo '<pre>';
// 		print_r($_POST);
// 		echo '</pre>';
		$this->display();
	}
	public function goumai_dd(){
		if(session('uid')!='' ){
			$vip=M('Vip')->where(array('vid'=>session('uid')))->find();
			if ($vip['sfrz']!=2) {
				$this->error('请完成身份认证',U('Qt/User/sfrz'),1);
			}else{
		$_POST['uu'] = $_POST['pmuch']*$_POST['pamout'];
		$_POST['ww'] = $_POST['nowamout']/$_POST['pamout']*100;
		$_POST['ww']=number_format($_POST['ww'],2);
		//$_POST['dao'] = floor(($_POST['time']-time())/60/60/24);
		$this->assign($_POST);
			}
		}else{
			$this->error('请登录',U('Qt/Login/dl'),1);

			}
		
		$this->display();
	}
	public function ajax(){
		$t = 1;
		echo $t;
	}
	public function dd(){
	
		if(IS_POST){
			
		
			
		$where['vid'] = array('eq',session('uid'));
			$man=$this->vip->where($where)->find();
			$pro=$this->model->where(array('pid'=>I('post.pid')))->find();
			$man['cycle'] = $pro['cycle'];
			$man['pp'] = $pro['pnumber'];
			//$man['earnings'] = $pro['pmuch']*$pro['income']*$_POST['number']/100;
			$bei=floor($pro['cycle']/$pro['ztime']);
    		$man['earnings']=floor($pro['pmuch']*$bei*$pro['cycle']/365*$pro['income']/100*$_POST['number']);	
			if(I('post.number') <= $pro['nowamout']){

			if($this->order->addd($man)){
				$man['order_sn'] = $_POST['order_sn'];
				$man['money'] = $_POST['number']*$_POST['pmuch'];
				$man['number'] = $_POST['number'];
				$man['pmoney'] =$_POST['price'];
				$this->ht->addd($man);
				 $this->error('订单提交成功',U('Qt/Goods/goumai_ddlb'),1);
				exit;
			}
		}else{
			$this->error('库存数量不足');
				exit();
			}
			$this->display();
		}
		
	}
		

}