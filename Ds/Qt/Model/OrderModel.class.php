<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 16:00
 */

namespace Qt\Model;


use Think\Model;

class OrderModel extends Model
{
     
    public function addd($man){
        $_POST['buyer_name'] = $man['name'];
        $_POST['tel'] = $man['mobile'];
        $_POST['adds'] = $man['adds'];
       $_POST['order_money']=$_POST['number']*$_POST['pmuch'];
       $_POST['price']=$_POST['pmuch'];
		$_POST['vid'] = session('uid');
		
        $_POST['order_sn'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $ato=array(
        		array('status','0'),
        		array('buyer_status','0'),
        		array('del','0'),
        		array('g_style','0'),
        		array('remark','无'),
        		array('create_time','time',1,'function'),
				array('ftime','time',1,'function'),
        );
        $this->auto($ato)->create();
        $pro=D('product');
        $pro->create();
       $now= $pro->field('nowamout')->where(array('pid'=>$_POST['pid']))->find();
        $aa=$now['nowamout']-$_POST['number'];
        
        $data=array(
            'pid' => $_POST['pid'],
            'nowamout' => $aa,
        );
        $pro->save($data);
       return  $this->add();
    }
    
    public function addg($man){
    	$_POST['buyer_name'] = $man['name'];
    	$_POST['tel'] = $man['mobile'];
    	$_POST['adds'] = $man['adds'];
    	$_POST['order_money']=$_POST['number']*$_POST['much']+$_POST['kmuch'];
    	$_POST['price']=$_POST['much'];
		$_POST['vid'] = session('uid');
    	$_POST['order_sn'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    	$ato=array(
    			array('status','2'),
    			array('buyer_status','0'),
    			array('del','1'),
    			array('g_style','0'),
    			array('remark','无'),
    			array('create_time','time',1,'function'),

    	);
    	$this->auto($ato)->create();
    	
    	$pro=D('Goods');
    	
    	$pro->create();
    	$now= $pro->field('nowamout')->where(array('gid'=>$_POST['gid']))->find();
    	$aa=$now['nowamout']-$_POST['number'];
    	
    	
    	$data=array(
    			'gid' => $_POST['gid'],
    			'nowamout' => $aa,
    	);
    	$pro->save($data);
    	return  $this->add();
    }
}