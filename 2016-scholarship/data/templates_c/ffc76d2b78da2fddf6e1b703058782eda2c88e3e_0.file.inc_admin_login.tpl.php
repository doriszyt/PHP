<?php /* Smarty version 3.1.27, created on 2016-06-08 19:47:03
         compiled from "/Users/doris/Desktop/root/2016-scholarship/templates/inc_admin_login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:15956427395758ae77789797_16930054%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffc76d2b78da2fddf6e1b703058782eda2c88e3e' => 
    array (
      0 => '/Users/doris/Desktop/root/2016-scholarship/templates/inc_admin_login.tpl',
      1 => 1464278600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15956427395758ae77789797_16930054',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5758ae7778d2d5_86478091',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5758ae7778d2d5_86478091')) {
function content_5758ae7778d2d5_86478091 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15956427395758ae77789797_16930054';
?>
<form method="post" action="admin.php?op=chk_login">
    <h1>管理员登录</h1>
    <p>
        <input type="password" name="password" />
    </p>
    <p>
        <button type="submit">登录</button>
    </p>
</form><?php }
}
?>