<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 16/6/8
 * Time: PM1:13
 */
define('APP_ROOT', dirname(__FILE__));

require_once(APP_ROOT . '/inc/init.php');

$type         = isset($_POST['type']) ? intval($_POST['type']) : 1; //可选值：1（个人），2（社团）
$form_hash    = isset($_POST['form_hash']) ? trim($_POST['form_hash']) : '';
$http_referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
$found_error  = 0;
$error_msg    = '';

if (! isset($_SESSION['logged'])) {
    $data = array(
        'message' => '请先登录后再进行操作',
        'link'    => $http_referer
    );

    display_and_halt($data);
}

if (1 == $type) {
    $name    = isset($_POST['name']) ? trim($_POST['name']) : '';
    $school  = isset($_POST['school']) ? trim($_POST['school']) : '';
    $field   = isset($_POST['field']) ? trim($_POST['field']) : '';
    $phone   = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $email   = isset($_POST['email']) ? trim($_POST['email']) : '';
    $title   = isset($_POST['title']) ? trim($_POST['title']) : '';
    $content = isset($_POST['content']) ? trim($_POST['content']) : '';

}
else {
    $grouptype    = isset($_POST['group-type']) ? trim($_POST['group-type']) : '';
    $name    = isset($_POST['group-name']) ? trim($_POST['group-name']) : '';
    $school  = isset($_POST['group-school']) ? trim($_POST['group-school']) : '';
    $phone   = isset($_POST['group-phone']) ? trim($_POST['group-phone']) : '';
    $email   = isset($_POST['group-email']) ? trim($_POST['group-email']) : '';
    $title   = isset($_POST['group-title']) ? trim($_POST['group-title']) : '';
    $content = isset($_POST['group-content']) ? trim($_POST['group-content']) : '';
}

//==================================================================================================
// 个人附件上传
//==================================================================================================
if (1 == $type) {
    $upload_dir = './upload';
    $size_limit = 5;
    $ext_limit  = array('jpg', 'png', 'pdf', 'doc', 'docx');

    //成绩单
    $result_upload_transcript = upload($upload_dir, 'file_transcript', $size_limit, $ext_limit);

    if (! $result_upload_transcript['status']) {
        $data = array(
            'message' => '文件传输超时或您的文件大小过大,请确保您的单个文件小于2M并保证网络通畅',
            /*'link'    => $http_referer*/
        );

        display_and_halt($data);
    }

    //学签
    $result_upload_visa = upload($upload_dir, 'file_visa', $size_limit, $ext_limit);

    if (! $result_upload_visa['status']) {
        $data = array(
            'message' => '学签上传失败：' . $result_upload_visa['message'],
            /*'link'    => $http_referer*/
        );

        display_and_halt($data);
    }

    //个人简历
    $result_upload_resume = upload($upload_dir, 'file_resume', $size_limit, $ext_limit);

    if (! $result_upload_resume['status']) {
        $data = array(
            'message' => '个人简历上传失败：' . $result_upload_resume['message'],
            /*'link'    => $http_referer*/
        );

        display_and_halt($data);
    }

    //其他资料
    if (isset($_FILES['file_others']['name'])) {
        $result_upload_others = upload($upload_dir, 'file_others', $size_limit, $ext_limit);

        /*if (! $result_upload_others['status']) {
            $data = array(
                'message' => '其他资料上传失败：' . $result_upload_others['message'],
                'link'    => $http_referer
            );

            display_and_halt($data);
        }*/

        $others_file_name = $result_upload_resume['data'];
    }

    //个人照片
    $result_upload_photo = upload($upload_dir, 'file_photo', $size_limit, $ext_limit);

    if (! $result_upload_photo['status']) {
        $data = array(
            'message' => '个人照片上传失败：' . $result_upload_photo['message'],
            /*'link'    => $http_referer*/
        );

        display_and_halt($data);
    }



    $transcript_file_name = $result_upload_transcript['data'];
    $visa_file_name       = $result_upload_visa['data'];
    $resume_file_name     = $result_upload_resume['data'];
    $others_file_name     = $result_upload_others['data'];
    $photo_file_name     = $result_upload_photo['data'];
}

