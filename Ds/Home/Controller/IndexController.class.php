<?php
namespace Home\Controller;
use Common\Controller\AuthsController;

class IndexController extends AuthsController {
    public function index(){
        if ($_SESSION['UNAME'] == ''){
            $this->success('请登录。。。',U('Login/login'));
        }else {
            $this->display();
         }
    }
}