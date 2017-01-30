<?php /* Smarty version 3.1.27, created on 2016-06-08 19:47:03
         compiled from "/Users/doris/Desktop/root/2016-scholarship/templates/admin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:972283345758ae7771eda2_02739940%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80e5b2151576ddaa5cbd4e39603f042609dff29e' => 
    array (
      0 => '/Users/doris/Desktop/root/2016-scholarship/templates/admin.tpl',
      1 => 1464277314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '972283345758ae7771eda2_02739940',
  'variables' => 
  array (
    'op' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5758ae777823f2_91828443',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5758ae777823f2_91828443')) {
function content_5758ae777823f2_91828443 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '972283345758ae7771eda2_02739940';
?>
<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>奖学金2015 - 登录</title>
</head>

<body>

<?php if ($_smarty_tpl->tpl_vars['op']->value == 'login') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('inc_admin_login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } elseif ($_smarty_tpl->tpl_vars['op']->value == 'main') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('inc_admin_main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }?>

</body>

</html><?php }
}
?>