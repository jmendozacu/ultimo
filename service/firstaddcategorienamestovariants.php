<?php
set_time_limit(0);
ini_set("default_socket_timeout", 0);
ini_set("max_execution_time", 0);


$ch = curl_init();
$data_string = '{"data": {"action" : "advanced", "type" : "firstaddcatnamestoproducts"}}';

curl_setopt($ch,CURLOPT_URL, "http://meyUser:93fediqd9@www.mey.com/service/index.php");
//curl_setopt($ch,CURLOPT_URL, "http://meyUser:93fediqd9@www.mey-testserver.dev/service/index.php");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))                    
);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true); 
//curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_FORBID_REUSE, true); 
echo(curl_exec($ch));
curl_close($ch);