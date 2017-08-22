<?php

$xml = file_get_contents("php://input");

$url = 'http://www.yunlianjinyang.com/index.php/Qt/Shopping/Callback';  //修改成支付控制器 callback方法的rul路径

$ch = curl_init();

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  //get the response as a string from curl_exec(), rather than echoing it 

curl_setopt($ch, CURLOPT_URL, $url );

curl_setopt($ch, CURLOPT_POST, 1 );

curl_setopt($ch, CURLOPT_POSTFIELDS,$xml);

//取到的$info 即为拿到的script 信息 

$info =	 curl_exec($ch) ;

curl_close($ch);    //close the handle

echo $info; //输出