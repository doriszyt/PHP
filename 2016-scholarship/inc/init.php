<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 22/06/2015
 * Time: 10:56 AM
 */
session_start();

date_default_timezone_set('America/Toronto');

require_once(APP_ROOT . '/inc/3rd/smarty/Smarty.class.php');
require_once(APP_ROOT . '/inc/3rd/idiorm.php');
require_once(APP_ROOT . '/inc/config.php');
require_once(APP_ROOT . '/inc/common_functions.php');

//配置并初始化 Smarty 模板
$smarty = new Smarty();

$smarty->setTemplateDir(APP_ROOT . '/templates/');
$smarty->setCompileDir(APP_ROOT . '/data/templates_c/');
$smarty->setCacheDir(APP_ROOT . '/data/cache/');

//配置并初始化数据库
if ( file_exists($_config['db_file']) AND is_writable($_config['db_file']) )
{
    ORM::configure("sqlite:" . $_config['db_file']);
}
else
{
    header('Content-Type: text/html; charset=utf-8');
    die('数据库文件缺失或不可写');
}

check_begin_and_end_time();