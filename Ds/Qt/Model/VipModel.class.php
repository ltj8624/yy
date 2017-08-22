<?php
namespace Qt\Model;
use Think\Model;
use Think\Upload;

class VipModel extends Model{
	
	
	
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
		$req->setSmsTemplateCode("SMS_66050294");
		$resp = $c->execute($req);
		// $result = (array)$resp['result'];
		//dump($resp);die;
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
		 //dump($resp);die;
		if($resp->result->success)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function sendSms2($mobile, $content, $time = '', $mid = '')
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
		 //dump($resp);die;
		if($resp->result->success)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function depadd(){
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
		if ($info) {// 上传成功 获取上传文件信息
			foreach ($info as $file) {
				$logo = $file['savepath'] . $file['savename'];
			}
		}
		$_POST['icphoto'] = $logo;
		/*上传结束*/
		if ($this->create()) {
			//执行数据新增方法
// 			echo '<pre>';
// 			print_r($_POST);
// 			echo '</pre>';
// 			exit();
			$ret=$this->save();
			if($ret){
				$ret='更新成功'.$ret;
			}
			return $ret;
		}
	}
	
	
	
	
	
}