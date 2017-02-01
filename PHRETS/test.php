<?php

$conn_id = ftp_connect('3pv.torontomls.net') or die("Couldn't connect");
$login_result = ftp_login($conn_id, 't016for@photos', 'N1k203');
echo"连接成功";
$address = "N3647784";
$dir = substr($address, -3);

$local_file = 'download/'.$address.'.jpg';
$server_file = "/mlsphotos/1/".$dir."/".$address.".jpg";

if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
    echo "Successfully written to $local_file\n";
} else {
    echo "There was a problem\n";
}
ftp_close($conn_id);
