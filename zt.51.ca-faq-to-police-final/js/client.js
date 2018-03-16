/**
 * Created by Doris on 2015-12-02.
 */

/**
 * 验证提交的表单
 *
 * @returns {boolean} 验证通过返回 true,否则 false
 */
function verifyForm() {
    var obj_name    = $('#name'),
        obj_email   = $('#email'),
        obj_content = $('#content');

    var name    = $.trim(obj_name.val());
    var email   = $.trim(obj_email.val());
    var content = $.trim(obj_content.val());

    var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;

    $('.js-error').remove();

    if ('' == name) {
        obj_name.after("<span class='js-error'>请填写联系人</span>");

        return false;
    }

    if (name.length >= 50) {
        obj_name.after("<span class='js-error'>请输入适当长度用户名</span>");

        return false;
    }

    if ('' == email) {
        obj_email.after("<span class='js-error'>请填写邮件</span>");

        return false;
    }

    if (email.length >= 50) {
        obj_email.after("<span class='js-error'>邮箱长度不可超过50个字符</span>");

        return false;
    }

    if(!reg.test(email)){
        obj_email.after("<span class='js-error'>请正确填写邮件地址</span>");
        return false;
    }

    if (content.length >= 500) {
        obj_content.after("<span class='js-error'>请将留言内容控制在500字内</span>");

        return false;
    }
    return true;
}
