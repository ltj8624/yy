<?php
namespace Qt\Controller;
use Think\Controller;

class ContController extends Controller {
	public function ht(){
		$arr=M('Ht');
		$str=$arr->where(array('vid'=>session('uid')))->select();
		$this->assign('arr',$str);
		$this->display();
	}

	

}