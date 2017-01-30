<?php /* Smarty version 3.1.27, created on 2016-06-08 10:14:10
         compiled from "/Users/doris/Desktop/root/2016-scholarship/templates/message.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:136977112157582832d3ee59_80002760%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa1050ba8dc2dd007a6774e86ad7503dba8838d9' => 
    array (
      0 => '/Users/doris/Desktop/root/2016-scholarship/templates/message.tpl',
      1 => 1464277314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136977112157582832d3ee59_80002760',
  'variables' => 
  array (
    'message' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57582832d9c744_24864898',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57582832d9c744_24864898')) {
function content_57582832d9c744_24864898 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '136977112157582832d3ee59_80002760';
?>
<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>消息 - 问吧奖学金2015</title>
	<style>
		body { padding: 0; margin: 0; background: #DADADA; font-family: "microsoft YaHei"}
		.alert-box { width: auto; background: #fff; margin: 0 1em; font-size: 14px; }
		.alert-box h2 { font-size: 16px; color: #000; text-align: center; padding: 1em 0; }
		.alert-box a { display: block; margin: 0 1em; padding: 1em 0; background: #5CB85C; color: #fff; border: 1px solid #50AD50; text-align: center; text-decoration: none; }
		/* 小屏幕（平板，大于等于 768px） */
		@media (min-width: 768px) {
			.alert-box { width: 300px; margin: -100px 0 0 -150px; position: absolute; left: 50%; top: 50%; box-shadow: 0 0 10px rgba(0,0,0,0.5); }
		 }
	</style>
</head>

<body>
    <div class="alert-box">
        <h2><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h2>
        <p>
            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">确定</a>
        </p>
    </div>
</body>

</html>
<?php }
}
?>