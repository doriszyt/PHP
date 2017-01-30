<?php
/**
 * Created by PhpStorm.
 * Created: Max
 * Modified: Doris
 * Date: 07/06/2016
 * Time: 11:28 AM
 */
define('APP_ROOT', dirname(__FILE__));

require_once(APP_ROOT . '/inc/init.php');

$op = isset($_GET['op']) ? trim($_GET['op']) : '';

$json = array(
    'status'  => 0,
    'message' => '',
    'data'    => null
);

switch (strtolower($op)) {

    case 'login':
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        $api_url   = $_config['api_base_url'] . 'access/auth/';

        $post_data = array(
            'args' => json_encode(array(
                'username' => $username,
                'password' => $password
            ))
        );

        $curl_result     = curl_request($api_url, 'POST', $post_data);
        $arr_curl_result = json_decode($curl_result, true);

        if (! isset($arr_curl_result['Error'])&&(0!==isset($arr_curl_result['userid']))) {
            $_SESSION['logged']     = 1;
            $_SESSION['uid']        = $arr_curl_result['userid'];
            $_SESSION['nickname']   = $arr_curl_result['nickname'];
            $_SESSION['session_id'] = $arr_curl_result['sessionid'];
            $_SESSION['email']      = $arr_curl_result['email'];
            $_SESSION['api_cookie'] = $arr_curl_result['cookie'];

            $json['status'] = 1;
            $json['data']   = array(
                'uid'        => $arr_curl_result['userid'],
                'nickname'   => $arr_curl_result['nickname'],
                'session_id' => $arr_curl_result['sessionid']
            );
            $json['email'] = $_SESSION['email'];
        } else {
            $json['message'] = isset($arr_curl_result['Error']) ? trim($arr_curl_result['Error']) : '登录失败';
        }
        
        break;

    case 'logout':
        unset($_SESSION);

        session_destroy();

        $json['status'] = 1;

        break;

    default:
        $json['message'] = '非法操作';



    case 'register':
        $reg_name = isset($_POST['reg_name']) ? trim($_POST['reg_name']) : '';
        $reg_nickname = isset($_POST['reg_nickname']) ? trim($_POST['reg_nickname']) : '';
        $reg_pwd = isset($_POST['reg_pwd']) ? trim($_POST['reg_pwd']) : '';
        $reg_email = isset($_POST['reg_email']) ? trim($_POST['reg_email']) : '';


        $api_url   = $_config['api_base_url'] .'access/scholarship_register';
        $post_data = array(
            'args' => json_encode(array(
                'username' => $reg_name,
                'nickname' => $reg_nickname,
                'password' => $reg_pwd,
                'email' => $reg_email
            ))
        );

        $curl_result     = curl_request($api_url, 'POST', $post_data);

        $arr_curl_result = json_decode($curl_result, true);

        if (($arr_curl_result["status"] == 1) && (0!==isset($arr_curl_result['data']['userid']))) {

            $json['message'] = isset($arr_curl_result['message']) ? trim($arr_curl_result['message']) : '注册成功';

            $_SESSION['logged']     = 1;
            $_SESSION['uid']        = $arr_curl_result['data']['userid'];
            $_SESSION['nickname']   = $arr_curl_result['data']['nickname'];
            $_SESSION['session_id'] = $arr_curl_result['data']['sessionid'];
            $_SESSION['api_cookie'] = $arr_curl_result['data']['cookie'];
            $_SESSION['email']      = $reg_email;

            $json['status'] = 1;
            $json['data']   = array(
                'uid'        => $arr_curl_result['data']['userid'],
                'nickname'   => $arr_curl_result['data']['nickname'],
                'session_id' => $arr_curl_result['data']['sessionid']
            );
            $json['email'] = $_SESSION['email'];
        }
        else {
            $json['message'] = isset($arr_curl_result['message']) ? trim($arr_curl_result['message']) : '注册失败';
        }



        break;

    case 'check_name':
        $reg_name = isset($_POST['reg_name']) ? trim($_POST['reg_name']) : '';
        $api_url   = $_config['api_base_url'] . 'access/check_name';
        $post_data = array(
            'args' => json_encode(array(
                'username' => $reg_name,
            ))
        );
        $curl_result     = curl_request($api_url, 'POST', $post_data);
        $arr_curl_result = json_decode($curl_result, true);

        if (intval($arr_curl_result["status"]) == 0) {
            $json['message'] = isset($arr_curl_result['message']) ? trim($arr_curl_result['message']) : '用户名有误';
        }
        else{
            $json['message'] = isset($arr_curl_result['message']) ? trim($arr_curl_result['message']) : '用户名可用';
        }
        break;

    case 'check_nickname':
        $reg_nickname = isset($_POST['reg_nickname']) ? trim($_POST['reg_nickname']) : '';
        $api_url   = $_config['api_base_url'] . 'access/check_nickname';
        $post_data = array(
            'args' => json_encode(array(
                'nickname' => $reg_nickname,
            ))
        );
        $curl_result     = curl_request($api_url, 'POST', $post_data);
        $arr_curl_result = json_decode($curl_result, true);
        if ($arr_curl_result["status"] == 0) {
            $json['message'] = isset($arr_curl_result['message']) ? trim($arr_curl_result['message']) : '昵称有误';
        }
        break;

    case 'check_email':
        $reg_email = isset($_POST['reg_email']) ? trim($_POST['reg_email']) : '';
        $api_url   = $_config['api_base_url'] . 'access/check_email';
        $post_data = array(
            'args' => json_encode(array(
                'email' => $reg_email,
            ))
        );
        $curl_result     = curl_request($api_url, 'POST', $post_data);
        $arr_curl_result = json_decode($curl_result, true);
        if ($arr_curl_result["status"] == 0) {
            $json['message'] = isset($arr_curl_result['message']) ? trim($arr_curl_result['message']) : '邮箱有误';
        }

        break;
}

header('Content-type: application/json; charset=utf-8');
die(json_encode($json));