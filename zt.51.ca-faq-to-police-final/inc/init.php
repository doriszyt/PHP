<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 2015-12-01
 * Time: 1:39 PM
 */

session_start();

date_default_timezone_set('America/Toronto'); //设定默认时区

define('SWITCH_DATABASE', 'local'); //切换数据库配置参数,可选值: local 和 remote,默认为 local
define('COOLDOWN_TIME', 5); //用户多次提交表单之间的时间间隔,单位"秒"
define('MAX_PEOPLE', 100); //最多允许多少个人提交表单

include_once('idiorm.php');

//预设了2套数据库配置参数,配合上面定义的常量 SWITCH_DATABASE 进行切换
$database_config = array(
    //本地开发环境
    'local'  => array(
        'host'     => 'localhost',
        'dbname'   => 'zt_51_ca',
        'username' => 'root',
        'password' => 'root'
    ),

    //正式服务器
    'remote' => array(
        'host'     => 'localhost',
        'dbname'   => 'ca51www_zt',
        'username' => 'ca51www_zt',
        'password' => '~]UOQ{QS2cQ_'
    )
);

//获取当前的数据库配置参数
$database_params = isset($database_config[SWITCH_DATABASE])
                 ? $database_config[SWITCH_DATABASE]
                 : false;

//建立与数据库的连接并设置必要的参数
if ($database_params) {
    ORM::configure(array(
        'connection_string' => "mysql:host={$database_params['host']};dbname={$database_params['dbname']}",
        'username'          => $database_params['username'],
        'password'          => $database_params['password'],
        'driver_options'    => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    ));
}

