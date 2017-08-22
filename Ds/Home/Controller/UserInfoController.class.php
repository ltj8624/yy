<?php
namespace Home\Controller;
use Common\Controller\AuthsController;

class UserInfoController extends AuthsController{
	public function index(){
		$str=D('UserInfo');
			$name = I('get.name');
			if ($name != ''){
				$where['name'] = array('like','%'.$name.'%');
			}
			$arr=$str->getlist($where);
		
			$this->assign('arr',$arr['list']);
			$this->assign('show',$arr['show']);
			
			$this->display();
	}
	//物理删除
	public function delete(){
		$del=D('UserInfo');
		$ret=$del->dlt();
		if ($ret) {
			$this->success('删除成功',U('Home/UserInfo/index'));
		}else{
			$this->error("删除失败".$del->getError());
		}
	}
	
	public function add(){
		if(IS_POST){
	
			$dep=D('UserInfo');
			$ret=$dep->depadd();
			if($ret){
			$grp=D('AuthGroupAccess');
			$grp->create();
				$data['uid'] = $ret;	
				$data['group_id'] = I('post.qnmb');
				$grp->add($data);
				//刷新
				$this->success('新增成功',U('Home/UserInfo/index'));
			}else {
				$ret=$dep->getError();
				//后退
				$this->error("新增失败 ErrorMsg: ".$ret);
			}
		}else {
			$dap=D('AuthGroup');
			$darr=$dap->select();
			$this->assign('darr',$darr);
			$this->display();
		}
	}
	
	
	public function save(){
	
		$good=D('UserInfo');
		if (IS_POST){
			//执行更新操作
			$ret=$good->Update();
			// 				echo '<pre>';
			// 				print_r($_POST);
			// 				echo '</pre>';
			// 					exit();
			if($ret){
				//echo $ret;
				//刷新
				$this->success('更新成功'.$ret.'条',U('Home/UserInfo/index'));
			}else {
				//echo $good->getError();
				//后退
					
				$this->error('更新失败'.$good->getError());
			}
		}else{
			$id=I('get.id');
			$arr=$good->changeList($id);
				
			$this->assign($arr);//查询单独一条[0]
			$this->display();
		}
	}
	
}