/**
 * Created by doris on 16/6/7.
 */
<!--用户注册和登录页面切换-->
$("#register-button").click(function(){
    $("#login-form").addClass("button-display");
    $("#register-form").removeClass("button-display");
});
$("#return-button").click(function(){
    $("#register-form").addClass("button-display");
    $("#login-form").removeClass("button-display");
});

//去空格function
function removeAllSpace(str) {
    return str.replace(/\s+/g, "");
}

$(function() {

    /* 用户登录*/
    $('#js-btn-login').click(function () {
        var username = $.trim($('#js-login-username').val());
        var password = $.trim($('#js-login-password').val());
        if ('' === username || '' === password) {
            return false;
        }

        $.post(
            'ajax.php?op=login',
            {
                "username": username,
                "password": password
            },
            function (data) {
                if (1 == data.status) {

                    location.reload();
                } else {
                    alert(data.message);
                }
            }
        );
    });

    /* 用户登出*/
    $('.cancel-login-status').click(function () {
        $.get(
            "ajax.php?op=logout",{op:"logout"},function(){
                location.reload();
            }
        );
    });

    /* 用户注册检测*/
    /* 用户名检测*/
     $( "#reg-js-name" ).blur(function() {

        var reg_name = $.trim($("#reg-js-name").val());

         $('.js-error').remove();

         if ('' == reg_name) {
             $('#reg-js-name').after("<span class='js-error'>请填写用户名</span>");
             return false;
         }

         $.post(
             'ajax.php?op=check_name',
             {
                 "reg_name": reg_name
             },
             function (data) {
                 if (0 === data.status) {
                     $('#reg-js-name').after("<span class='js-error'>" + data.message + "</span>");

                     return false;
                 }
             }
         );

    });
    /* 用户昵称检测*/
    $( "#reg-js-nickname" ).blur(function() {

        var reg_nickname = $.trim($("#reg-js-nickname").val());

        $('.js-error').remove();

        if ('' == reg_nickname) {
            $('#reg-js-nickname').after("<span class='js-error'>请填写昵称</span>");
            return false;
        }

        $.post(
            'ajax.php?op=check_nickname',
            {
                "reg_nickname": reg_nickname
            },
            function (data) {
                if (0 === data.status) {
                    $('#reg-js-nickname').after("<span class='js-error'>" + data.message + "</span>");

                    return false;
                }
            }
        );

    });
    /* 密码不为空检测*/
    $( "#reg-js-pw" ).blur(function() {

        var reg_pwd = $.trim($("#reg-js-pw").val());

        $('.js-error').remove();

        if ('' == reg_pwd) {
            $('#reg-js-pw').after("<span class='js-error'>请填写密码</span>");

            return false;
        }

    });
    /* 重复输入密码检测*/
    $( "#reg-js-re-pw" ).blur(function() {
        var reg_pwd = $.trim($("#reg-js-pw").val());
        var reg_re_pwd = $.trim($("#reg-js-re-pw").val());

        $('.js-error').remove();

        if (!(reg_pwd == reg_re_pwd)) {
            $('#reg-js-re-pw').after("<span class='js-error'>两次密码填写不一致</span>");

            return false;
        }

    });
    /* 邮箱检测*/
    $( "#reg-js-email" ).blur(function() {

        var reg_email = $.trim($("#reg-js-email").val());
        var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;

        $('.js-error').remove();

        if ('' == reg_email) {
            $('#reg-js-email').after("<span class='js-error'>请填写邮箱</span>");

            return false;
        }
        if(!reg.test(reg_email)){
            $("#reg-js-email").after("<span class='js-error'>请正确填写邮件地址</span>");

            return false;
        }

        $.post(
            'ajax.php?op=check_email',
            {
                "reg_email": reg_email
            },
            function (data) {
                if (0 === data.status) {
                    $('#reg-js-email').after("<span class='js-error'>" + data.message + "</span>");

                    return false;
                }
            }
        );


    });

    /* 用户注册传值*/
    $('#reg-js-btn-submit').click(function () {

        var reg_name = $.trim($("#reg-js-name").val()),
            reg_nickname = $.trim($("#reg-js-nickname").val()),
            reg_pwd = $.trim($("#reg-js-pw").val()),
            reg_re_pwd = $.trim($("#reg-js-re-pw").val()),
            reg_email = $.trim($("#reg-js-email").val());

        $.post(
            'ajax.php?op=register',
            {
                "reg_name": reg_name,
                "reg_nickname": reg_nickname,
                "reg_pwd": reg_pwd,
                "reg_email": reg_email

            },
            function (data) {
                if (1 === data.status) {
                    alert("注册成功,点击确定返回报名页面");
                    location.reload();
                } else {
                    alert(data.message);
                }
            }
        );
    });



    /**
     * 选择报名类型
     */
    $('#js-btn-type-1').click(function () {
        var type = 1;
        $("#hiddentype").val(type);

    });

    $('#js-btn-type-2').click(function () {
        var type = 2;
        $("#hiddentype").val(type);


    });


    /**
     * 选择上传的附件时，将文件名显示在按钮上
     */

    $('.js-files').change(function () {
        var file_name = this.files[0].name;
        var obj_label = $(this).parent().find('label');
        obj_label.text(' （' + file_name + '）');
    });
    
    /**
     * 个人组报名
     */
    $('#js-btn-submit').click(function () {

        if (1 == $("#hiddentype").val()) {
            var name = $.trim($('#js-name').val()),
                school = $.trim($('#js-school').val()),
                field = $.trim($('#js-field').val()),
                phone = $.trim($('#js-phone').val()),
                email = $.trim($('#js-email').val()),
                title = $.trim($('#js-title').val()),
                content = $.trim($('#js-content').val()),

                files_missed = 0;

            var content_check = removeAllSpace(content);

            if ('' == name) {
                alert('请填写姓名');

                return false;
            }

            if ('' == school) {
                alert('请填写学校');

                return false;
            }

            if ('' == field) {
                alert('请填写专业');

                return false;
            }

            if ('' == phone) {
                alert('请填写联系电话');

                return false;
            }

            if ('' == title) {
                alert('请填写短文标题');

                return false;
            }

            if ('' == content_check) {
                alert('请填写留学生活感悟');

                return false;
            }
            /*测试*/
             if (500 > content_check.length) {
             alert('留学生活感悟不能少于500字');

             return false;
             }



            $('.js-verify-1').each(function() {
                if (undefined === this.files[0] && 'file_others' !== $(this).attr('name')) {
                    alert('请确定您已上传所有"*"星号文件');

                    files_missed = 1;

                    return false;
                }
            });

            if (files_missed) {
                return false;
            }
            $("#uploading").removeClass("button-display");
       }
    });

    /**
     * 社团组报名
     */
    $('#js-btn-submit-2').click(function () {

        if (2 == $("#hiddentype").val()) {
            var name = $.trim($('#js-name-2').val()),
                school = $.trim($('#js-school-2').val()),
                phone = $.trim($('#js-phone-2').val()),
                email = $.trim($('#js-email-2').val()),

                files_missed = 0;

            if ('' === name) {
                alert('请填写社团名称');

                return false;
            }

            if ('' === school) {
                alert('请填写所属学校');

                return false;
            }

            if ('' === phone) {
                alert('请填写联系电话');

                return false;
            }

            if ('' === email) {
                alert('请填写邮箱地址');

                return false;
            }

            $('.js-verify-2').each(function() {
                if (undefined === this.files[0] && 'file_others' !== $(this).attr('name')) {
                    alert('请上传社团简介及社团主要成就介绍');

                    files_missed = 1;

                    return false;
                }
            });

            if (files_missed) {
                return false;
            }

            $("#uploading").removeClass("button-display");

        }

    });

    /**
     * 表单自动保存
     */
    $('form').garlic();

    /**
     * 注册验证
     */



    $("#js-group-type1").click(function(){
        $("#group-type-2").addClass("button-display");
        $("#group-type-3").addClass("button-display");
        $("#group-type-1").removeClass("button-display");
    });
    $("#js-group-type2").click(function(){
        $("#group-type-1").addClass("button-display");
        $("#group-type-3").addClass("button-display");
        $("#group-type-2").removeClass("button-display");
    });
    $("#js-group-type3").click(function(){
        $("#group-type-1").addClass("button-display");
        $("#group-type-2").addClass("button-display");
        $("#group-type-3").removeClass("button-display");
    });


});