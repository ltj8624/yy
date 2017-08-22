<?php
namespace Home\Model;
use Think\Model;
class GoodsStyleModel extends Model {
	//班级风采Model
	
	public function get_img($gid){

		$where['gid'] = $gid;
		$where['del'] = 1;
		return $this->order('create_time desc')->where($where)->select();
	}

}