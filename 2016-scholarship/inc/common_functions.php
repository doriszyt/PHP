<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Modified:Doris
 * Date: 22/06/2016
 * Time: 16:15 PM
 */

/**
 * 显示提示信息并终止脚本运行
 *
 * @param array $data
 */
function display_and_halt($data = array())
{
    global $smarty;

    if (! isset($data['message'])) {
        $data['message'] = '未知的错误';
    }

    if (! isset($data['link'])) {
        $data['link'] = 'javascript:history.back()';
    }

    if (method_exists($smarty, 'assign') AND method_exists($smarty, 'display')) {
        $smarty->assign($data);
        $smarty->display('message.tpl');
        die;
    } else {
        header('Content-Type: text/html; charset=utf-8');
        die('模板引擎缺失，无法输出页面内容');
    }
}

/**
 * 上传附件
 *
 * @param string $upload_dir 文件上传后保存的目录
 * @param string $field_name 文件域的名称
 * @param int    $size_limit 图片体积限制，单位“M”
 * @param array  $ext_limit  图片类型限制，数组形式提供
 *
 * @return array 数组，具体格式请参考本函数尾部的 $result 变量的赋值
 * @author Max
 */
function upload($upload_dir = '', $field_name = '', $size_limit = 0, $ext_limit = array())
{
    $result = array(
        'status'  => 0,
        'message' => '',
        'data'    => array(
            'origin_name' => '',
            'real_name'   => ''
        )
    );

    //MIME 类型参考自 <http://www.freeformatter.com/mime-types-list.html>
    $arr_mimes = array(
        'jpg'  => array('image/jpeg', 'image/pjpeg'),
        'jpeg' => array('image/jpeg', 'image/pjpeg'),
        'png'  => array('image/png'),
        'gif'  => array('image/gif'),
        'zip'  => array('application/x-compressed', 'application/x-zip-compressed', 'application/zip', 'multipart/x-zip'),
        'rar'  => array('application/x-rar-compressed'),
        'docx' => array('application/vnd.openxmlformats-officedocument.wordprocessingml.document'),
        'doc'  => array('application/msword'),
        'xlsx' => array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'),
        'xls'  => array('application/vnd.ms-excel'),
        'pdf'  => array('application/pdf')
    );

    //生成合法的文件类型供校验
    $allowed_exts = array();

    if (is_array($ext_limit) AND count($ext_limit)) {
        foreach ($ext_limit as $ext) {
            if (isset($arr_mimes[$ext])) {
                $allowed_exts = array_merge($allowed_exts, $arr_mimes[$ext]);
            }
        }
    }

    //校验
    if ($_FILES[$field_name]['error']) {
        switch ($_FILES[$field_name]['error']) {
            case 1:
                $result['message'] = '文件体积超过 php.ini 中的限制';

                return $result;

                break;

            case 2:
                $result['message'] = '文件体积超过 form 中的限制';

                return $result;

                break;

            case 3:
                $result['message'] = '文件上传不完整';

                return $result;

                break;

            case 4:
                $result['message'] = '文件没有被上传';

                return $result;

                break;

            case 6:
                $result['message'] = '服务器端的临时目录存在问题，文件无法上传';

                return $result;

                break;

            case 7:
                $result['message'] = '文件在上传过程中无法写入磁盘';

                return $result;

                break;

            case 8:
                $result['message'] = '某个 PHP 的扩展阻止了文件的上传';

                return $result;

                break;
        }
    }

    if ('' == $upload_dir) {
        $result['message'] = '请指定上传目录';

        return $result;
    }

    if (! is_dir($upload_dir) OR ! is_writeable($upload_dir)) {
        $result['message'] = '上传目录没有写入权限';

        return $result;
    }

    if (empty($_FILES[$field_name]['tmp_name'])) {
        $result['message'] = '请选择所要上传的文件';

        return $result;
    }

    if (! in_array($_FILES[$field_name]['type'], $allowed_exts)) {
        $result['message'] = '不支持的文件类型';

        return $result;
    }

    if ($_FILES[$field_name]['size'] > ($size_limit * 1024 * 1024)) {
        $result['message'] = '文件体积超过限制';

        return $result;
    }

    //校验成功
    $arr_file_path    = pathinfo($_FILES[$field_name]['name']);
    $real_upload_dir  = realpath($upload_dir);
    $real_file_name   = md5_file($_FILES[$field_name]['tmp_name']) . '.' . $arr_file_path['extension'];
    $target_file_path = $real_upload_dir . '/' . $real_file_name;

    if (! file_exists($target_file_path)) {
        if (false === @move_uploaded_file($_FILES[$field_name]['tmp_name'], $target_file_path)) {
            $result['message'] = '文件上传失败，未知的错误';

            return $result;
        }
    }

    $result = array(
        'status' => 1,
        'data'   => array(
            'origin_name' => $_FILES[$field_name]['name'],
            'real_name'   => $real_file_name
        )
    );

    return $result;
}

