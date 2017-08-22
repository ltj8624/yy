<?php
namespace Qt\Controller;
use Think\Controller;

class TgController extends Controller {
public function tg(){
	
		$scode = I('scode');
		//dump($code);exit;
		$this->assign('scode',$scode);
		$this->display();
	}
}