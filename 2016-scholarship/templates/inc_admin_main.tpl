<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>奖学金2015 - 主页</title>
</head>

<body>
    <table width="70%" align="center" border="1">
        <tr>
            <th colspan="7">报名者列表</th>
        </tr>

        <tr>
            <th>id</th>
            <th>类型</th>
            <th>姓名</th>
            <th>学校</th>
            <th>邮箱</th>
            <th>电话</th>
            <th>&nbsp;</th>
        </tr>

        {foreach $people as $v}
        <tr>
            <td>{$v['id']}</td>
            <td>{if $v['type'] == 1}个人{else}社团{/if}</td>
            <td>{$v['name']}</td>
            <td>{$v['school']}</td>
            <td>{$v['email']}</td>
            <td>{$v['phone']}</td>
            <td>
                <a href="admin.php?op=detail&id={$v['id']}" target="_blank">详情</a>
            </td>
        </tr>
        {/foreach}

    </table>
</body>

</html>