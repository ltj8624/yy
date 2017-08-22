<?php
namespace Qt\Controller;
use Think\Controller;

class MrController extends Controller {
	public function __construct()
	{
		parent::__construct();
		$this->model = D('Vip');
		$this->record = D('VipRecord');
	}
	public function _initialize(){
		if(!session('uid')&&!$_GET['openid']){
			$this->redirect('Login/dl');
		}
	}
	public function mr(){
		//订单状态修改
		if($_GET['id']!=''){
		$where['order_id']=$_GET['id'];
		$data['buyer_status']=1;
		$str=M('Order')->where($where)->save($data);
		//$str=M('Order');
		//$arr=$str->where($id)->find();
		
		//$arr['buyer_status']=1;
		//$status=$arr['buyer_status'];
		//$str->create();
		//$arr->save($status);
		}
		//dump($_GET['id']);
		if (session('uid')!=''){
			//充值余额修改
			//dump(I('get.pp'));
			//dump(I('get.se'));
			if ($_GET['pp'] != ''&& $_GET['se'] == 1) {
					$qian=$this->model->where(array('vid'=>session('uid')))->find();
					$this->model->create();
					
					unset($_POST);
					
					$data['vid'] = session('uid');
					$data['money'] = $qian['money']+$_GET['pp'];
					$_POST=array(
						'vid' => session('uid'),
						'type' => 2,
						'mode' => 2,
						'money' => $_GET['pp'],
						'xname' => '充值',
						'time' => time(),
						'number' => 1,
						
					);	
					$this->record->create();
					$this->model->save($data);
					$this->record->add();

		}
	
	
			$where['vid']=session('uid');
			$ret=$this->model->where($where)->find();
			if ($ret['money']=='') {
				$ret['money']=0;
			}
			$this->assign($ret['money']);
			$this->assign($ret);
			
		}
 
		$goods=M('Order');		
		$arr=$goods->where(array('vid'=>session('uid'),'del'=>0,'buyer_status'=>1))->select();						
		$product=M('Product');
		$app=$product->select();
		foreach ($arr as $k=>$a){
			$cou[]=	$a['number'];
			foreach ($app as $vvv){
				if ($a['pid']==$vvv['pid']){
					$arr[$k]['pname']=$vvv['pname'];
					$arr[$k]['pmoney']=$vvv['pmuch']*$vvv['income']/100*$a['number'];
					$arr[$k]['jtime']=$vvv['cycle']*30*24*60*60+$a['create_time'];
					$arr[$k]['cycle']=$vvv['cycle'];
					$bei=floor($vvv['cycle']/$vvv['ztime']);
					
    				$income=$vvv['income']*$vvv['ztime']/365;
					
    				$ass[]=floor($vvv['pmuch']*$bei*$income/100*$a['number']);										
				}
			}
		}
	if ($cou != ''){
    	$count=array_sum($cou);
    	}else {
    		$count=0;
    	}
    	if ($ass != '') {
    		$zz=array_sum($ass);
    	}else {
    		$zz = 0;
    	}
		$this->assign('count',$count);
		$this->assign('zz',$zz);
		$this->assign('arr',$arr);
		
		//根据uid获取code
		if ($_SESSION['uid']) {
			$str=M('Vip');
			$where['vid']=$_SESSION['uid'];
			$scode=$str->where($where)->getfield('scode');
			//$_SESSION['code'] = $code;
			//dump($code);exit;
			$this->assign('scode',$scode);
		}
		$this->display();
	}

	
}