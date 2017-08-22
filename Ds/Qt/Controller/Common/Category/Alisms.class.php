<?php 
namespace Common\Category;

class Alisms{
	
	    private $_appkeys = '
23808157';
        private $_secretKey = '3f8f87653bc8c49f3b110ad813e496ab
';
		//验证码发送
		public function sendSms($mobile,$code,$template){
			  vendor('Alidayu.TopSdk');
			  $time = date('Y年m月d日');
			  $c = new \TopClient();
			  $c ->appkey = $this->_appkeys;
			  $c ->secretKey = $this->_secretKey;
			  $c ->format = "json";
			  $req = new \AlibabaAliqinFcSmsNumSendRequest();
			  $req ->setExtend("");
			  $req ->setSmsType("normal");
			  $req ->setSmsFreeSignName("云联金阳");
			  $req ->setSmsParam("{time:'".$time."',code:'".$code."'}");
			  $req ->setRecNum($mobile);
			  $req ->setSmsTemplateCode($template);
			  $resp = (array)$c ->execute($req);
			  $result = (array)$resp['result'];
			  dump($resp);die;
			  if($result['success']==true){
				  return '100';
				  }
			  else{
				  return '200';
				  }

	    }
		
		//短信通知发送
		public function sendNotice($mobile,$template){
			  vendor('Alidayu.TopSdk');
			  $c = new \TopClient();
			  $c ->appkey = $this->_appkeys;
			  $c ->secretKey = $this->_secretKey;
			  $c ->format = "json";
			  $req = new \AlibabaAliqinFcSmsNumSendRequest();
			  $req ->setExtend("");
			  $req ->setSmsType("normal");
			  $req ->setSmsFreeSignName("越汽配");
			  $req ->setSmsParam("");
			  $req ->setRecNum($mobile);
			  $req ->setSmsTemplateCode($template);
			  $resp = (array)$c ->execute($req);
			  $result = (array)$resp['result'];
			  if($result['success']==true){
				  return '100';
				  }
			  else{
				  return '200';
				  }

	     }
		 	 
}
?>