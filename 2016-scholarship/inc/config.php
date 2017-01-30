<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 23/06/2015
 * Time: 11:21 AM
 */

//报名开始时间
$_config['begin_time'] = strtotime('2015-06-30 12:00:00');

//报名结束时间
$_config['end_time']   = strtotime('2016-10-30 11:30:00');

//数据库文件
$_config['db_file'] = APP_ROOT . "/data/database/wbjxj2015.sqlite";

//问吧 app 中间层接口 URI，用于在报名的同时发布感悟到问吧网站上
$_config['api_base_url'] = 'https://api.51.ca/wen8app/';

//问吧测试站api
/*$_config['api_base_url'] = 'https://apidev.51.ca/';*/
