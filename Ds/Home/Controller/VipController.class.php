<?php
namespace Home\Controller;
use Common\Controller\AuthsController;
class VipController extends AuthsController{
	public function index(){
		$str=D('Vip');
		$name = I('get.name');
		if ($name != ''){
			$where['name'] = array('like','%'.$name.'%');
		}
			$arr=$str->getlist($where);
			
			$this->assign('arr',$arr['list']);
			$this->assign('show',$arr['show']);
			
			$this->display();
	}
	
	//查看
	public function details(){
		$str=M('Vip');
		$where['vid']=I('get.vid');
		$arr=$str->where($where)->find();
		$this->assign($arr);
// 		echo '<pre>';
// 		print_r($arr);
// 		echo '</pre>';
		$this->display();
	}
	
	//物理删除
	public function delete(){
		$del=D('Vip');
		$ret=$del->dlt();
		if ($ret) {
			$this->success('删除成功',U('Home/Vip/index'));
		}else{
			$this->error("删除失败".$del->getError());
		}
	}
	//添加
	public function add(){
		if(IS_POST){
						
			$dep=D('Vip');			
			$ret=$dep->depadd();
			$_POST['pwd'] = md5($_POST['pwd']);
			if($ret){												
				$this->success('新增成功',U('Home/Vip/index'));
			}else {								
				$this->error("新增失败 ErrorMsg: ".$ret);
			}
		}else {
			$this->display();
		}
	}
	
	//修改
	public function save(){	
		$good=D('Vip');		
		if (IS_POST){
			//执行更新操作
			$ret=$good->Update();							
			if($ret){				
				$this->success('更新成功'.$ret.'条',U('Home/Vip/index'));
			}else {				
				$this->error('更新失败'.$good->getError());
			}
		}else{
			$vid=I('get.vid');
			$arr=$good->changeList($vid);				
			$this->assign($arr);//查询单独一条[0]
			$this->display();
		}
	}
	//意见
	public function yj(){
		$str=D('Vip');
		$name = I('get.name');
		if ($name != ''){
			$where['name'] = array('like','%'.$name.'%');
		}
		$arr=$str->getlist($where);
			
		$this->assign('arr',$arr['list']);
		$this->assign('show',$arr['show']);
		$this->display();
	}
	//身份认证
	public function sfrz(){
		$str=D('Vip');
				
		$name = I('get.name');
		if ($name != ''){
			$where['name'] = array('like','%'.$name.'%');
		}
		
		$arr=$str->getlist($where);
			
		$this->assign('arr',$arr['list']);
		$this->assign('show',$arr['show']);
		$this->display();
	}
	public function ss(){
		$str=M('Vip');
		$vipd=M('Infomation');
		if (I('post.act')=='qr') {
			$fff=array(
					'vid'=>I('post.id'),
					'time'=>time(),
					'count'=>'已通过认证，请查看',
			);
			$ddd=array(
			'vid'=>I('post.id'),
			'sfrz'=>2,
		);
		}else {
			$fff=array(
					'vid'=>I('post.id'),
					'time'=>time(),
					'count'=>'认证失败，请核对信息',
			);
			$ddd=array(
					'vid'=>I('post.id'),
					'sfrz'=>0,
			);
		}	
		$vipd->create();
		$str->create();
		if ($str->save($ddd) && $vipd->add($fff)) {
			echo 1;
		}		
	}
	
	
}