//==================================================================================================
// 表单校验
//==================================================================================================
if (1 == $type) {
    $_str =preg_replace("/\s|　/","",$content);
    if (mb_strlen($_str) < 500) {
        $found_error = 1;
        $error_msg   = "留学生活感受不能少于500个字符";
    }
    $field_names = array(
        'name'    => array('姓名', 20),
        'school'  => array('学校', 50),
        'field'   => array('专业', 30),
        'phone'   => array('电话', 15),
        'title'   => array('标题', 50),
        'content' => array('留学生活感悟', 20000)
    );
}
else {
    $field_names = array(
        'name'    => array('社团名称', 50),
        'school'  => array('所属学校', 50),
        'phone'   => array('电话', 15),
        'email' => array('邮件', 30),

    );
}

foreach ($field_names as $k => $v) {
    if ('' == $$k) {
        $found_error = 1;
        $error_msg   = "请填写{$v[0]}";

        break;
    }

    if (mb_strlen($$k, 'UTF8') > $v[1]) {
        $found_error = 1;
        $error_msg   = "{$v[0]}不能超过{$v[1]}个字符";

        break;
    }

}

if ($found_error) {
    $data = array(
        'message' => & $error_msg,
        'link'    => & $http_referer
    );

    display_and_halt($data);
}
//==================================================================================================
// 个人附件上传
//==================================================================================================
if (1 == $type) {
    $upload_dir = './upload';
    $size_limit = 5;
    $ext_limit  = array('jpg', 'png', 'pdf', 'doc', 'docx');

    //成绩单
    $result_upload_transcript = upload($upload_dir, 'file_transcript', $size_limit, $ext_limit);

    if (! $result_upload_transcript['status']) {
        $data = array(
            'message' => '成绩单上传失败：' . $result_upload_transcript['message'],
            /*'link'    => $http_referer*/
        );

        display_and_halt($data);
    }

    //学签
    $result_upload_visa = upload($upload_dir, 'file_visa', $size_limit, $ext_limit);

    if (! $result_upload_visa['status']) {
        $data = array(
            'message' => '学签上传失败：' . $result_upload_visa['message'],
            /*'link'    => $http_referer*/
        );

        display_and_halt($data);
    }

    //个人简历
    $result_upload_resume = upload($upload_dir, 'file_resume', $size_limit, $ext_limit);

    if (! $result_upload_resume['status']) {
        $data = array(
            'message' => '个人简历上传失败：' . $result_upload_resume['message'],
            /*'link'    => $http_referer*/
        );

        display_and_halt($data);
    }

    //其他资料
    if (isset($_FILES['file_others']['name'])) {
        $result_upload_others = upload($upload_dir, 'file_others', $size_limit, $ext_limit);

        /*if (! $result_upload_others['status']) {
            $data = array(
                'message' => '其他资料上传失败：' . $result_upload_others['message'],
                'link'    => $http_referer
            );

            display_and_halt($data);
        }*/

        $others_file_name = $result_upload_resume['data'];
    }

    //个人照片
    $result_upload_photo = upload($upload_dir, 'file_photo', $size_limit, $ext_limit);

    if (! $result_upload_photo['status']) {
        $data = array(
            'message' => '个人照片上传失败：' . $result_upload_photo['message'],
            /*'link'    => $http_referer*/
        );

        display_and_halt($data);
    }



    $transcript_file_name = $result_upload_transcript['data'];
    $visa_file_name       = $result_upload_visa['data'];
    $resume_file_name     = $result_upload_resume['data'];
    $others_file_name     = $result_upload_others['data'];
    $photo_file_name     = $result_upload_photo['data'];
}
//==================================================================================================
// 团体附件上传
//==================================================================================================
else {
    $upload_dir = './upload';
    $size_limit = 10;
    $ext_limit  = array('jpg', 'png', 'pdf', 'doc', 'docx');

    //社团简介
    $result_upload_introduction = upload($upload_dir, 'file_introduction', $size_limit, $ext_limit);

    if (! $result_upload_introduction['status']) {
        $data = array(
            'message' => '社团简介上传失败：' . $result_upload_introduction['message'],
            /*'link'    => $http_referer*/
        );

        display_and_halt($data);
    }

    //社团主要成就
    $result_upload_achievement = upload($upload_dir, 'file_achievement', $size_limit, $ext_limit);

    if (! $result_upload_achievement['status']) {
        $data = array(
            'message' => '社团主要成就上传失败：' . $result_upload_achievement['message'],
            /*'link'    => $http_referer*/
        );

        display_and_halt($data);
    }


    $introduction_file_name = $result_upload_introduction['data'];
    $achievement_file_name  = $result_upload_achievement['data'];

}


//==================================================================================================
// 提交表单
//==================================================================================================

