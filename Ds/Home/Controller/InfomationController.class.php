<?php
namespace Home\Controller;
use Common\Controller\AuthsController;
class InfomationController extends AuthsController{
	protected $model;
	protected $vip;
	
	public function __construct()
	{
		parent::__construct();
		$this->model = D('Infomation');
		$this->vip = D('Vip');
		
	}
	public function index(){
		
		$name = I('get.name');
		if ($name != ''){
			$where['name'] = array('like','%'.$name.'%');
		}
		$arr=$this->model->getlist($where);
		$pro=$this->vip->select();
		foreach ($arr['list'] as $k=>$v) {
			 
			foreach ($pro as $vv) {
				if($v['vid'] == $vv['vid']){
					$arr['list'][$k]['name'] = $vv['name'];
				}
			}							
		}
		$count=$this->model->count();
		$this->assign('count',$count);
		$this->assign('arr',$arr['list']);
// 		echo '<pre>';
// 		print_r($arr['list']);
// 		echo '</pre>';
		$this->assign('show',$arr['show']);
		$this->display();
	}
	
	
	public function add(){
		$vip=M("Vip");
		$varr=$vip->select();
		$this->assign("varr",$varr);
		if(IS_POST){			
			$dep=D('Infomation');
			$ret=$dep->depadd();
			if($ret){
				echo $ret;
				//刷新
				$this->success('新增成功',U('Home/Infomation/index'));
			}else {
				$ret=$dep->getError();
				//后退
				$this->error("新增失败 ErrorMsg: ".$ret);
			}
		}else {
			$this->display();
		}
	}
	
	public function delete(){
		$str=M('Infomation');
		$id=I('get.id');
	
		if ($str->delete($id)) {
			$this->success('删除成功',U('Home/Infomation/index'));
		}else{
			$this->error("删除失败");
		}
	}
	
	public function save(){
	
		$good=D('Infomation');
		if (IS_POST){
			//执行更新操作
			$ret=$good->Update();
			if($ret){
				$this->success('更新成功'.$ret.'条',U('Home/Infomation/index'));
			}else {
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