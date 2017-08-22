<?php
namespace Home\Model;


use Think\Model;
use Think\Upload;


class LbtModel extends Model
{
	//数据修改*********************************************************
	public function Update(){
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
				$_POST['photo'] = $logo;
			}
		}
		
		/*上传结束*/
		if ($this->create()) {
			$ret=$this->save();
			if($ret){
				$ret='更新成功'.$ret;
			}
		}
		return $_POST;
	}
	
	//修改**********************************
	public function changeList($bid){
		$ini=array();
		if(!empty($bid)){
			$ini['bid']=$bid;
		}
		$arr=$this->where($ini)->find();
		return $arr;
	}
	
}