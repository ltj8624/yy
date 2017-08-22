<?php
namespace Home\Controller;
use Common\Controller\AuthsController;


class ContController extends AuthsController{
	
	protected $vip;
	protected $product;
	public function __construct()
	{
		parent::__construct();		
		$this->vip = D('Vip');		
		$this->product = D('Product');	
	}
	
	public function index(){
		$str=D('Dcht');
		$phone=I('get.phone');
		$name=I('get.yname');
		if ($phone != ''){
			$where['phone'] = array('like','%'.$phone.'%');
		}

		if ($name != ''){
			$where['yname'] = array('like','%'.$name.'%');
		}
		$arr=$str->getlist($where);

		$this->assign('arr',$arr['list']);
		$this->assign('show',$arr['show']);

		$this->display();
	}
	//合同列表
    public function cpht(){
        $str=M('Dcht');
        $where['id']=I('get.id');
        $eww=$str->where($where)->find();
		
        $this->assign($eww);
        $this->display();
    }


	public function printword(){
        $str=M('Dcht');
        $where['id']=I('get.id');
        $eww=$str->where($where)->find();
        require './vendor/autoload.php';
        $phpword = new \PhpOffice\PhpWord\TemplateProcessor('doc/hetong.docx');

        $phpword->setValue('yname',$eww['yname']? $eww['yname'] : '' );
		$phpword->setValue('pp',$eww['pp']? $eww['pp'] : '' );
        $phpword->setValue('pmoney',$eww['pmoney']? $eww['pmoney'] : '' );
        $phpword->setValue('idnumber',$eww['idnumber']? $eww['idnumber'] : '' );
        $phpword->setValue('phone',$eww['phone']? $eww['phone'] : '' );
        $phpword->setValue('number',$eww['number']? $eww['number'] : '' );
        $phpword->setValue('cycle',$eww['cycle']? $eww['cycle'] : '' );
        $phpword->setValue('money',$eww['money']? $eww['money'] : '' );
        $phpword->setValue('earnings',$eww['earnings']? $eww['earnings'] : '' );
        $phpword->setValue('order_sn',$eww['order_sn']? $eww['order_sn'] : '' );
        $phpword->setValue('earnings',$eww['earnings']? $eww['earnings'] : '' );
        $phpword->setValue('ynumber',$eww['ynumber']? $eww['ynumber'] : '' );
        $phpword->setValue('bnumber',$eww['bnumber']? $eww['bnumber'] : '' );
        $phpword->setValue('ynumber',$eww['ynumber']? $eww['ynumber'] : '' );
        $phpword->setValue('jianyu',$eww['jianyu']? $eww['jianyu'] : '' );
        $phpword->setValue('fangshi',$eww['fangshi']? $eww['fangshi'] : '' );
        $phpword->setValue('count',$eww['count']? $eww['count'] : '' );
        $phpword->setValue('zhifu',$eww['zhifu']? $eww['zhifu'] : '' );
        $phpword->setValue('fengxian',$eww['fengxian']? $eww['fengxian'] : '' );
        $phpword->setValue('qita',$eww['qita']? $eww['qita'] : '' );


        $file = '云联金阳联合养殖协议.docx';
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $phpword->saveAs('php://output');
	}
}