<?php
namespace Home\Controller;
use Common\Controller\AuthsController;


class KfController extends AuthsController{
	public function index(){
		$str=M('Kf');		
		$arr=$str->find();	
		$this->assign($arr);
				
		$this->display();
	
	}
	public function save(){
		$str=M('Kf');
		$where['id']=I('get.id');
		$arr=$str->where($where)->find();
		if (IS_POST) {
			$ret=$str->create();
			$ret=$str->save($_POST);
			if($ret){
				$this->success('更新成功',U('Home/Kf/index'));
			}else {
				$this->error('更新失败'.$str->getError());
			}
		}

		$this->assign($arr);
		$this->display();
	}
}