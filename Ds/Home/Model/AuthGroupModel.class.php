<?php
/**
* ==============================================
* 版权所有 http://www.david0306.cn
* ----------------------------------------------
* 这不是一个自由软件，未经授权不许任何使用和传播。
* ==============================================
* @date: 2016年10月12日
* @author: 逸仙 <ggvsqq@163.com>
* @version: 教学演示！
*/
namespace Home\Model;
use Think\Model;
use Think\Page;
class AuthGroupModel extends Model{
    public function getlist($where) {
        $totalRows = $this->where($where)->count();
        $lists = 10;//每页显示几条数据
        $page = new Page($totalRows,$lists);
        //自定义分页样式---开始
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$lists.' 条/页 共 %TOTAL_ROW% 条)');
        $show = $page->show();
        $list = $this->where($where)
                     ->limit($page->firstRow.','.$page->listRows)
                     ->select();
        $rtn['list'] = $list;
        $rtn['show'] = $show;
        return $rtn;
    }
    
    
}