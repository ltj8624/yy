<?php
namespace Qt\Controller;
use Think\Controller;
use Think\Upload;
use Common\Category\Alisms;


class UserController extends Controller {
	public function __construct()
	{
		parent::__construct();
		$this->model = D('Vip');
	}
	//资料
	public function zl(){
		if(IS_POST){

			/*上传开始*/
			$config = array(
					'mimes'    => array(), //允许上传的文件MiMe类型
					'maxSize'  => 0, //上传的文件大小限制 (0-不做限制)
					'exts'     => array('jpg', 'gif', 'png', 'jpeg'), //允许上传的文件后缀
					'autoSub'  => true, //自动子目录保存文件
					'subName'  => array('date', 'Ymd'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
					'rootPath' => './Public/', //保存根路径
					'savePath' => 'data/', //保存路径
			);
			$upload = new Upload($config);

			$info = $upload->upload();
			if (!$info) {// 上传错误提示错误信息
//				$this->error($upload->getError());
//				exit;
			} else {// 上传成功 获取上传文件信息
				foreach ($info as $file) {
					//$logo = 'yunlianjinyang.com/'.'Public/'.$file['savepath'] . $file['savename'];
					$logo = $file['savepath'] . $file['savename'];
				}
			}
			if($logo!='') {
				$_POST['idphoto'] = $logo;
			}
			if(strpos($_POST['idnumber'],'*')){
				unset($_POST['idnumber']);
			}
			
// 			echo '<pre>';
// 			print_r($_POST);
// 			echo '</pre>';
// 			exit();
			$this->model->create();	
					
			if($this->model->save()){
				$this->error('修改成功',U('Qt/User/zl'));
				exit();
			}else{
				$this->error('请选择操作对象');
			}
		}
		if (session('uid')!='' || session('openid')!=''){
			$where['vid']=session('uid');
			$ret=$this->model->where($where)->find();
			$ret['idnu'] = substr_replace($ret['idnumber'],'*****',2,12);
			$this->assign($ret);
			//dump($ret);exit;
		}else {
			$where['vid']=session('openid');
			$ret=$this->model->where($where)->find();
			$ret['idnu'] = substr_replace($ret['idnumber'],'*****',2,12);
			$this->assign($ret);
		}
						
		$this->display();
	}
	
	//身份认证
	public function sfrz(){
		$dep=D('Vip');
		if(IS_POST){					
			$_POST['vid']=session('uid');
			$_POST['sfrz']=1;
			$ret=$dep->depadd();			
			if($ret){				
				$this->redirect('Qt/User/zl');
			}else {
		
				$this->error("提交失败");
			}
		}else {
			$azz=$dep->where(array('vid'=>session('uid')))->find();		
			$this->assign($azz);
			$this->display();
		}		
	}
	
	
	public function regSms1()
	{
		$mobile = $_POST['mobile'];
		$code = $_POST['code'];

		//D('User')->sendSms($mobile,$code,'SMS_67100788');
		$this->sendSms1($mobile,$code,'SMS_67100788');
	}
	
	public function xgmm2(){
		if (IS_POST){
				
			//if ($_POST['验证码的name名']=='短信验证码') {
				$_POST['password']=md5($_POST['password']);
					
				$str=M('Vip');
				$where['mobile']=$_POST['mobile'];
				$arr=$str->where($where)->find();
				$_POST['vid']=$arr['vid'];
				$str->create();
				if ($str->save()){
					$this->redirect('Qt/user/zl');
				}else {
					$this->error('修改失败:手机号是否存在',U('Qt/user/zl'),1);
				}
					
			}
// 			else {
// 				$this->error('验证码错误');
// 			}
				
// 		}
		$this->display();
	}
	
	public function regSms()
	{
		$mobile = $_POST['mobile'];
		$code = $_POST['code'];

		//D('User')->sendSms($mobile,$code,'SMS_67100788');
		$this->sendSms($mobile,$code,'SMS_67100788');
	}
	
	public function xgmm(){
		
	
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
	
	
	function sendSms($mobile, $content, $time = '', $mid = '')
	{
		 //vendor("Alidayu.TopSdk");
		import("@.Alidayu.TopSdk");
		$c = new \TopClient();
		$c->appkey    = "23808157";
		$c->secretKey = "3f8f87653bc8c49f3b110ad813e496ab";
		$c ->format = "json";
		$req          = new \AlibabaAliqinFcSmsNumSendRequest;
		$req->setExtend("");
		$req->setSmsType("normal");
		$req->setSmsFreeSignName("云联金阳");
		$req->setSmsParam("{code:'".$content."',product:'云联金阳'}");
		$req->setRecNum($mobile);
		//$req->setRecNum('18612336366');
		$req->setSmsTemplateCode("SMS_67100788");
		$resp = $c->execute($req);
		// $result = (array)$resp['result'];
		// dump($resp);die;
		if($resp->result->success)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	function sendSms1($mobile, $content, $time = '', $mid = '')
	{
		 //vendor("Alidayu.TopSdk");
		import("@.Alidayu.TopSdk");
		$c = new \TopClient();
		$c->appkey    = "23808157";
		$c->secretKey = "3f8f87653bc8c49f3b110ad813e496ab";
		$c ->format = "json";
		$req          = new \AlibabaAliqinFcSmsNumSendRequest;
		$req->setExtend("");
		$req->setSmsType("normal");
		$req->setSmsFreeSignName("云联金阳");
		$req->setSmsParam("{code:'".$content."',product:'云联金阳'}");
		$req->setRecNum($mobile);
		//$req->setRecNum('18612336366');
		$req->setSmsTemplateCode("SMS_67100788");
		$resp = $c->execute($req);
		// $result = (array)$resp['result'];
		// dump($resp);die;
		if($resp->result->success)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}