<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 16/7/27
 * Time: PM3:14
 */

require_once('config.php');


/*$name      = isset($_GET['name']) ? trim($_GET['name']) : '';*/

$phone_ori     = isset($_GET['phone']) ? trim($_GET['phone']) : '';
$phone=substr(preg_replace('/[^0-9]/','',$phone_ori),-10); //正则电话号码,全部取数字和后10位 xxx-xxx-xxxx


$medal_number     = isset($_GET['medal_number']) ? trim($_GET['medal_number']) : '';
$found_error   = false; //标记变量,如果校验中遇到错误则设置为 true,默认为 false
$week_param = 0;
$message       = '';    //返回给接口的数据
$current_time  = time();


//判断比赛开始与结束的时间
if($current_time < $_config['1']['begin_time']){
    $found_error   = true;
    $message     = '竞猜还没开始,请耐心等待';
}

if($current_time > $_config['3']['end_time']){
    $found_error   = true;
    $message     = '竞猜已经结束,感谢您的参与';
}

//如果时间在比赛范围内
if($current_time > $_config['1']['begin_time'] && $current_time < $_config['1']['end_time']){
    $found_error   = false;
    $week_param = 1;
}
if($current_time > $_config['2']['begin_time'] && $current_time < $_config['2']['end_time']){
    $found_error   = false;
    $week_param = 2;
}
if($current_time > $_config['3']['begin_time'] && $current_time < $_config['3']['end_time']){
    $found_error   = false;
    $week_param = 3;
}





//最后的时候校验
if ('' == $phone OR '' == $medal_number) {
    $found_error = true;
    $message     = '请完整填写表单内容';
}

/*if (mb_strlen($name) > 50) {
    $found_error = true;
    $message     = '联系人姓名的长度不要超过50个字符';
}*/


if (!is_numeric($phone)) {
    $found_error = true;
    $message     = '请注意您填写的电话号码格式';
}

if (false === $found_error) {
    $query               = ORM::for_table('2016olympics')->create();
/*    $query->name         = $name;*/
    $query->phone        = $phone;
    $query->medal_number = $medal_number;
    $query->created_at   = $current_time;
    $query->ip_address   = $_SERVER['REMOTE_ADDR'];
    $result = $query->save();
    $insert_id = $query->id();

    if (! $insert_id) {
        $message = '提交失败,保存数据时出现错误';
    } else {
        $message = '提交成功,我们的工作人员稍后会与您取得联系.';
    }
    $_SESSION['flag_lasttime']  = time();
}

//需要把返回的数据改为jsonp
if($found_error == false){
    $json = array(
        'status' => 1,
        'message' => '提交成功,我们的工作人员稍后会与您取得联系.'
    );
}
else{
    $json = array(
        'status' => 0,
        'message' => $message
    );
};

header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);