<?php
namespace Qt\Controller;
use Think\Controller;
use Common\Category\Alisms;



class LoginController extends Controller {
	public function dl(){
		//<------------------------------登录页-------------------------------->
		if (IS_POST) {
			$admin=$_POST['mobile'];
			$pwd=$_POST['pwd'];
			if (empty($admin)||empty($pwd)) {
				$this->error('请输入用户名或密码!');
			}else{
				$vip=M("Vip");
				$where['mobile']=$admin;
				$where['pwd']=md5($pwd);
				$rt=$vip->where($where)->find();
				if($rt){
					session("uid",$rt['vid']);
					$this->redirect('Qt/Mr/mr');
				}else{
					$this->error('用户名或密码错误!');
				}				
			}
			
		}
		$this->display();
	
	}
	public function quit(){
	    session_unset();
        session_destroy();
        $this->redirect('Qt/Login/dl');   
	}
		

	public function zc(){
		$scode =I('get.scode');
		$this->assign('scode',$scode);
		//dump($scode);exit;
  		if(isset($_POST['submit'])){
			//dump($_POST);exit;
  	
            $data = $_POST;
            $data['pwd'] = md5($_POST['pwd']);
			$mobile = $_POST['mobile'];
			$data['scode'] = rand(1000,9999);
			$data['othercode'] = $_POST['othercode'];
			$data['sfrz'] = 0;
			//dump($data['othercode']);exit;
            $M = M('vip');
            if(!$data['mobile']) $this->error('账号不能为空');
            if(!$data['pwd']) $this->error('密码不能为空');
            if($_POST['pwd']!=$_POST['pwdd']) $this->error('两次密码不一致');
            //判断是否重名
            if($M->where(array('mobile'=>$data['mobile']))->find()) $this->error('账号已存在');
            $info = $M->add($data);
			//dump($data);exit;
            
            if($info){
                $this->success('注册成功',U('Qt/Login/dl'));
            }else{
                $this->error('注册失败请重试');
            }
            }else{
            	
            }
            $this->display();
        
}

	public function regSms()
	{
		$mobile = $_POST['mobile'];
		$code = $_POST['code'];
		//dump($mobile);exit;
		//用户是否存在
		$user = M('vip')->field('vid')->where(array('mobile'=>$mobile))->find();
		if(!$user)
		{
			//$Alisms = new Alisms();
			//$res = $Alisms->sendSms($mobile,$code,'SMS_66050294');
			D('Vip')->sendSms($mobile,$code,'SMS_66050294');
		    die('1');
		}
		else
		{
			die('2');
		}
	}
	public function regSms1()
	{
		$mobile = $_POST['mobile'];
		$code = $_POST['code'];
		
		D('Vip')->sendSms1($mobile,$code,'SMS_67100788');
		  
	}
	
	//忘记密码
	public function wjmm(){
		if (IS_POST){
				
			//if ($_POST['验证码的name名']=='短信验证码') {
			$_POST['pwd']=md5($_POST['pwd']);
				
			$str=M('Vip');
			$where['mobile']=$_POST['mobile'];
			$arr=$str->where($where)->find();
			$_POST['vid']=$arr['vid'];
			$str->create();
			if ($str->save()){
				$this->redirect('Qt/Login/dl');
			}else {
				$this->error('修改失败');
			}
				
		}
		// 			else {
		// 				$this->error('验证码错误');
		// 			}
			
		//}
		$this->display();
		
	}

    /**
     * 微信登陆重定向
     */
    public function redirec(){
        $this->display();
    }

	 /**
     * 用户登录，如果之前有，直接读取用户名信息，如果没有添加一个新用户
     */
    public function wxlogin(){
        //判断来源
        $this->loginReferer();
        $tools = new \Org\Wxpay\UserApi();
        $openId = $tools->GetOpenid();
        //dump($openId);exit;
		//dump(123456);exit;
        $wxInfo = $tools->getInfo();
        //dump($wxInfo);exit;
        if(!$wxInfo || isset($wxInfo['errcode'])){
            S('wxLoginWxInfo',$wxInfo);
            $this->error('登录出了点状况',U('index/index'));
        }
        $info = $wxInfo;
        //判断之前是否存储过用户资料
        $M = M('vip');
        $info = array_merge($info,$wxInfo);
        if(isset($info['headimgurl'])){
            $code = rand(1000,9999);
            $data['idphoto'] = $info['headimgurl'];
                //trim($info['headimgurl'],'0').'64';
            $data['nickname']=$info['nickname'];
            $data['scode'] = $code;
            $data['openid']=$openId;
			
        }

        $uInfo = $M->where(array("openid"=>$openId))->find();
        $_SESSION['uid'] = $uInfo['vid'];
        //dump($uInfo);exit;
        if(!empty($uInfo))
        {

            $data['nickname'] = $info['nickname'];
            $data['sex'] = $info['sex'];
            $data['scode'] = $code;
//             $data['mobile']=$info['mobile'];
            $data['idphoto']=$info['headimgurl'];
            //通过相同的openid获取用户信息  并将用户最新的微信信息更新到数据库内
            M('vip')->where(array('vid'=>$uInfo['vid']))->save($data);

        }
        else{
            //第一次登录 添加到用户表里面
            $name = creatName($info['nickname']);   //生成一个不重名的随机名字
            $data['nickname'] = $info['nickname'];
            $data['openid'] = $openId;
            $data['sex'] = $info['sex'];
            $data['scode'] = $code;
            $data['mobile']=$info['mobile'];
            $data['idphoto']=$info['headimgurl'];
			$data['sfrz'] = 0;
            $vid = $M->add($data);
            $_SESSION['uid'] = $M->where(array('vid'=>$vid))->getField('vid');

        }

        if(!empty($_SESSION['uid'])){

            $this->redirect('Qt/index/index');
        }else{
            $this->error('登录失败');
        }

    }

/**
     * 获取当前微信客户端里面的用户openid
     */
    public function getCurrentUserWxOpenid(){
        $tools = new \Org\Wxpay\JsApi();
        $openid = $tools->GetOpenid();
    }

	
	/**
     * 登录跳转
     */
    private function loginReferer(){
        $referer = $_SERVER['HTTP_REFERER'];
        $host = $_SERVER['HTTP_HOST'];
        $patten = "/^http:\/\/$host(\/index.php)?(.*)$/i";
        if(preg_match($patten,$referer,$arr)){
            $uri = $arr[2];
            if(!preg_match('/^user\/(.{0,3})login',$uri)){
                session('referer',$referer);
            }
        }
    }

  	
	
	/**
     * QQ 登录
     */
    public function qqlogin(){
        C('SHOW_PAGE_TRACE',false);
        $qq = new \Org\QQ\QQConnect();
        $openid = $qq->GetOpenid();
        //查找是否注册过
        $info = M('vip')->where(array('qq_openid'=>$openid))->find();
        if($info){
            foreach ($info as $k => $v) {
                session($k,$v);
            }
            $this->assign('openid',$openid);
            $this->success('登录成功',U('Mr/mr'));
        }else{
            //提示注册或者绑定账号
            $this->assign('openid',$openid);
            $this->display('qqLogin');
        }
    }
	

	public function gettoken(){
		$token=M("token");
		$rt=$token->find();
		if($rt['time']>time()){
			return $rt['token'];
		}else{
			$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxfee3b29e6b05017f&secret=8e89f62677509c417ea9860eff8c3d77";
			$json=https_request($url);
			$arr=json_decode($json,true);
			$data['token']=$arr['access_token'];
			$data['time']=time()+7000;
			$token->save($data);
			return $arr['access_token'];
		}
	}
	
	
}