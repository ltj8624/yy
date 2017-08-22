<?php
namespace Qt\Controller;
use Think\Controller;

class NewsController extends Controller {
	//资讯
	public function zx(){
		$str=M('Zx');
		$arr=$str->select();
	
		foreach ($arr as $k=>$vv){
				
			$arr[$k]['page']=htmlspecialchars_decode($arr[$k]['page']);
			
		}
		//dump($arr[$k]['page']);exit;
			$this->assign('arr',$arr);
		$this->display();
	}
	//资讯详细
	public function zx_xx(){
		$str=M('Zx');
		$id=I('get.id');		
		$arr=$str->find($id);
		$arr['page']=htmlspecialchars_decode($arr['page']);
		$this->assign($arr);
		$this->display();
// 		echo '<pre>';
// 		print_r($arr);
// 		echo '</pre>';	
	}
	//产品保险
	public function cpbx(){
		$this->display();
	}
	//产品合同
	public function cpht(){
		$this->display();
	}
	//关于
	public function gy(){
		$str=M('Gy');
		$arr=$str->find();
		$arr['page']=htmlspecialchars_decode($arr['page']);
		$this->assign($arr);
		$this->display();
		
	}
	//报告
	public function baogao(){
		
		$this->display();
	
	}
	public function chengweimcz(){
		
		$this->display();
	
	}
}