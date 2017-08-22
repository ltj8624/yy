<?php
namespace Home\Controller;
use Common\Controller\AuthsController;
class WtController extends AuthsController{
	public function index(){
		$str=M('Wt');
		$arr=$str->select();
		$this->assign('arr',$arr);
	
		$this->display();
	
	}
	public function save(){
		$str=M('Wt');
		$where['id']=I('get.id');
		$arr=$str->where($where)->find();
		if (IS_POST) {
			$ret=$str->create();
			$ret=$str->save($_POST);
			if($ret){
				$this->success('更新成功',U('Home/Wt/index'));
			}else {
				$this->error('更新失败'.$str->getError());
			}
		}
	
		$this->assign($arr);
		$this->display();
	}
	public function add(){
		$str=M('Wt');
		$arr=$str->select();
		if (IS_POST) {
			$ret=$str->create();
			$ret=$str->add($_POST);
			if($ret){
				$this->success('添加成功',U('Home/Wt/index'));
			}else {
				$this->error('添加失败'.$str->getError());
			}
	}
		
	$this->assign($arr);
	$this->display();
						
	}
	//物理删除
	public function delete(){
		$wt=M('Wt');
		$where['id']=I('get.id');;
		$arr=$wt->where($where)->delete();
		
		if ($arr) {
			$this->success('删除成功',U('Home/Wt/index'));
		}else{
			$this->error("删除失败");
		}
	}
	
}