//保存个人信息
$new_signup = ORM::for_table('signup')->create();

if (1 == $type) {
    //报名类型：个人
    $new_signup->type        = 1;
    $new_signup->uc_uid      = isset($_SESSION['uid']) ? $_SESSION['uid'] : 0;
    $new_signup->uc_nickname = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '';
    $new_signup->name        = $name;
    $new_signup->school      = $school;
    $new_signup->email      = $email;
    $new_signup->field       = $field;
    $new_signup->phone       = $phone;
    $new_signup->title       = $title;
    $new_signup->content     = $content;
    $new_signup->dateline    = time();

    $new_signup->save();

    $new_signup_id = $new_signup->id();

    if (! $new_signup_id) {
        $data = array(
            'message' => '报名失败：数据写入错误',
            'link'    => $http_referer
        );

        display_and_halt($data);
    }

    //保存附件
    $arr_files_vars = array('transcript_file_name', 'visa_file_name', 'resume_file_name', 'others_file_name', 'photo_file_name');

    foreach ($arr_files_vars as $v) {
        $real_var = $$v;

        $new_attachment = ORM::for_table('attachments')->create();

        $new_attachment->singup_id      = $new_signup_id;
        $new_attachment->file_name      = $real_var['origin_name'];
        $new_attachment->real_file_name = $real_var['real_name'];

        $new_attachment->save();

        $new_attachment_id = $new_attachment->id();

        if (! $new_attachment_id) {
            $data = array(
                'message' => '报名失败：保存附件时出现错误',
                'link'    => $http_referer
            );

            display_and_halt($data);

            break;
        }
    }
} else {
    //报名类型：社团
    $new_signup->type        = 2;
    $new_signup->uc_uid      = isset($_SESSION['uid']) ? $_SESSION['uid'] : 0;
    $new_signup->uc_nickname = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '';
    $new_signup->grouptype   = $grouptype;
    $new_signup->name        = $name;
    $new_signup->school      = $school;
    $new_signup->phone       = $phone;
    $new_signup->email = $email;

    $new_signup->dateline    = time();


    $new_signup->save();

    $new_signup_id = $new_signup->id();

    if (! $new_signup_id) {
        $data = array(
            'message' => '报名失败：数据写入错误',
            'link'    => $http_referer
        );

        display_and_halt($data);
    }

    //保存附件
    $arr_files_vars = array('introduction_file_name', 'achievement_file_name');

    foreach ($arr_files_vars as $v) {
        $real_var = $$v;

        $new_attachment = ORM::for_table('attachments')->create();

        $new_attachment->singup_id      = $new_signup_id;
        $new_attachment->file_name      = $real_var['origin_name'];
        $new_attachment->real_file_name = $real_var['real_name'];

        $new_attachment->save();

        $new_attachment_id = $new_attachment->id();

        if (! $new_attachment_id) {
            $data = array(
                'message' => '报名失败：保存附件时出现错误',
                'link'    => $http_referer
            );

            display_and_halt($data);

            break;
        }
    }
}

//提交感悟到问吧

$api_url   =  $_config['api_base_url'] .'wenbapublish/post_article';

$post_data = array(
    'args' => json_encode(
        array('title'   => $title,
        'message' => $content,
        'topics' => (1 == $type) ? array('2016问吧奖学金', '经验分享') : array('2016问吧奖学金', '2016问吧优秀社团')
    ))
);

$curl_result     = curl_request($api_url, 'POST', $post_data, $_SESSION['api_cookie']);
$arr_curl_result = json_decode($curl_result, true);


//==================================================================================================
// 防止频繁提交提交
//==================================================================================================
if (isset($_SESSION['last_timestamp']) AND $_SESSION['last_timestamp']) {
    //如果两次提交时间小于指定的秒数
    if (time() - $_SESSION['last_timestamp'] < 10) {
        $data = array(
            'message' => '请勿重复提交表单',
            'link'    => $http_referer
        );

        display_and_halt($data);
    }
}

//提交成功，保存提交的时间戳，防止频繁刷新
$_SESSION['last_timestamp'] = time();


//给出提示信息
if (1 == $type){
$data = array(
    'message' => "报名成功,点击确定返回问吧查看并编辑您的文章",
    'link'    => 'http://www.wenba.ca/explore/'
);
}
if (2 == $type){
    $data = array(
        'message' => "报名成功,点击确定返回问吧",
        'link'    => 'http://www.wenba.ca/'
    );
}
display_and_halt($data);
