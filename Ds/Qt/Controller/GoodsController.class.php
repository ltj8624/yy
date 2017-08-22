<?php
namespace Qt\Controller;
use Think\Controller;

class GoodsController extends Controller {
	public function __construct()
	{
		parent::__construct();
		$this->model = D('Goods');
		$this->order = D('Order');
		$this->vip = D('Vip');
		$this->record = D('VipRecord');
		$this->goods = D('Goods');
		$this->pro = D('Product');
	}
	public function goumai(){
		
		$where['time']=array('gt',time());
		$where['nowamout'] = array('gt',0);
		$arr=$this->model->where($where)->order('pid desc')->select();
		foreach ($arr as $k=>$v) {
			//$arr[$k]['uu']=$arr[$k]['income']*$arr[$k]['pmuch']/100;
			$arr[$k]['uu']=$arr[$k]['income'];

		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function sc(){
		//主页商品列表
		$goods=M('Goods');
		$agg=$goods->order('much desc')->select();		
		$arr=$goods->order('xl desc')->select();
		$this->assign('agg',$agg);
		$this->assign('arr',$arr);
		
		//轮播图
		$lbt=M('Lbt');
		$acc=$lbt->select();
		$this->assign('acc',$acc);
		//广告位
		$str=M('Access');
		$abb=$str->order('id desc')->limit(2)->select();
		$this->assign('abb',$abb);
		
		$this->display();
		
	}
	public function sc_xx(){
		$goods=M('Goods');
		$where['gid']=I('get.gid');
		$arr=$goods->where($where)->find();
		$min=$goods->where($where)->find();
		$this->assign($arr);
		//商品详情
		$min['minute']=htmlspecialchars_decode($min['minute']);
		//dump(htmlspecialchars_decode($min['minute']));exit;
		$this->assign($min);
	//商品图片
	$str=M('GoodsStyle');
	$data['gid']=I('get.gid');
	$data['del']=1;
	$acc=$str->where($data)->select();
	$this->assign('acc',$acc);
	//商品评价
		$stp=M('Order');
		$find=$stp->where(array('del'=>1,'gid'=>I('get.gid')))->limit(2)->select();
		$count=$stp->where(array('del'=>1,'gid'=>I('get.gid')))->select();
		$this->assign('app',$find);
		$this->assign('att',$count);
		$this->display();
	}
	
	
	//订单提交 产品
	public function goumai_ddlb(){
		if(session('uid')!='' ){
		$m=	M('Order');
		
		$arr=$m->where(array('vid'=>session('uid')))->order('order_id desc')->select();
		$goods=M('Goods');
		$acc=$goods->select();
		
		$product=M('Product');
		$app=$product->select();
		foreach ($arr as $k=>$a){
			foreach ($acc as $vv){
				if ($a['gid']==$vv['gid']){
					$arr[$k]['gname']=$vv['gname'];					
					$arr[$k]['photo']=$vv['photo'];
					$arr[$k]['money']=$vv['much']*$a['number']+$vv['kmuch'];
				}
			}
			foreach ($app as $vvv){
				if ($a['pid']==$vvv['pid']){
					$arr[$k]['pname']=$vvv['pname'];					
					$arr[$k]['pmoney']=$vvv['pmuch']*$a['number'];
					
				}
			} 			
		}

		$this->assign('arr',$arr);
		}else{
			$this->error('请登录',U('Qt/Login/dl'),1);
		}
		$this->display();
	}
	//商品订单列表
	public function dd(){
		if(session('uid')!='' ){
		$m=	M('Order');
		
		$arr=$m->where(array('vid'=>session('uid')))->order('order_id desc')->select();
				
		$goods=M('Goods');
		$acc=$goods->select();
		
		$product=M('Product');
		$app=$product->select();
		foreach ($arr as $k=>$a){
			foreach ($acc as $vv){
				if ($a['gid']==$vv['gid']){
					$arr[$k]['gname']=$vv['gname'];					
					$arr[$k]['photo']=$vv['photo'];
					$arr[$k]['money']=$vv['much']*$a['number']+$vv['kmuch'];
				}
			}
			foreach ($app as $vvv){
				if ($a['pid']==$vvv['pid']){
					$arr[$k]['pname']=$vvv['pname'];					
					$arr[$k]['pmoney']=$vvv['pmuch']*$a['number'];
					
				}
			} 			
		}
		
		$this->assign('arr',$arr);
		
	}else {
			$this->error('请登录',U('Qt/Login/dl'),1);
		}
		$this->display();
		
	}
	//购买商品
	public function dd_xx(){
		$goods=M('Goods');
		$where['gid']=I('get.gid');
		$arr=$goods->where($where)->find();

		$arr['vv']=$arr['much']+$arr['kmuch'];
		$m=	M('Vip');
		if (session('uid')=='') {
			$this->error('请登录',U('Qt/Login/dl'),1);
		}else{
			
		$uid=$m->where(array('vid'=>session('uid')))->find();
		$arr['uname']=$uid['name'];
		$arr['adds']=$uid['adds'];
		$this->assign($arr);
		if ($arr['adds']!='') {
			if(IS_POST){
				
				$where['vid'] = array('eq',session('uid'));
				$man=$this->vip->where($where)->find();
				if($this->order->addg($man)){
					 $this->error('订单提交成功',U('Qt/Goods/dd'),1);
					exit;
				}
			}
		}else {
			$this->error('请完善资料',U('Qt/User/zl'),1);
		}
		
		$this->display();
  	}
		
	}
	public function ajax(){
		$t = 1;
		echo $t;
	}
	public function dd_xx2(){
		$this->display();
	}
	
	public function ggdd(){	
			
		$this->redirect('Qt/Goods/zhifu',array('oid'=>I('post.order_id'),'money'=>I('post.money')));
	}
	//余额支付
	public function zhifu(){
		if(IS_POST){
			$pww=$this->vip->field('password,money')->where(array('vid'=>session('uid')))->find();
			if(md5(I('post.password')) == $pww['password']){
				$_POST['order_id'] = $_POST['oid'];
				$ore=$this->order->where(array('order_id'=>I('post.oid')))->find();
				if($ore['pid'] == 0){
					$gname=$this->goods->field('gname')->where(array('gid'=>$ore['gid']))->find();
					$name=$gname['gname'];
				}else{
					$gname=$this->pro->field('pname')->where(array('pid'=>$ore['pid']))->find();
					$name=$gname['pname'];
				}
				$_POST['buyer_status'] = 1;

				$data=array(
					'vid' => session('uid'),
						'money' => $pww['money']-I('post.money'),
				);
				$adda=array(
						'vid' => session('uid'),
						'type' => 1,
						'mode' => 1,
						'xname' => $name,
						'time' => time(),
						'number'=>$ore['number'],
						'money' => I('post.money'),
				);
				$this->order->create();
				$this->vip->create();
				$this->record->create();
				if($data['money']<0){
					$this->error('余额不足');
				}else{
					if($this->order->save($_POST) && $this->vip->save($data) && $this->record->add($adda)){
						 $this->redirect('Qt/Index/index');
						exit();
					}
				}
			}else{
				$this->error('密码错误');
			}
		}
		$this->assign('oid',I('get.oid'));
		$this->assign('money',I('get.money'));
		$this->display();
	}
	//支付方式
	public function zhifufangshi(){

			$where = array(
				'order_id'=>I('get.order_id')
			);
			$a = M('Order')->where($where)->find();
			
			if ($a['pid']==0) {
				$data['gid']=$a['gid'];
				$b = M('Goods')->where($data)->find();
				$this->assign('b',$b);
			}else {
				$data['pid']=$a['pid'];
				$b = M('Product')->where($data)->find();
				$this->assign('b',$b);
			}
			
// 			echo '<pre>';
// 			print_r($b['gname']);
// 			echo '</pre>';
// 			exit();
			
			$this->assign('a',$a);
			//echo '<pre>';
// 			print_r($a['order_money']);
// 			echo '</pre>';
// 			exit();
			$data['vid']=$_SESSION['uid'];
			$open=M('Vip')->where($data)->find();
			$openid=$open['openid'];
 			//echo '<pre>';
// 			print_r($openid);
// 			echo '</pre>';
// 			exit();
			$this->assign('openid',$openid);
		$this->display();
	}
	
	//评价
	public function pj(){
		
		$this->assign('oid',I('get.order_id'));
		if (IS_POST) {
			$_POST['order_id']=I('post.order_id');
			$str=M('Order');
			$str->create();
			
			if ($str->save()) $this->redirect('Qt/Index/index');
			
		}

		$this->display();
	}
}