<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17/10/2014
 * Time: 16:50 PM
 */

include('./inc/init.php');

$secret_code_set = '9059402051';
$secret_code     = isset($_GET['secret']) ? trim($_GET['secret']) : '';
if ('' == $secret_code OR md5($secret_code_set) != md5($secret_code))
{
    die('Staff Only!');
}

//读取列表记录
$readers_list = ORM::for_table('policeyangconference')->order_by_desc('created_at')->find_array(); //调用数据库数值,按时间降序排列
?>
<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>提问者列表</title>

    <style type="text/css">
        table {background-color: #000;}
        td {background-color: #fff;}
        td strong {color: #0169d0;}
    </style>
</head>

<body>

<h1 align="center">"杨警官读者见面会"提问者列表</h1>
    <?php if (is_array($readers_list) AND count($readers_list)): ?>
        <?php foreach ($readers_list as $v): ?> <!--循环数组,遍历给定的 readers_list数组,每次循环中当前单位的值被付给$v并且指针向前移一个 -->
            <table border="0" width="80%" align="center" cellspacing="1" cellpadding="5" style="margin-bottom: 15px;">
                <tr>
                    <td>
                        <strong>联系人:</strong> <?php echo htmlspecialchars($v['name']); ?><br/>
                        <strong>邮箱:</strong> <?php echo htmlspecialchars($v['email']); ?><br/>
                        <strong>提交时间:</strong> <?php echo date("Y-m-d H:i:s", $v['created_at']); ?><br/>
                        <strong>IP地址:</strong> <?php echo htmlspecialchars($v['ip_address']); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>提问内容:</strong>
                        <p><?php echo nl2br(htmlspecialchars($v['content'])); ?></p>
                    </td>
                </tr>
            </table>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>