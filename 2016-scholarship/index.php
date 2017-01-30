<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 22/06/2015
 * Time: 10:57 AM
 */
define('APP_ROOT', dirname(__FILE__));

require_once(APP_ROOT . '/inc/init.php');

$type = isset($_GET['type']) ? intval($_GET['type']) : 0;

$page_data = array(
    'logged' => isset($_SESSION['logged']) ? intval($_SESSION['logged']) : 0,
    'type'   => in_array($type, array(1, 2)) ? $type : 0,
    'rand'   => md5(mt_rand(1, 9999) . time()),
    'email'  => isset($_SESSION['email']) ? $_SESSION['email'] : ''
);

$smarty->assign($page_data);
$smarty->display('index.tpl');