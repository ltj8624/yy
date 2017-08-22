<?php
namespace Qt\Controller;
use Think\Controller;

class KefuController extends Controller {
	public function kf(){
		$str=M('Kf');
		$arr=$str->find();
		$this->assign($arr);
		//echo '<pre>';
//		print_r($arr);
//		echo '</pre>';
//		exit();
		//常见问题
		$wt=M('Wt');
		$att=$wt->select();
		$this->assign('att',$att);
		$this->display();
	}
	public function ajax(){
		echo 1;
	}
	public function kefu(){
		$_POST['vid']=session('uid');
		$str=M('Vip');
		$str->create();
		if ($str->save()) $this->redirect('Qt/Kefu/kf');
		
// 		echo '<pre>';
// 		print_r($_POST);
// 		echo '</pre>';
	}
}