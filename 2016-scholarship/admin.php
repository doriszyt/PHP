<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 22/06/2015
 * Time: 10:57 AM
 */
define('APP_ROOT', dirname(__FILE__));

require_once(APP_ROOT . '/inc/init.php');

$op = isset($_GET['op']) ? strtolower($_GET['op']) : 'login';

switch ($op) {
    /**
     * 登录界面
     */
    case 'login':
        $page_data = array(
            'op' => 'login'
        );

        $smarty->assign($page_data);
        $smarty->display('admin.tpl');

        break;

    /**
     * 登录验证
     */
    case 'chk_login':
        $preset_password = '123456';
        $password        = isset($_POST['password']) ? trim($_POST['password']) : '';

        if (0 === strcasecmp($password, $preset_password)) {
            $_SESSION['is_admin'] = 1;

            header("Location:admin.php?op=main");
        } else {
            header("Location:admin.php?op=login");
        }

        die;

        break;

    /**
     * 报名者列表
     */
    case 'main':
        $people = ORM::for_table('signup')->find_array();

        $page_data = array(
            'op'     => 'main',
            'people' => $people
        );

        $smarty->assign($page_data);
        $smarty->display('admin.tpl');

        break;

    /**
     * 报名者详情
     */
    case 'detail':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        $detail      = ORM::for_table('signup')->find_one($id);
        $attachments = ORM::for_table('attachments')->where('singup_id', $id)->find_array();

        $page_data = array(
            'op'          => 'detail',
            'detail'      => $detail,
            'attachments' => $attachments
        );

        $smarty->assign($page_data);
        $smarty->display('inc_admin_detail.tpl');

        break;

    /**
     * 附件下载
     */
    case 'download':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        $file = ORM::for_table('attachments')->find_one($id);

        if (! $file) {
            header('Content-Type: text/html; charset=utf-8');
            die('附件不存在');
        }

        $filename  = $file['file_name'];
        $file_path = realpath('./upload/' . $file['real_file_name']);

        header("Content-type: application/octet-stream");

        //处理中文文件名
        $ua               = $_SERVER["HTTP_USER_AGENT"];
        $encoded_filename = rawurlencode($filename);
        if (preg_match("/MSIE/", $ua)) {
            header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
        } else if (preg_match("/Firefox/", $ua)) {
            header("Content-Disposition: attachment; filename*=\"utf8''" . $filename . '"');
        } else {
            header('Content-Disposition: attachment; filename="' . $filename . '"');
        }

        header("Content-Length: " . filesize($file_path));
        readfile($file_path);

        break;

    /**
     * 退出登录
     */
    case 'logout':
        unset($_SESSION['is_admin']);

        session_destroy();

        header("Location:admin.php?op=login");

        die;

        break;
}

