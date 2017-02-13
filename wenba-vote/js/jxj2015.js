/**
 * Created by Max on 22/06/2015.
 */

$(function() {

    $('#js-btn-login').click(function() {
        var username = $.trim($('#js-login-username').val());
        var password = $.trim($('#js-login-password').val());

        if ('' === username || '' === password) {
            return false;
        }

        $.post(
            'ajax.php?op=login',
            {"username": username, "password": password},
            function(data) {
                if (1 === data.status) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            }
        );
    });

    /**
     * 选择上传的附件时，将文件名显示在按钮上
     */
    $('.js-files').change(function() {
        var file_name = this.files[0].name;
        var obj_label = $(this).parent().find('label');
        var old_label_name = obj_label.text();

        obj_label.text(old_label_name.replace(/（.+）/, '') + '（' + file_name + '）');
    });

    /**
     * 表单提交按钮
     */
    $('#js-form').submit(function() {

        if (1 === SERVER_FLAG_TYPE) {
            var name = $.trim($('#js-name').val()),
                school = $.trim($('#js-school').val()),
                field = $.trim($('#js-field').val()),
                intro = $.trim($('#js-intro').val()),
                phone = $.trim($('#js-phone').val()),
                content = $.trim($('#js-content').val()),
                title = $.trim($('#js-title').val()),
                files_missed = 0;

            if ('' === name) {
                alert('请填写姓名');

                return false;
            }

            if ('' === school) {
                alert('请填写学校');

                return false;
            }

            if ('' === field) {
                alert('请填写专业');

                return false;
            }

            if ('' === intro) {
                alert('请填写一句话简介');

                return false;
            }

            if ('' === content) {
                alert('请填写留学生活感悟');

                return false;
            }

            if (500 > content.length) {
                alert('留学生活感悟不能少于500字');

                return false;
            }

            $('.js-files').each(function() {
                if (undefined === this.files[0] && 'file_others' !== $(this).attr('name')) {
                    alert('请上传成绩单、学签、个人简历及个人像片');

                    files_missed = 1;

                    return false;
                }
            });

            if (files_missed) {
                return false;
            }
        } else {
            var name = $.trim($('#js-name').val()),
                abbr_name = $.trim($('#js-abbr-name').val()),
                school = $.trim($('#js-school').val()),
                contact = $.trim($('#js-contact').val()),
                phone = $.trim($('#js-phone').val()),
                content = $.trim($('#js-content').val()),
                title = $.trim($('#js-title').val()),
                files_missed = 0;

            if ('' === name) {
                alert('请填写社团名称');

                return false;
            }

            if ('' === abbr_name) {
                alert('请填写简称');

                return false;
            }

            if ('' === school) {
                alert('请填写所属学校');

                return false;
            }

            if ('' === contact) {
                alert('请填写联系人');

                return false;
            }

            if ('' === content) {
                alert('请填写社团简介');

                return false;
            }

            if (500 > content.length) {
                alert('社团简介不能少于500字');

                return false;
            }
        }

        if ('' === phone) {
            alert('请填写电话');

            return false;
        }

        if ('' === title) {
            alert('请填写标题');

            return false;
        }

        $('#js-btn-submit').attr('disabled', true).text('努力提交中，请耐心等待……');

        return true;
    });

    /**
     * 选择报名类型
     */
    $('#js-btn-type-1').click(function() {
        location.href = 'index.php?type=1#form_is_here';
    });

    $('#js-btn-type-2').click(function() {
        location.href = 'index.php?type=2#form_is_here';
    });

    /**
     * 表单自动保存
     */
    $('form').garlic();

});
