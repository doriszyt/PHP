<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 2015-12-01
 * Time: 1:38 PM
 */
include('./inc/init.php');

$name    = isset($_POST['name']) ? trim($_POST['name']) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';

$found_error   = false; //标记变量,如果校验中遇到错误则设置为 true,默认为 false
$message       = '';    //最终呈现给用户的提示信息
$current_time  = time();
$current_count = ORM::for_table('policeyangconference')->count(); //统计已有的提问记录数量

//必要的验证
if (isset($_SESSION['flag_lasttime'])) {
    if ($current_time - intval($_SESSION['flag_lasttime']) < COOLDOWN_TIME) {
        $found_error = true;
        $message     = '请勿在短时间内重复提交表单';
    }
}

if (intval($current_count) >= MAX_PEOPLE) {
    $found_error = true;
    $message     = '很抱歉, 已暂停接受新的网友提问';
}

if ('' == $name OR '' == $email) {
    $found_error = true;
    $message     = '请完整填写表单内容';
}

if (mb_strlen($name) > 50) {
    $found_error = true;
    $message     = '联系人姓名的长度不要超过50个字符';
}

if (strlen($email) > 100) {
    $found_error = true;
    $message     = '邮件的长度不要超过50个字符';
}

if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $found_error = true;
    $message     = '邮件的格式有误';
}

if (0 == mb_strlen($content)) {
    $content = '无';
}

if (mb_strlen($content) > 500) {
    $found_error = true;
    $message     = '提问内容的长度不要超过500个字符';
}

//验证无误,写入数据库
//此处使用了一个第三方的数据库操作类,见 https://github.com/j4mie/idiorm/blob/master/docs/configuration.rst
if (false === $found_error) {
    $query             = ORM::for_table('policeyangconference')->create();
    $query->name       = $name;
    $query->email      = $email;
    $query->content    = $content;
    $query->created_at = $current_time;
    $query->ip_address = $_SERVER['REMOTE_ADDR'];
    $query->save();

    $insert_id = $query->id();

    if (! $insert_id) {
        $message = '提交失败,保存数据时出现错误';
    } else {
        $message = '提交成功,我们的工作人员稍后会与您邮件联系.';
    }

    $_SESSION['flag_lasttime']  = time();
}

include('./thankyou.php');