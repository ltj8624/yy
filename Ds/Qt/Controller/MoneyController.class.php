<?php
namespace Qt\Controller;
use Think\Controller;

class MoneyController extends Controller {
	public function __construct()
	{
		parent::__construct();
		$this->model = D('Vip');
		$this->record = D('VipRecord');
	}

	//钱包
	public function qb(){

	
	
	$qian=$this->model->where(array('vid'=>session('uid')))->find();
		$qian['card'] = substr_replace($qian['bank'],'****',4,12);
		if ($qian['money']=='') {
			$qian['money']=0;
		}
		$this->assign($qian);
		$this->assign($qian['money']);
		
		$str=M('VipRecord');
		$where['type'] = array('neq',2);
		$where['vid'] = array('eq',session('uid'));
		$wheres['type'] = array('eq',2);
		$wheres['vid'] = array('eq',session('uid'));
		$axf=$str->where($where)->select();
		$acz=$str->where($wheres)->select();
		$arr=$str->where(array('vid' => session('uid')))->select();
		$this->assign('axf',$axf);
		$this->assign('acz',$acz);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function tixian(){
		
		$str=M('Vip');
		$arr=$str->where(array('vid'=>session('uid')))->find();
		
		//if($arr['bank']!='' ){
//			$this->assign($arr);
//			}
		$this->assign($arr);
		$this->display();
	}

	public function tixian2(){
		
			$str=M('Vip');
			$acc=$str->where(array('vid'=>session('uid')))->find();
			if($acc['bank']=='' ){
			$this->error('请添加银行卡',U('Qt/Money/qb'),1);
		}else{
			if ($acc['money']<I('post.money')){
				$this->error('余额不足');
				exit();
			}
			$this->assign('money',I('post.money'));
		}
			$this->display();
		
		
	}
	
	//支付
	public function zf(){
		$str=M('Vip');
		$acc=$str->where(array('vid'=>session('uid')))->find();
		if (md5(I('post.password'))==$acc['password']) {
			$bb=array(
					'vid'=>session('uid'),
					'type'=>3,
					'mode'=>1,
					'money'=>I('post.money'),
					'xname'=>'提现',
					'time'=>time(),
					'number'=>0,					
			);
		$svv=M('VipRecord');
		
			$svv->create();
			if ($svv->add($bb)) {
				 $this->error('提现申请成功',U('Qt/Money/tixian'),1);
			}
		}else{
			$this->error('密码错误',U('Qt/Money/tixian'),1);
			}
	}
	
	//银行卡
	public function yhk(){
		if(IS_POST){
			$vip=$this->model->where(array('vid'=>session('uid')))->find();
			$_POST['vid'] = session('uid');
//			echo '<pre>';
//			print_r($vip);
//			echo '</pre>';
//			exit();
			$this->model->create();

				if($this->model->save()) {
					 $this->redirect('Qt/Money/qb');
					exit();
				}
			}

		$vip=$this->model->where(array('vid'=>session('uid')))->find();
		$this->assign($vip);
		$this->display();
	}
	
	//充值
	public function chongzhi(){
		$mlist=M('Mlist');
		$acc=$mlist->select();
		$this->assign('acc',$acc);
		//dump($acc);exit;
		
		$str=M('Vip');
		$arr=$str->where(array('vid'=>session('uid')))->find();
		$this->assign('arr',$arr);
	//dump($arr);exit;
		$this->display();
	}
	public function poo(){
		
	}
}