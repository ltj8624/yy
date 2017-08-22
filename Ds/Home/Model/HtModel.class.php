<?php
namespace Home\Model;


use Think\Model;
use Think\Page;
use Think\Upload;

class HtModel extends Model{
	//自动完成************************************************************
	protected $_auto=array(
			array('time','time',3,'function'),
	);
	
		public function getlist($where=''){
			//获取查询列表的总条数
			$count = $this->count();
			$ln = 10;
			//实例化分页类
			$page = new Page($count,$ln);
			//自定义分页样式---开始
			$page->setConfig('first','首页');
			$page->setConfig('prev','上一页');
			$page->setConfig('next','下一页');
			$page->setConfig('last','尾页');
			$page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$ln.' 条/页 共 %TOTAL_ROW% 条)');
			//自定义分页样式---结尾
			$show = $page->show();//显示分页信息
			$list = $this->where($where)
			//                      ->limit($page->firstRow.','.$page->listRows)
			->page(I('get.p'),$ln)
			->order('id desc')->select();
			//将分页信息以及页面显示的列表信息组装成返回的数组
			$rtn['list'] = $list;
			$rtn['show'] = $show;
			return $rtn;
		}
		public function depadd(){
			
			if ($this->create()) {
				//执行数据新增方法
				$ret=$this->add();
				if($ret){
					$ret='更新成功'.$ret;
				}
				return $ret;
			}
		}
		
		//数据修改*********************************************************
		public function Update(){
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
			if ($info) {// 上传成功 获取上传文件信息
				foreach ($info as $file) {
					$logo = $file['savepath'] . $file['savename'];
					$_POST['photo'] = $logo;
				}
			}
			
			/*上传结束*/
			if ($this->create()) {
				$ret=$this->save();
				if($ret){
					$ret='更新成功'.$ret;
				}
			}
			return $ret;
		}
		
		//修改**********************************
		public function changeList($id){
			$ini=array();
			if(!empty($id)){
				$ini['id']=$id;
			}
			$arr=$this->where($ini)->find();
			return $arr;
		}
		
		

}