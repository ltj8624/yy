<?php
namespace Home\Controller;
use Common\Controller\AuthsController;
use Think\Upload;

class LbtController extends AuthsController {
	public function index(){
		$str=M('Lbt');
		$arr=$str->select();
		$this->assign('arr',$arr);
		$this->display();
	}
	
	public function add(){
	
		/*上传结束*/
		if (IS_POST) {
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
				
			$str=M('Lbt');
			if ($str->create()) {
				if ($str->add()) {
					$this->success('新增成功',U('Home/Lbt/index'));
						
				} else {
					$this->error("新增失败 ErrorMsg: ");
				}
			}else {
	
			}
		}
		$this->display();
	}
	
	public function save(){
	
		$good=D('Lbt');
	if (IS_POST){
			//执行更新操作
			$ret=$good->Update(); 	
			
									
			if($ret){
				//刷新
				$this->success('更新成功'.$ret.'条',U('Home/Lbt/index'));
			}else {				
				//后退					
				$this->error('更新失败'.$good->getError());
			}
		}else{
			
			$bid=I('get.bid');
			$arr=$good->changeList($bid);				
			$this->assign($arr);//查询单独一条[0]
			$this->assign('bid',$bid);
			$this->display();
		}
		
	}
	
public function delete(){
		$str=M('Lbt');
		$bid=I('get.bid');
		
		if ($str->delete($bid)) {
			$this->success('删除成功',U('Home/Lbt/index'));
		}else{
			$this->error("删除失败");
		}
	}
	
	
}