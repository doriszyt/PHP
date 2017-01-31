<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 16/7/28
 * Time: AM10:11
 */
function check_begin_and_end_time($output_json = false)
{
    global $_config;

    $time        = time();
    $found_error = 0;

    if ($time < $_config['begin_time']) {
        $error_msg   = '本期活动尚未开始';
        $found_error = 1;
    }

    if ($time > $_config['end_time']) {
        $error_msg   = '本期活动已经结束';
        $found_error = 1;
    }
//需要改为callback函数
    if ($found_error) {
        if ($output_json) {
            $json = array(
                'status'  => 0,
                'message' => & $error_msg
            );

            header('Content-type: application/json; charset=utf-8');
            die($json);
        } else {
            $data = array(
                'message' => & $error_msg,
                'link'    => 'index.php'
            );

            echo($data);
        }
    }
}