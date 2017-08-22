<?php
namespace Home\Controller;
use Common\Controller\AuthsController;

use Think\Upload;
class VideoController extends AuthsController{
		public function index(){
			$str=D('Video');
			$name = I('get.vname');
			if ($name != ''){
				$where['vname'] = array('like','%'.$name.'%');
			}
			$where['did'] = array('neq',0);
			$arr=$str->getlist($where);
		
			$this->assign('arr',$arr['list']);
			$this->assign('show',$arr['show']);
			
			$this->display();
		}
	
	
	public function add(){				
		if(IS_POST){
			
			$dep=D('Video');
			$ret=$dep->depadd();
			if($ret){
				//刷新
				$this->success('新增成功',U('Home/Video/index'));
			}else {
				$ret=$dep->getError();
				//后退
				$this->error("新增失败 ErrorMsg: ".$ret);
			}
		}else {
			$yarr=D('Video')->where(array('did'=>0))->select();
			$this->assign('yarr',$yarr);
			$this->display();
		}
		
	}
	
	public function save(){	
		$good=D('Video');
		if (IS_POST){
			//执行更新操作
			$ret=$good->Update();
			if($ret){
				$this->success('更新成功',U('Home/Video/index'));
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
	public function saved(){	
		$good=D('Video');
		if (IS_POST){
			//执行更新操作
			$ret=$good->Update();
			if($ret){
				$this->success('更新成功',U('Home/Video/index'));
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
	
	//物理删除
	public function delete(){
		$del=D('Video');
		$ret=$del->dlt();
		if ($ret) {
			$this->success('删除成功',U('Home/Video/index'));
		}else{
			$this->error("删除失败".$del->getError());
		}
	}
	//羊舍物理删除
	public function dele(){
		$del=D('Video');
		$yarr=D('Video')->where(array('did'=>I('get.id')))->select();
		if($yarr['0'] != ''){
	
			$this->error('删除失败，请将该羊舍内视频清空后再操作',U('Home/Video/indexd'));
		}else{
		$ret=$del->dlt();
		}
		if ($ret) {
			$this->success('删除成功',U('Home/Video/indexd'));
		}else{
			$this->error("删除失败".$del->getError());
		}
	}
	
	public function indexd(){
		
		$str=D('Video');
			$name = I('get.vname');
			if ($name != ''){
				$where['vname'] = array('like','%'.$name.'%');
			}
			$where['did'] = array('eq',0);
			$arr=$str->getlist($where);
		
			$this->assign('arr',$arr['list']);
			$this->assign('show',$arr['show']);
			
		$this->display();
		}
	public function dadd(){
		if(IS_POST){
			/*上传开始*/
			$config = array(
					'mimes'    => array(), //允许上传的文件MiMe类型
					'maxSize'  => 0, //上传的文件大小限制 (0-不做限制)
					'exts'     => array('jpg', 'gif', 'png', 'jpeg'), //允许上传的文件后缀
					'autoSub'  => true, //自动子目录保存文件
					'subName'  => array('date', 'Ymd'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
					'rootPath' => './Public/', //保存根路径
					'savePath' => 'data/', //保存路径
			);
			$upload = new Upload($config);

			$info = $upload->upload();
			if (!$info) {// 上传错误提示错误信息
//				$this->error($upload->getError());
//				exit;
			} else {// 上传成功 获取上传文件信息
				foreach ($info as $file) {
					//$logo = 'yunlianjinyang.com/'.'Public/'.$file['savepath'] . $file['savename'];
					$logo = $file['savepath'] . $file['savename'];
					
				}
				$_POST['photo']=$logo;
			}
			$_POST['did'] = 0;
			$_POST['time'] = time();
			M('Video')->create();
			if(M('Video')->add()){
				$this->success('添加成功');
				}
			}
		$this->display();
		}
	
	
}