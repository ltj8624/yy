<?php
namespace Home\Controller;
use Common\Controller\AuthsController;
use Think\Upload;
class HtController extends AuthsController{
	protected $model;
	protected $vip;
	protected $order;
	protected $product;
	public function __construct()
	{
		parent::__construct();
		$this->model = D('Ht');
		$this->vip = D('Vip');
		$this->order = D('Order');
		$this->product = D('Product');

	}
	public function ht(){
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
				$this->error($upload->getError());
				exit;
			} else {// 上传成功 获取上传文件信息
				foreach ($info as $file) {
					$logo = $file['savepath'] . $file['savename'];
				}
			}
			$_POST['photo'] = $logo;
			/*上传结束*/
			$dep=D('Ht');
			$ret=$dep->depadd();
			if($ret){
				echo $ret;
				//刷新
				$this->success('新增成功',U('Home/Ht/ht'));
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
		$str=M('Ht');
		$id=I('get.id');

		if ($str->delete($id)) {
			$this->success('删除成功',U('Home/Ht/ht'));
		}else{
			$this->error("删除失败");
		}
	}

	public function save(){
	
		$good=D('Ht');
		if (IS_POST){
			//执行更新操作
			$ret=$good->Update();
			if($ret){
				$this->success('更新成功'.$ret.'条',U('Home/Ht/ht'));
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

	//合同详情
// 	public function cpht(){

// 		 $where['vid']=I('get.vid');
// 		 $where['order_id']=I('get.order_id');
// 		 $arr=$this->model->getlist($where);
			
// 		$order=$this->order->select();
// 		$vip=$this->vip->select();
// 		$product=$this->product->select();
// 		foreach ($arr['list'] as $k=>$v) {
	
// 			foreach ($order as $vv) {
// 				//姓名 数量 编号
// 				if($v['id'] == $vv['order_id']){
// 					$arr['list'][$k]['buyer_name'] = $vv['buyer_name'];
// 					$arr['list'][$k]['number'] = $vv['number'];
// 					$arr['list'][$k]['order_sn'] = $vv['order_sn'];
					
// 				}
// 			}

// 			foreach ($vip as $pp){
// 				if($v['vid'] == $pp['vid']){
// 					$arr['list'][$k]['mobile'] = $pp['mobile'];
// 					$arr['list'][$k]['name'] = $pp['name'];
// 					$arr['list'][$k]['idnumber'] = $pp['idnumber'];
// 				}
// 			}
			
// 			foreach ($product as $tt){
// 				if($v['pid'] == $tt['pid']){
// 					$arr['list'][$k]['ymoney'] = $tt['pmuch']*$tt['income']/100;
// 					$arr['list'][$k]['cycle'] =$tt['cycle'];
// 				}
// 			}
// 		}
			
	
// 		$this->assign('arr',$arr['list']);
// // 		echo '<pre>';
// // 		print_r($arr['list']);
// // 		echo '</pre>';
// 		$this->assign('show',$arr['show']);
// 		$this->display();
// 	}





}