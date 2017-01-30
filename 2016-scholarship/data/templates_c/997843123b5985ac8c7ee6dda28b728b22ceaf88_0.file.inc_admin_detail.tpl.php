<?php /* Smarty version 3.1.27, created on 2016-06-13 09:51:47
         compiled from "/Users/doris/Desktop/root/2016-scholarship/templates/inc_admin_detail.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:179479794575eba7328fd33_03471605%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '997843123b5985ac8c7ee6dda28b728b22ceaf88' => 
    array (
      0 => '/Users/doris/Desktop/root/2016-scholarship/templates/inc_admin_detail.tpl',
      1 => 1465825894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179479794575eba7328fd33_03471605',
  'variables' => 
  array (
    'detail' => 0,
    'attachments' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_575eba7338abb7_38250757',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_575eba7338abb7_38250757')) {
function content_575eba7338abb7_38250757 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '179479794575eba7328fd33_03471605';
?>
<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>报名者详情</title>

    <table width="70%" border="1" align="center">
        <tr>
            <td>类型</td>
            <td><?php if (1 == $_smarty_tpl->tpl_vars['detail']->value->type) {?>个人<?php } else { ?>社团<?php }?></td>
        </tr>

        <tr>
            <td><?php if (1 == $_smarty_tpl->tpl_vars['detail']->value->type) {?>姓名<?php } else { ?>社团名称<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['detail']->value->name;?>
</td>
        </tr>

        <?php if (2 == $_smarty_tpl->tpl_vars['detail']->value->type) {?>
        <tr>
            <td>社团类型</td>
            <td><?php echo $_smarty_tpl->tpl_vars['detail']->value->grouptype;?>
</td>
        </tr>
        <?php }?>

        <tr>
            <td>学校</td>
            <td><?php echo $_smarty_tpl->tpl_vars['detail']->value->school;?>
</td>
        </tr>

        <?php if (1 == $_smarty_tpl->tpl_vars['detail']->value->type) {?>
        <tr>
            <td>专业</td>
            <td><?php echo $_smarty_tpl->tpl_vars['detail']->value->field;?>
</td>
        </tr>
        <?php }?>

        <tr>
            <td>电话</td>
            <td><?php echo $_smarty_tpl->tpl_vars['detail']->value->phone;?>
</td>
        </tr>

        <tr>
            <td><?php if (1 == $_smarty_tpl->tpl_vars['detail']->value->type) {?>个人经验/感悟<?php } else { ?>社团简介<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['detail']->value->title;?>
</td>
        </tr>

        <tr>
            <td>内容</td>
            <td><?php echo nl2br($_smarty_tpl->tpl_vars['detail']->value->content);?>
</td>
        </tr>

        <tr>
            <td>附件（点击文件名可下载）</td>
            <td>
                <ol>
                    <?php if (1 == $_smarty_tpl->tpl_vars['detail']->value->type) {?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['attachments']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                    <li>
                        <a href="admin.php?op=download&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['file_name'];?>
</a>
                    </li>
                    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                    <?php }?>
                </ol>
                <ol>
                    <?php if (2 == $_smarty_tpl->tpl_vars['detail']->value->type) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['attachments']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                            <li>
                                <a href="admin.php?op=download&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['file_name'];?>
</a>
                            </li>
                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                    <?php }?>
                </ol>
            </td>
        </tr>
    </table>
</head>

<body>


</body>

</html><?php }
}
?>