<?php
namespace Home\Controller;
use Common\Controller\AuthsController;

class AccessController extends AuthsController {
	public function index(){
		$str=D('Access');
// 			$name = I('get.name');
// 			if ($name != ''){
// 				$where['gname'] = array('like','%'.$name.'%');
// 			}
			$arr=$str->getlist();
		
			$this->assign('arr',$arr['list']);
			$this->assign('show',$arr['show']);
			
			$this->display();
	}
	
	public function add(){
		if(IS_POST){
	
			$dep=D('Access');
			$ret=$dep->depadd();
			if($ret){
				
				//刷新
				$this->success('新增成功',U('Home/Access/index'));
			}else {
				$ret=$dep->getError();
				//后退
				$this->error("新增失败 ErrorMsg: ".$ret);
			}
		}else {
			$this->display();
		}
	}
	
	
	public function save(){
		$access=D('Access');
		if (IS_POST){
			//执行更新操作
			$ret=$access->Update();
			// 				echo '<pre>';
			// 				print_r($_POST);
			// 				echo '</pre>';
			// 				exit();
			if($ret){
				$this->success('更新成功',U('Home/Access/index'));
			}else {
				$this->error('更新失败'.$access->getError());
			}
	
		}else{
			$id=I('get.id');
			$arr=$access->changeList($id);
			$this->assign($arr);//查询单独一条[0]
			$this->display();
		}
	}
	
	//物理删除
	public function delete(){
		$del=D('Access');
		$ret=$del->dlt();
		if ($ret) {
			$this->success('删除成功',U('Home/Access/index'));
		}else{
			$this->error("删除失败".$del->getError());
		}
	}
	
}