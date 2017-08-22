<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller{
	public function login(){
		//登录验证
		if(IS_POST){
		    $yzm=I("post.yzm",'');
			$y=new Verify();
			$rt=$y->check($yzm,1);
			if($rt){
				$user=M("UserInfo");
				$uname=I("post.uname",'');
				$upwd=md5(I("post.upwd"));
				$where['accounts']=$uname;
				$yh=$user->where($where)->find();
				if($yh){
					if($yh['pwd']==$upwd){
						session('UNAME',$uname);  //存储name
						session('UID',$yh['id']);//存储用户id
						$this->redirect("Index/index");
						exit;
					}else {
						$this->error("密码错误");
						exit;
					}
				}else {
					$this->error("无此用户");
					exit;
				}				
				exit;
			}else{
				$this->error("验证码错误");
				exit;
			}
		}
		$this->display();
	}
	public function yzm(){
	    $config =	array(
	        'codeSet'   =>  '2345678',             // 验证码字符集合
	        'useImgBg'  =>  false,           // 使用背景图片
	        'fontSize'  =>  25,              // 验证码字体大小(px)
	        'useCurve'  =>  false,            // 是否画混淆曲线
	        'useNoise'  =>  false,            // 是否添加杂点
	        'length'    =>  2,               // 验证码位数
	    );
		$yzm=new Verify($config);		 
		$yzm->entry(1);
	}
	public function quit(){
	    session_unset();
        session_destroy();
        $this->redirect('Home/Login/login');   
	}
}