<?php /* Smarty version 3.1.27, created on 2016-06-09 16:38:27
         compiled from "/Users/doris/Desktop/root/2016-scholarship/templates/inc_admin_main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16903221245759d3c3db7d31_71442566%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ca7ac63218666221f19f68b7ea4412216e36583' => 
    array (
      0 => '/Users/doris/Desktop/root/2016-scholarship/templates/inc_admin_main.tpl',
      1 => 1465504707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16903221245759d3c3db7d31_71442566',
  'variables' => 
  array (
    'people' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5759d3c3e17ae0_51225967',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5759d3c3e17ae0_51225967')) {
function content_5759d3c3e17ae0_51225967 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16903221245759d3c3db7d31_71442566';
?>
<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>奖学金2015 - 主页</title>
</head>

<body>
    <table width="70%" align="center" border="1">
        <tr>
            <th colspan="5">报名者列表</th>
        </tr>

        <tr>
            <th>类型</th>
            <th>姓名</th>
            <th>学校</th>
            <th>电话</th>
            <th>&nbsp;</th>
        </tr>

        <?php
$_from = $_smarty_tpl->tpl_vars['people']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
        <tr>
            <td><?php if ($_smarty_tpl->tpl_vars['v']->value['type'] == 1) {?>个人<?php } else { ?>社团<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['school'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['phone'];?>
</td>
            <td>
                <a href="admin.php?op=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank">详情</a>
            </td>
        </tr>
        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>

    </table>
</body>

</html><?php }
}
?>