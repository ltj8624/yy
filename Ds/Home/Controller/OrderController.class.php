<?php
namespace Home\Controller;
use Common\Controller\AuthsController;

class OrderController extends AuthsController{

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
    	$name = I('get.buyer_name');
    	if ($name != ''){
    		$where['buyer_name'] = array('like','%'.$name.'%');
    	}
        $where['del'] = 0;
        
       $arr=$this->model->getlist($where);
       
        $pro=$this->product->select();
        foreach ($arr['list'] as $k=>$v) {
        	
            $zhong[]=$v['order_money'];
            foreach ($pro as $vv) {
                if($v['pid'] == $vv['pid']){
                    $arr['list'][$k]['pname'] = $vv['pname'];
                }
            }
            foreach ($pro as $aa) {
            	if($v['pid'] == $aa['pid']){
					if($aa['cycles'] == 2){
            		$arr['list'][$k]['cycle'] = $aa['cycle'].'天';
					}else{
						$ar=$aa['cycle']/30;
						$arr['list'][$k]['cycle'] =$ar.'月' ;
						}
            	}
            }
            foreach ($pro as $bb) {
            	if($v['pid'] == $bb['pid']){
					if($aa['cycles'] == 2){
            		$arr['list'][$k]['ztime'] = $bb['ztime'].'天';
					}else{
						$are=$bb['ztime']/30;
						$arr['list'][$k]['ztime'] =$are.'月' ;
						}
            		
            	}
            }
            foreach ($pro as $cc) {
            	if($v['pid'] == $cc['pid']){
            		$arr['list'][$k]['ftime']=$arr['list'][$k]['cycle']*24*60*60+$arr['list'][$k]['create_time'];
            	}
            }
        }
       
        $this->assign('zhong',array_sum($zhong));
        $count=$this->model->count();
        $this->assign('count',$count);
        $this->assign('arr',$arr['list']);
//         echo '<pre>';
//         print_r($arr['list']);
//         echo '</pre>';
        $this->assign('show',$arr['show']);
        $this->display();
    }
}