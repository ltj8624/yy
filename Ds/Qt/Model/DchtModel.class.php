<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/19
 * Time: 0:36
 */

namespace Qt\Model;


use Think\Model;

class DchtModel extends Model
{

    public function addd($man){
        unset($_POST);
        $_POST['jname'] = "黑龙江政兴农业有限公司";
        $_POST['yname'] = $man['name'];
        $_POST['phone'] = $man['mobile'];
        $_POST['number'] = $man['number'];
        $_POST['idnumber'] = $man['idnumber'];
        $_POST['money']= $man['money'];
        $_POST['cycle']=$man['cycle'];
        $_POST['earnings']=$man['earnings'];
        $_POST['order_sn']=$man['order_sn'];
		$_POST['pmoney']=$man['pmoney'];
        $_POST['pp']=$man['pp'];
        $_POST['vid'] = session('uid');



        $this->create();
//        $pro=D('product');
//        $pro->create();
//        $now= $pro->field('nowamout')->where(array('pid'=>$_POST['pid']))->find();
//        $aa=$now['nowamout']-$_POST['number'];
//
//        $data=array(
//            'pid' => $_POST['pid'],
//            'nowamout' => $aa,
//        );
//        $pro->save($data);
        return  $this->add();
    }
}