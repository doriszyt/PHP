<?php

// #############################################################################
// 需要替换的字符
$config['replacewords']['zh-cn'] = array(
	'寮国' => '老挝',
	'义肢' => '假肢',
	'计画' => '计划',
	'杯葛' => '抵制',
	'芝士' => '奶酪',
	'修葺' => '维修',
	'网路' => '网络',
	'公帑' => '公款',
	'柏文' => '公寓',
	'痴肥' => '肥胖',
	'平治' => '奔驰',
	'贵芙' => '圭尔夫',
	'贵湖' => '圭尔夫',
	'雪柏' => 'Sheppard Ave.',
	'斯高沙省' => '新斯科舍省',
	'缅省' => '曼尼托巴省',
	//'亚省' => '阿尔伯塔省',
	'沙省' => '萨斯喀彻温省',
	'甘乃迪' => '肯尼迪',
	'义大利' => '意大利',
	'欧巴马' => '奥巴马',
	//'杜鲁多' => '特鲁多',
	'特鲁多' => '杜鲁多',
	'弗莱舍' => '费拉逖',
	'费海提' => '费拉逖',
	'佛拉赫蒂' => '费拉逖',
	'电单车' => '摩托车',
	'坚尼地' => 'Kennedy Rd.',
	'士刁' => 'Steels Ave.',
	'铁骑士' => '摩托车手',
	'佳士拿' => '克莱斯勒',
	'满地可' => '蒙特利尔',
	'咸美顿' => '哈密尔顿',
	'亚伯达省' => '阿尔伯塔省',
	'纽宾士域' => '新布伦瑞克',
	'阿尔伯达省' => '阿尔伯塔省',
	'满地可大学' => '蒙特利尔大学',
	'蒙特利尔银行' => '满银',
	'义大利' => '意大利',
	'尼加拉瓜瀑布' => '尼亚加拉瀑布',
	'欧狄' => '奥迪',
	'甘迺迪' => '肯尼迪',
	'冇' => '没有',
	'利载拿' => '里贾纳',
	'卡加利' => '卡尔加里',
);

$config['replacewords']['zh-tw'] = array(
	'《' => '〖',
	'》' => '〗',
);

$config['replacewords']['zh-hk'] = array(
	'《' => '〖',
	'》' => '〗',
);

// #############################################################################
// 繁简转换
function converter_fj($in, $to)
{
	global $config;

	define("MEDIAWIKI_PATH", dirname(__FILE__) . '/mediawiki-1.15.4/');
	require_once('mediawiki-zhconverter.inc.php');

	$toLangs = array('zh-cn', 'zh-tw', 'zh-hk');
	if(!in_array($to, $toLangs)) 
		$to = 'zh-cn';

	$convertor = new MediaWikiZhConverter();
	$content = $convertor->convert($in, $to);

	if(!empty($config['replacewords']["$to"]))
	{
		$content = str_replace(array_keys($config['replacewords']["$to"]), array_values($config['replacewords']["$to"]), $content);
	}

	return $content;
}

?>