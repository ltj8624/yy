<?php
namespace Qt\Controller;
use Think\Controller;

class YlController extends Controller {
		protected $model;
		protected $product;
		protected $goods;
		public function __construct()
		{
			parent::__construct();
			$this->model = D('Order');
			$this->product = D('Product');
		}
		
	public function yl(){
		

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
					$arr[$k]['jtime']=$vvv['cycle']*24*60*60+$a['create_time'];
					if($vvv['cycles'] == 1){
					$arr[$k]['cycle']=$vvv['cycle'].'月';
					}else{
						$arr[$k]['cycle']=$vvv['cycle'].'天';
						}
					
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
		$this->display();
	}
}