<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>报名者详情</title>

    <table width="70%" border="1" align="center">
        <tr>
            <td>类型</td>
            <td>{if 1 == $detail->type}个人{else}社团{/if}</td>
        </tr>

        <tr>
            <td>{if 1 == $detail->type}姓名{else}社团名称{/if}</td>
            <td>{$detail->name}</td>
        </tr>

        {if 2 == $detail->type}
        <tr>
            <td>社团类型</td>
            <td>{$detail->grouptype}</td>
        </tr>
        {/if}

        <tr>
            <td>学校</td>
            <td>{$detail->school}</td>
        </tr>

        {if 1 == $detail->type}
        <tr>
            <td>专业</td>
            <td>{$detail->field}</td>
        </tr>
        {/if}

        <tr>
            <td>电话</td>
            <td>{$detail->phone}</td>
        </tr>

        <tr>
            <td>{if 1 == $detail->type}个人经验/感悟{else}社团简介{/if}</td>
            <td>{$detail->title}</td>
        </tr>

        <tr>
            <td>内容</td>
            <td>{$detail->content|nl2br}</td>
        </tr>

        <tr>
            <td>附件（点击文件名可下载）</td>
            <td>
                <ol>
                    {if 1 == $detail->type}
                    {foreach $attachments as $v}
                    <li>
                        <a href="admin.php?op=download&id={$v['id']}">{$v['file_name']}</a>
                    </li>
                    {/foreach}
                    {/if}
                </ol>
                <ol>
                    {if 2 == $detail->type}
                        {foreach $attachments as $v}
                            <li>
                                <a href="admin.php?op=download&id={$v['id']}">{$v['file_name']}</a>
                            </li>
                        {/foreach}
                    {/if}
                </ol>
            </td>
        </tr>
    </table>
</head>

<body>


</body>

</html>