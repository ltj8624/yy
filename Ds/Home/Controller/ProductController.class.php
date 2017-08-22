<?php
namespace Home\Controller;
use Common\Controller\AuthsController;

class ProductController extends AuthsController{
//列表
public function index(){
			$str=D('Product');
			$name = I('get.pname');
			if ($name != ''){
				$where['pname'] = array('like','%'.$name.'%');
			}
			$arr=$str->getlist($where);
			$this->assign('arr',$arr['list']);
			$this->assign('show',$arr['show']);
			
			$this->display();
		
		}
		//添加
		public function add(){
			if(IS_POST){
				
				$dep=D('Product');
				$ret=$dep->depadd();
				if($ret){
					echo $ret;
					//刷新
					$this->success('新增成功',U('Home/Product/index'));
				}else {
					$ret=$dep->getError();
					//后退
					$this->error("新增失败 ErrorMsg: ".$ret);
				}
			}else {
				$this->display();
			}
		}	

		//修改
		public function save(){
		
			$good=D('Product');
			
			if (IS_POST){
				//执行更新操作
				$ret=$good->Update();
				//dump($_POST);exit();
				
				if($ret){
					$this->success('更新成功'.$ret.'条',U('Home/Product/index'));
				}else {
					$this->error('更新失败'.$good->getError());
				}
			}else{
				$pid=I('get.pid');
				$arr=$good->changeList($pid);					
				$this->assign($arr);//查询单独一条[0]
				$this->display();
			}
		}
		
		//物理删除
		public function delete(){
			$del=D('Product');
			$ret=$del->dlt();
			if ($ret) {
				$this->success('删除成功',U('Home/Product/index'));
			}else{
				$this->error("删除失败".$del->getError());
			}
		}
		//详情页
		public function details(){
			$arr['pid'] = I('get.pid');
			$modu = D('Product');
			$uarr = $modu->where('pid='.$arr['pid'])->find();
			//剩余时间
			$uarr['nowtime']=$uarr['time']/60/60/24-time()/60/60/24;
			$uarr['nowtime']=round($uarr['nowtime']);
			$this->assign('arr',$uarr);
			$this->display();
		}	
}