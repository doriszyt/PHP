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
        <h2>{$message}</h2>
        <p>
            <a href="{$link}">确定</a>
        </p>
    </div>
</body>

</html>
