<?php
namespace Home\Controller;
use Common\Controller\AuthsController;
use Think\Image;

class GoodsController extends AuthsController{
	public function __construct(){
		//继承父类
		parent::__construct();
	
	
		$this->classStyle     = D("GoodsStyle");
	}
	public function index(){
			$str=D('Goods');
			$name = I('get.name');
			if ($name != ''){
				$where['gname'] = array('like','%'.$name.'%');
			}
			$arr=$str->getlist($where);
			foreach ($arr as $v){
						foreach ($v as $k=>$vv)	{		
					$arr['list'][$k]['minute']=htmlspecialchars_decode($arr['list'][$k]['minute']);
						}					
				}
			$this->assign('arr',$arr['list']);
			$this->assign('show',$arr['show']);
			
			$this->display();
		
		}
		
		public function add(){
			if(IS_POST){
				
				$dep=D('Goods');
				$ret=$dep->depadd();
				if($ret){
					echo $ret;
					//刷新
					$this->success('新增成功',U('Home/Goods/index'));
				}else {
					$ret=$dep->getError();
					//后退
					$this->error("新增失败 ErrorMsg: ".$ret);
				}
			}else {
				$this->display();
			}
		}	

		
		public function save(){		
			$good=D('Goods');
			if (IS_POST){
				//执行更新操作
				$ret=$good->Update();
// 				echo '<pre>';
// 				print_r($_POST);
// 				echo '</pre>';
// 				exit();
				if($ret){				
					$this->success('更新成功',U('Home/Goods/index'));
				}else {	
					$this->error('更新失败'.$good->getError());
				}
				
			}else{
				$gid=I('get.gid');
				$arr=$good->changeList($gid);					
				$this->assign($arr);//查询单独一条[0]
				$this->display();
			}
		}
		
		//物理删除
		public function delete(){
			$del=D('Goods');
			$ret=$del->dlt();
			if ($ret) {
				$this->success('删除成功',U('Home/Goods/index'));
			}else{
				$this->error("删除失败".$del->getError());
			}
		}
		
		//详情页
		public function details(){
			$arr['gid'] = I('get.gid');
			$modu = D('Goods');
			$uarr = $modu->where('gid='.$arr['gid'])->find();
			$this->assign('arr',$uarr);
			$this->display();
		}
		
		//******************班级风采****************
		//班级风采
		public function style(){
		
			$id = I("get.gid");
			if (!isset($id) || !is_numeric($id)) {
				 
				$this->error('班级风采获取失败！');
			}
			//获取已经上传的图片
			$list = $this->classStyle->get_img($id);
			$this->assign("list",$list);
			$this->assign("cid",$id);
			$this->display();
		}
		
		
		// 图片上传
		public function upload(){
			//接收参数
			$pic_name=isset($_GET['pic_name'])?$_GET['pic_name']:'';
			$config = array(
					'maxSize'    =>    0,
					'rootPath'   =>    './Public/',
					'savePath'   =>    'Uploads/',
					'saveName'   =>    array('uniqid',''),
					'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
					'autoSub'    =>    true,
					'subName'    =>    array('date','Ymd'),
			);
			$upload = new \Think\Upload($config);// 实例化上传类
			// 上传文件
			$info   = $upload->upload();
			 
			if(!$info) {// 上传错误提示错误信息
				die('{"flag" : "0"}');
			}else{// 上传成功 获取上传文件信息
				$arr['image_src']=$info['file']['savepath'].$info['file']['savename'];
				//将上传图片生产缩略图
				$img_url = $arr['image_src'];
				$image = new Image();
				$image->open($config['rootPath'].$img_url);
				$pos = strripos($img_url, '.');
				$jpg = explode('.', $img_url);
				$thumb = substr_replace($img_url, '_thumb.'.end($jpg), $pos);
				$image->thumb(200, 180)->save($config['rootPath'].$thumb);
		
				//将图片信息保存到数据库中
				$data['gid'] = I("get.id");
				$data['photo'] = $arr['image_src'];
				$data['create_time'] = time();
				$data['photo_thumb'] = $thumb;
				$this->classStyle->add($data);
				echo json_encode($arr);
				exit();
			}
		}
		
		
		//班级风采图片删除
		public function style_del(){
		
			$id = I("post.id");
			if (isset($id) && is_numeric($id)) {
		
				$where['id'] = $id;
				$list['del'] = 2;
				$flg = $this->classStyle->where($where)->save($list);
		
				if ($flg) {
					$data['sta'] = 1;
					$data['msg'] = '删除成功！';
					echo json_encode($data);
					exit;
				}
			}
		
			$data['sta'] = 0;
			$data['msg'] = '删除失败！';
			echo json_encode($data);
			exit;
		
		}	
		
		
		
		
}