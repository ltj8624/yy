<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/25
 * Time: 9:32
 */

namespace Home\Controller;


use Common\Controller\AuthsController;

class WorkExperienceController extends AuthsController
{
    protected $model;
    protected $product;
    protected $goods;
    public function __construct()
    {
        parent::__construct();
        $this->model = D('Order');
        $this->product = D('Product');
        $this->goods = D('Goods');
    }
    public function index(){
    	$order_sn = I('get.order_sn');
    	if ($order_sn != ''){
    		$where['order_sn'] = array('like','%'.$order_sn.'%');
    	}
        $where['del'] = 0;
       $arr=$this->model->getlist($where);
        $pro=$this->product->select();
        foreach ($arr['list'] as $k=>$v) {
//
            foreach ($pro as $vv) {
                if($v['pid'] == $vv['pid']){
                    $arr['list'][$k]['pname'] = $vv['pname'];
                    $arr['list'][$k]['order_money'] = $vv['pmuch']*$v['number'];
                }
            }
        }
        //产品订单总价
        $zhong=$this->model->where(array('del'=>0))->select();
        foreach ($zhong as $v) {
            foreach ($pro as $vv) {
                if($v['pid'] == $vv['pid']){
                    $zhongg[]=$vv['pmuch']*$v['number'];
                }
            }
        }

        $this->assign('zhong',array_sum($zhongg));
        //产品订单总数
        $count=$this->model->where(array('del'=>0))->count();
        $this->assign('count',$count);
        //分页
        $this->assign('arr',$arr['list']);
        $this->assign('show',$arr['show']);
        $this->display();
    }
    public function indexx(){
    	$order_sn = I('get.order_sn');
    	if ($order_sn != ''){
    		$where['order_sn'] = array('like','%'.$order_sn.'%');
    	}
        $where['del'] = 1;
        $arr=$this->model->getlist($where);
        $pro=$this->goods->select();
        foreach ($arr['list'] as $k=>$v) {
//
            foreach ($pro as $vv) {
                if($v['gid'] == $vv['gid']){
                    $arr['list'][$k]['pname'] = $vv['gname'];
                    $arr['list'][$k]['order_money'] = $vv['much']*$v['number']+$vv['kmuch'];
                }
            } 
        }
        //商品订单总价
        $zhong=$this->model->where(array('del'=>1))->select();
        foreach ($zhong as $v) {
            foreach ($pro as $vv) {
                if($v['gid'] == $vv['gid']){
                    $zhongg[]=$vv['much']*$v['number']+$vv['kmuch'];
                }
            }

        }
        $this->assign('zhong',array_sum($zhongg));
        
        //商品订单总数
        $count=$this->model->where(array('del'=>1))->count();
        $this->assign('count',$count);
        //分页
        $this->assign('arr',$arr['list']);
        $this->assign('show',$arr['show']);
        $this->display();
    }
    public function ajax(){
        $data=array(
          'order_id' => I('post.ids'),
            'status' => 1,
        );
        $this->model->create();
        if($this->model->save($data))
            $this->ajaxReturn(1);
    }
    public function zz(){
        $this->model->create();
        $data=array(
            'order_id' => I('post.ids'),
            'remark' => I('post.remark'),
        );
        if($this->model->save($data))
            $this->ajaxReturn(1);
    }
    
}