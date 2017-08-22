<?php
namespace Qt\Controller;
use Think\Controller;

class InformationController extends Controller {
	public function xx(){
		$str=M('Infomation');
		$where['vid']=array('eq',session('uid'));
		
		$arr=$str->where($where)->select();
		$this->assign('arr',$arr);
		
		$this->display();
	}

	


}