/**
 * 检查活动是否已经开始/结束
 *
 * @param bool 是否将结果以 JSON 格式返回
 */
function check_begin_and_end_time($output_json = false)
{
    global $_config;

    $time        = time();
    $found_error = 0;

    if ($time < $_config['begin_time']) {
        $error_msg   = '活动尚未开始';
        $found_error = 1;
    }

    if ($time > $_config['end_time']) {
        $error_msg   = '活动已经结束';
        $found_error = 1;
    }

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

            display_and_halt($data);
        }
    }
}

/**
 * 发送 CURL 请求
 *
 * @param string $url
 * @param string $method
 * @param array  $data
 * @param string $cookie
 *
 * @return mixed
 */
function curl_request($url = '', $method = 'GET', $data = array(), $cookie = '')
{
    $defaults = array(
        CURLOPT_HEADER         => 0,
        CURLOPT_FRESH_CONNECT  => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_TIMEOUT        => 500,
        CURLOPT_USERAGENT      => $_SERVER['HTTP_USER_AGENT'],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_COOKIE         => $cookie
    );

    switch (strtoupper($method)) {
        case 'POST':
            $defaults[CURLOPT_POST]       = 1;
            $defaults[CURLOPT_POSTFIELDS] = http_build_query($data);
            $defaults[CURLOPT_URL]        = $url;

            break;

        case 'GET':
            $defaults[CURLOPT_URL] = $url . '?' . http_build_query($data);

            break;
    }

    $ch = curl_init();

    curl_setopt_array($ch, $defaults);

    $result = curl_exec($ch);

    curl_close($ch);

    return $result;
}

/**
 * 模拟提交参数，支持https提交 可用于各类api请求
 *
 * @param string $url    ： 提交的地址
 * @param array  $data   :POST数组
 * @param string $method : POST/GET，默认GET方式
 *
 * @return mixed
 */
/*
function http($url, $data=array(), $method='GET'){
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    if($method=='POST'){
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // Post提交的数据包
    }
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    curl_close($curl); // 关闭CURL会话
    return $tmpInfo; // 返回数据
}
*/

/*
function curlPost($url, $data = array(), $timeout = 30, $CA = false){

    $cacert = getcwd() . '/cacert.pem'; //CA根证书
    $SSL = substr($url, 0, 8) == "https://" ? true : false;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout-2);
    if ($SSL && $CA) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);   // 只信任CA颁布的证书
        curl_setopt($ch, CURLOPT_CAINFO, $cacert); // CA根证书（用来验证的网站证书是否是CA颁布）
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // 检查证书中是否设置域名，并且是否与提供的主机名匹配
    } else if ($SSL && !$CA) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // 检查证书中是否设置域名
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:')); //避免data数据过长问题
    curl_setopt($ch, CURLOPT_POST, true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //data with URLEncode

    $ret = curl_exec($ch);
    //var_dump(curl_error($ch));  //查看报错信息

    curl_close($ch);
    return $ret;
}
*/