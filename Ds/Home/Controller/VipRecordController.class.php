<?php
namespace Home\Controller;
use Common\Controller\AuthsController;
class VipRecordController extends AuthsController{
	public function index(){
		$str=D('VipRecord');
		$where['type']=3;
		
		$arr=$str->getlist($where);
		
		$vip=M('Vip');
		
		$pro=$vip->select();
		foreach ($arr['list'] as $k=>$v) {
			 			
			foreach ($pro as $vv) {
				if($v['vid'] == $vv['vid']){
					$arr['list'][$k]['name'] = $vv['name'];
					$arr['list'][$k]['bank'] = $vv['bank'];
				}
				
			}
		}
				
		$this->assign('arr',$arr['list']);
		$this->assign('show',$arr['show']);
		$this->display();
// 		echo '<pre>';
// 		print_r($arr);
// 		echo '</pre>';
	}
public function ss(){
		$str=M('Vip');
		$svr=M('VipRecord');
		$sin=M('Infomation');
		if (I('post.act')=='qr') {
		$one=$str->where(array('vid'=>I('post.idv')))->find();
			
			$_POST['vid']=I('post.idv');			
			$_POST['money']=$one['money']-I('post.money');
					
			$ccc=array(
			'id'=>I('post.id'),
			'number'=>1,	
			);
			$fff=array(
			'vid'=>I('post.idv'),
			'time'=>time(),
			'count'=>'提现成功，请查收。提示：银行业务处理时间不同，请以实际到帐为准。',		
			);			
		}else {			
			$ccc=array(
					'id'=>I('post.id'),
					'number'=>2,
			);
			$fff=array(
					'vid'=>I('post.idv'),
					'time'=>time(),
					'count'=>'提现失败，请核对信息',
			);
		}				
		$svr->create();
		$str->create();
		$sin->create();
		if ($_POST!='') {
			$str->save() ;
		}
		if ($svr->save($ccc) && $sin->add($fff)) {
			echo 1;
		}
	} 
}