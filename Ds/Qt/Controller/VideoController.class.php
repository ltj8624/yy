<?php
namespace Qt\Controller;
use Think\Controller;

class VideoController extends Controller {
	public function mc(){
		$yangshe=D('Video')->where(array('did'=>0))->select();
		$this->assign('ys',$yangshe);
		$this->display();
	}
	public function mc_lb(){
		$yangshe=D('Video')->where(array('did'=>I('get.did')))->select();
		$this->assign('ys',$yangshe);
		$this->display();
	}
	public function mc_xx(){
		$ys=D('Video')->where(array('id'=>I('get.id')))->find();
		$this->assign($ys);
		$this->display();
	}
}