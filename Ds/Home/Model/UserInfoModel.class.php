<?php
namespace Home\Model;
use Think\Model;
use Think\Page;

class UserInfoModel extends Model{
	//自动完成************************************************************
	protected $_auto=array(
			array('pwd','md5',3,'function') ,
	
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
	
	//物理删除*********************************
	public function dlt(){
		$id=I('get.id');
		$where['id']=$id;
		$arr=$this->where($where)->delete();
		return $arr;
	}
	
	public function depadd(){
		
		if ($this->create()) {
			//执行数据新增方法
			
// 			$ret=$this->add();
// 			if($ret){
// 				$ret='更新成功'.$ret;
// 			}
			return $this->add();
		}
	}
	
	
	//数据修改*********************************************************
	public function Update(){
		
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