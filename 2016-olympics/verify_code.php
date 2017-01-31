<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 16/7/27
 * Time: PM4:48
 */
//随意产生验证码
session_start();

$verify_code = rand(1000,9999);

echo $verify_code;

//验证码逻辑验证

$phone = $_GET['phone'];
$ver = trim($_POST['verify']);

if ( $ver == $_SESSION['verify']) {
    echo '验证码正确';
} else {
    echo '验证码有误';
}

