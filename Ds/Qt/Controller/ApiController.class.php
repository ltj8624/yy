<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm
// +----------------------------------------------------------------------
// | Date: 2017/2/4 18:32
// +----------------------------------------------------------------------
// | Use : 说明用途，主要方面！
// +----------------------------------------------------------------------
// | Author: 联之通 <1850167575@qq.com>
// +----------------------------------------------------------------------

namespace Qt\Controller;


use Think\Controller;

class ApiController extends Controller{
    public function cha($phone) {
        $vip=M("Vip");
        $ini['phone']=$phone;
        $userinfo=$vip->where($ini)->find();
        if($userinfo){
            $diary=M("Diary");
            $where['vid']=$userinfo['id'];
            $zhang=$diary->where($where)->limit(20)->order("time desc")->select();
            if($zhang){
                $data['errcode']=0;
                $data['user']=$userinfo;
                $data['data']=$zhang;
            }else{
                $data['errcode']=2;
                $data['errmsg']="该账户暂无账单";
                $data['user']=$userinfo;
            }
        }else{
            $data['errcode']=1;
            $data['errmsg']="未查询到该手机号的信息";
        }
        return $data;
    }

    public function lian() {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $echostr=$_GET['echostr'];
        $token = 'yljy';
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        if( $tmpStr == $signature){
            if($echostr){
                ob_clean();//更换url时清除微信缓存
                echo $echostr;
                exit;
            }else{
                $this->receive();
            }
        }
    }
    public function receive(){
        //接到xml文件
        $postXml=$GLOBALS['HTTP_RAW_POST_DATA'];
        //转换为对象
        $postObj=simplexml_load_string($postXml);
        //获取到用户发送消息的类型
        $msgType=strtolower($postObj->MsgType);
        switch($msgType){
            case 'text':$this->responseText($postObj);break;
            case 'image':$this->responseImage($postObj);break;
            case 'voice':$this->responseText($postObj);break;
            case 'video':$this->responseVideo($postObj);break;
            case 'shortvideo':$this->responseShort($postObj);break;
            case 'location':$this->responseLocation($postObj);break;
            case 'link':$this->responseLink($postObj);break;
            case 'event':$this->responseEvent($postObj);break;
            default :$this->responseDefault($postObj);break;
        }
    }
    //默认回复函数
    public function responseDefault($postObj){
        echo $this->textBack($postObj,"一脸懵逼");
    }
    //默认文本回复函数
    public function textBack($postObj,$content){
        $str="<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            </xml>";
        $rt=sprintf($str,$postObj->FromUserName,$postObj->ToUserName,time(),$content);
        return $rt;
    }
    //事件处理函数
    public function responseEvent($postObj){
        $event=$postObj->Event;
        switch($event){
            case 'subscribe':
            echo $this->textBack($postObj,"欢迎关注盈羊联盟");
            break;
            case 'VIEW':
            session("openid",$postObj->FromUserName);
            break;
            case 'CLICK':
            	if($postObj->EventKey=="index"){
            		echo $this->onetw($postObj, "个人中心", "个人中心", "http://www.yunlianjinyang.com/yy/Public/img/zx2.jpg", "www.yunlianjinyang.com/yy/index.php/Qt/Mr/mr?openid=".$postObj->FromUserName);
            	}            
            break;
        }
    }
    //文本和语音回复处理函数
    public function responseText($postObj){
        // 获取用户文字输入的文本或者语音输入转换成的文字
        if($postObj->Content){
            //文本消息 用户发来的是文本
            $con=trim($postObj->Content);
        }else{
            //语音消息，用户发来的语音转换成的文字
            $con=trim($postObj->Recognition);
        }
        if(strstr($con,"账单查询")){
            S('a',"ok",180);
            echo $this->textBack($postObj,"请输入要查询的手机号");
        }elseif(S('a')){
            if(preg_match("/^1[34578]{1}\d{9}$/",$con)){
                $arr=$this->cha($con);
                if($arr['errcode']==0){
                    $str="该账户信息为:\n用户名:".$arr['user']['vname']."\n手机号:".$arr['user']['phone']."\n会员号:".$arr['user']['vip']."\n剩余次数:".$arr['user']['times']."\n"."最近账单为:\n";
                    foreach($arr['data'] as $v){
                        $data=date("Y-m-d H:i:s",$v['time']);
                        $str.="时间:".$data." 消费项目:".$v['cost']." 消费次数:".$v['costtimes']." 剩余次数:".$v['balance']."\n";
                        $str.="---------------\n";
                        $data='';
                    }
                    echo $this->textBack($postObj,$str);
                }elseif($arr['errcode']==2){
                    $str="该账户信息为:\n用户名:".$arr['user']['vname']."\n手机号:".$arr['user']['phone']."\n会员号:".$arr['user']['vip']."\n剩余次数:".$arr['user']['times']."\n".$arr['errmsg'];
                    echo $this->textBack($postObj,$str);
                }else{
                    echo $this->textBack($postObj,$arr['errmsg']);
                }
            }else{
                //设置图灵机器人的url
                $url="http://www.tuling123.com/openapi/api";
                //设置传给图灵机器人的参数-key  info   userid
                $data['key']="2a5eb16cd00f414f9a1834a22980b089";//我们的图灵机器人key
                $data['info']=$con;//用户发来的语音或者文本消息的文字内容
                $data['userid']=$postObj->FromUserName;//使用用户的微信号
                $json=json_encode($data,JSON_UNESCAPED_UNICODE);// 转为json
                $jsons=https_request($url,$json,1);//执行curl操作
                $arr=json_decode($jsons,true);//返回结果转为数组
                echo $this->textBack($postObj,$arr['text']);//给用户返回图灵机器人返回的文本内容
            }
        }else{
            //设置图灵机器人的url
            $url="http://www.tuling123.com/openapi/api";
            //设置传给图灵机器人的参数-key  info   userid
            $data['key']="2a5eb16cd00f414f9a1834a22980b089";//我们的图灵机器人key
            $data['info']=$con;//用户发来的语音或者文本消息的文字内容
            $data['userid']=$postObj->FromUserName;//使用用户的微信号
            $json=json_encode($data,JSON_UNESCAPED_UNICODE);// 转为json
            $jsons=https_request($url,$json,1);//执行curl操作
            $arr=json_decode($jsons,true);//返回结果转为数组
            echo $this->textBack($postObj,$arr['text']);//给用户返回图灵机器人返回的文本内容
        }
    }
    public function onetw($postObj,$title,$description,$pic,$url){
    	$str="<xml>
		<ToUserName><![CDATA[".$postObj->FromUserName."]]></ToUserName>
		<FromUserName><![CDATA[".$postObj->ToUserName."]]></FromUserName>
		<CreateTime>".time()."</CreateTime>
		<MsgType><![CDATA[news]]></MsgType>
		<ArticleCount>1</ArticleCount>
		<Articles>
		<item>
		<Title><![CDATA[".$title."]]></Title>
		<Description><![CDATA[".$description."]]></Description>
		<PicUrl><![CDATA[".$pic."]]></PicUrl>
		<Url><![CDATA[".$url."]]></Url>
		</item>
		</Articles>
		</xml>";
    	return $str;
    }
}