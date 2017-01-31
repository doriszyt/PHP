<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 16/7/28
 * Time: AM10:54
 */
require_once('config.php');


$current_time  = time();

if($current_time > $_config['1']['begin_time'] && $current_time < $_config['1']['end_time']){
    $week_param = 1;
}
if($current_time > $_config['2']['begin_time'] && $current_time < $_config['2']['end_time']){
    $week_param = 2;
}
if($current_time > $_config['3']['begin_time'] && $current_time < $_config['3']['end_time']){
    $week_param = 3;
}

if($current_time < $_config['1']['begin_time']){
    
    $message     = '竞猜还没开始,请耐心等待';
}


if($current_time > $_config['3']['end_time']){
    $message     = '竞猜已经结束,感谢您的参与';
}





$phone_ori = '(+1) 416-875-1818';
$phone=substr(preg_replace('/[^0-9]/','',$phone_ori),-10); //正则电话号码,全部取数字和后10位 xxx-xxx-xxxx

echo $phone;

echo  $message;
