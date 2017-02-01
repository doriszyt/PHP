<?php

$servername = "localhost";
$username = "ca51www_zt";
$password = "~]UOQ{QS2cQ_";

$link = mysql_connect($servername, $username, $password, "zt_51_ca");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysql_get_host_info($link) . PHP_EOL;

mysql_close($link);