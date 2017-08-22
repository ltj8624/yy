<?php
namespace Home\Controller;
use Common\Controller\AuthsController;
class AuthGroupController extends AuthsController {
    public function __construct(){
        header("content-type:text/html;charset=utf-8");
        parent::__construct();
    }
    public function index(){
        $model     = D('AuthGroup');
        $title = I('get.title');
        $where['status'] = array('eq',1);
        if ($title != ''){
            $where['title'] = array('like','%'.$title.'%');
        }
        $garr  = $model->getlist($where);
        $GroupArr = $garr['list'];
        foreach ($GroupArr as $k => $v){
            $modelRule = M('AuthRule');
            //利用$v['rules']查找$RuleArr里面的‘title’
            $RuleArr = $modelRule->where('id in('.$v['rules'].')')->select();
            //定义一个空数组备用
            $arr = array();
            //将$RuleArr里面的title放到新的空数组里面
            foreach ($RuleArr as $kk => $vv){
                $arr[] = $vv['title'];
            }
            //将数组炸开拼接成字符串并赋值给$GroupArr[$k]['rules']
            $GroupArr[$k]['rules'] = implode('&nbsp&nbsp,&nbsp&nbsp',$arr);
        }
//         echo '<pre>';
//         print_r($GroupArr)."<br/>";
//         echo '</pre>';
//         exit();
        $this->assign('show',$garr['show']);
        $this->assign('list',$GroupArr);
        $this->display();
    }
    public function edit() {
        $id = I('get.id');
        $model = D('AuthGroup');
        $arr = $model->where('id ='.$id)->find();
        $rule = D('AuthRule');
        $rArr = $rule->select();
        $this->assign('arr',$arr);
        $this->assign('rarr',$rArr);
        $this->display();
    }
    public function update() {
        $_POST['rules'] = implode(',', $_POST['rules']);
        $model = D('AuthGroup');
        if ($model->create($_POST)){
            if ($model->where('id ='.I('get.id'))->save()){
                $this->success('修改成功！',U('AuthGroup/index'),3);
            }else {
                $this->error('修改失败！');
            }
        }
//         else {
//             exit($model->getError());
//         }
    }
    public function add() {
        $model = D('AuthRule');
        $arr = $model->field('id,title')->select();
        $this->assign('arr',$arr);
        $this->display();
    }
    public function insert() {
        $_POST['rules'] = implode(',',$_POST['rules']);
        $model = D('AuthGroup');
        if ($model->create($_POST)){
            if ($model->add()){
                $this->success('添加成功！',U('AuthGroup/index'),3);
            }else {
                $this->error('添加失败！');
            }
        }
//         else {
//             exit($model->getError());
//         }
    
    }
    //逻辑删除
    public function del() {
        $model = D('AuthGroup');
        $data['status'] = 0;
        if ($model->where('id='.I('get.id'))->save($data)){
            $this->success('删除成功！',U('AuthGroup/index'));
        }else {
            $this->error('删除失败！');
        }
    }
    //回收站
    public function recycle() {
        $model     = D('AuthGroup');
        $garr  = $model->getlist('status = 0');
        $GroupArr = $garr['list'];
        foreach ($GroupArr as $k => $v){
            $modelRule = M('AuthRule');
            //利用$v['rules']查找$RuleArr里面的‘title’
            $RuleArr = $modelRule->where('id in('.$v['rules'].')')->select();
            //定义一个空数组备用
            $arr = array();
            //将$RuleArr里面的title放到新的空数组里面
            foreach ($RuleArr as $kk => $vv){
                $arr[] = $vv['title'];
            }
            //将数组炸开拼接成字符串并赋值给$GroupArr[$k]['rules']
            $GroupArr[$k]['rules'] = implode('&nbsp&nbsp,&nbsp&nbsp',$arr);
        }
        $this->assign('page',$garr['show']);
        $this->assign('arr',$GroupArr);
        $this->display();
    }
    //恢复
    public function huifu() {
        $model = D('AuthGroup');
        $data['status'] = 1;
        if ($model->where('id='.I('get.id'))->save($data)){
            $this->success('恢复成功！',U('AuthGroup/index'));
        }else {
            $this->error('恢复失败！');
        }
    }
    //彻底删除
    public function delit() {
        $model = D('AuthGroup');
        if ($model->delete(I('get.id'))){
            $this->success('彻底删除成功！');
        }else {
            $this->error('彻底删除失败！');
        }
    }
}