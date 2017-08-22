<?php
namespace Home\Controller;
use Common\Controller\AuthsController;
class AuthRuleController extends AuthsController{
    public function index(){
        $model = D('AuthRule');
        $where['status'] = array('eq',1);
        if (I('get.title') != ''){
            $where['title'] = array('like','%'.I('get.title').'%');
        }
//         foreach ($where as $k=>$v){
//             $page->parameter[$k] = urldecode($v);
//         }
        $arr = $model->getlist($where);
        $this->assign('list',$arr['list']);
        $this->assign('show',$arr['show']);
        $this->display();
    }
    public function add(){
        if (IS_POST){
            $model = D('AuthRule');
            if ($model->create($_POST)){
                if ($model->add()){
                    $this->success('新增成功',U('AuthRule/index'),0);
                }else {
                    $this->error('新增失败');
                }
            }
            else {
                $this->error($model->getError());
            }
           
         }
         $this->display();
    }
    public function edit(){
        $id = I('get.id');
        $model = D('AuthRule');
        if (IS_POST){
            if ($model->create($_POST)){
                if ($model->where('id='.$id)->save()){
                    $this->success('修改成功',U('AuthRule/index'),3);
                }else {
                    $this->error('修改失败');
                }
            }
            else {
                $this->error($model->getError());
            }
        }
        $arr = $model->where('id='.$id)->find();
        $this->assign('arr',$arr);
        $this->display();
    }
    public function del(){
        $id = I('get.id');
        $model = D('AuthRule');
        $rtn = $model->delete($id);
        if ($rtn){
            $this->success('删除成功'.$model->getLastInsID());
        }else {
            $this->error('删除失败');
        }
    }
}