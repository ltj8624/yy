<?php
namespace Home\Model;
use Think\Model;
use Think\Page;
class AuthRuleModel extends Model{
    protected $_map = array(
        'rname' =>'name', 
        'rtitle'    =>'title', 
    );
    protected $_validate = array(
        array('name','require','URL不能为空！'), //默认情况下用正则进行验证
       // array('name','','URL名称已经存在！',0,'unique',1),
        array('title','require','权限名称不能为空！'), //默认情况下用正则进行验证
    );
    protected $_auto = array (
        array('status','1'), // 新增的时候把status字段设置为1
    );
    public function getlist($where){
        $count = $this->where($where)->count();
        $ln = 10;
        $page = new Page($count,$ln);
        //自定义分页样式---开始
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$ln.' 条/页 共 %TOTAL_ROW% 条)');
        //自定义分页样式---结尾
        
        $show = $page->show();//显示分页信息
        $list = $this->where($where)
//                      ->limit($page->firstRow.','.$page->listRows)
                     ->page(I('get.p'),$ln)
                     ->order('id asc')->select();
        $rtn['list'] = $list;
        $rtn['show'] = $show;
        return $rtn;
    }
}
