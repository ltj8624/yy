<?php
namespace Qt\Controller;
use Think\Controller;

class IndexController extends Controller {
   public function __construct()
	{
		parent::__construct();
		$this->model = D('Vip');
		$this->record = D('VipRecord');
		$this->pro = D('Product');
		$this->order = D('Order');
	}
    public function index(){
		//订单状态修改
    if($_GET['id']!=''){
		$where['order_id']=$_GET['id'];
		$data['buyer_status']=1;
		$str=M('Order')->where($where)->save($data);
		
			}
			//推广佣金
			$vip=M('Vip');
			$order=M('Order');		
			$sto=$order->where(array('vid'=>session('uid'),'buyer_status'=>1))->find();
// 			echo '<pre>';
// 			print_r($sto);
// 			echo '</pre>';
// 			exit();
			$stn=$order->where(array('vid'=>session('uid'),'buyer_status'=>1,'gid'=>0))->count();
		
			$where['vid']=session('uid');			
			$strcode=$vip->where($where)->find();

			$str=$vip->field('scode')->select();
		
// 						echo '<pre>';
// 						print_r($stn);
// 						echo '</pre>';
// 						exit();
			if ($stn==1) {
			
				if ($strcode['othercode']) {
					$ood=M('Order');
					$othervip=M('Vip');
					$aa=$strcode['othercode'];
					$money=$othervip->where(array('scode'=>$aa))->find();
					$sto=$order->where(array('vid'=>session('uid'),'buyer_status'=>1,'gid'=>0))->find();
// 					echo '<pre>';
// 					print_r($money);
// 					echo '</pre>';
// 					exit();
					$ooi=$money['money']+$sto['order_money']*0.02;
					
					$dataa=array(
							'vid' => $money['vid'],
							'money'=>$ooi,
					);
					$othervip->create();
					$othervip->save($dataa);
				}	
		//$str=M('Order');
		//$arr=$str->where($id)->find();
		
		//$arr['buyer_status']=1;
		//$status=$arr['buyer_status'];
		//$str->create();
		//$arr->save($status);
		}
		
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
	
    	$goods=M('Order');
    	
    	$arr=$goods->where(array('vid'=>session('uid'),'del'=>0,'buyer_status'=>1))->select();
		//dump($arr);exit();
    	
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
					preg_match_all('/\d+/',$vvv['income'],$incooo);
    				$income=$vvv['income']*$vvv['ztime']/365;
					
    				$ass[]=floor($vvv['pmuch']*$bei*$income/100*$a['number']);		
    				
    				//dump($bei);	
    
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
    	//分红
		$m=	M('Order');
		
		$arr=$m->where(array('vid'=>session('uid')))->order('order_id desc')->select();
		$prooo=$m->where(array('vid'=>session('uid'),'gid'=>0,'buyer_status'=>1))->order('order_id desc')->select();
		//dump($prooo);		
		foreach($prooo as $k=>$v){
			$pppp=$this->pro->where(array('pid' => $v['pid'] ))->find();
			$ptime=$pppp['cycle']*24*60*60;
	//dump ($v['ftime']);
				if($ptime+$v['ftime']< time()){
					
				//echo $ptime+$v['fitme'].'<br>';
				
					$vipp=$this->model->where(array('vid'=>session('uid')))->find();
					$incomeme=$pppp['cycle']/365*$pppp['income']/100;
					$data=array('vid'=>session('uid'),'money'=>$v['order_money']+$vipp['money']+$v['order_money']*$incomeme);
					$datb=array('order_id'=>$v['order_id'],'ftime'=>'8888888888888','buyer_status'=>3);
					$this->model->create();
					$this->model->save($data);
				$m->create();
				
					
					$m->save($datb);
					}
				
		}	
   //资讯推荐
   		$zx=M('Zx');
   		$zxx=$zx->where(array('po'=>1))->select();
   		$this->assign('zxx',$zxx);
    	$this->display();
	
    }
}