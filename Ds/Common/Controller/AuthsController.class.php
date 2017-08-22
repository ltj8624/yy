<?php
namespace Common\Controller;

use Think\Controller;
use Think\Auth;
class AuthsController extends Controller{
 public function _initialize(){
        $uid=session("UID");
        if(!$uid){
            $this->error("非法操作，请登录...",U("Home/Login/login"));
        }
        //实例化Auth权限类
        $auth = new Auth();
        //检查当前用户所拥有的权限
       if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,$uid)){
           // 权限验证失败
           $this->error("权限不足");
           exit;
       }
  }
	
	
}