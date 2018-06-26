<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: https://donations.diabetes.org');
//header('Access-Control-Allow-Origin:*');




$data = array(
	'grant_type' => 'client_credentials',
	'client_id' => 'YOUR CLIENT ID',
	'client_secret' => 'YOUR CLIENT SECRET'	
);
$data_string = json_encode($data);

$ch = curl_init('https://risktest-api.diabetes.org/api/token');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);  
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);
$result=curl_exec($ch);
curl_close($ch);
echo $result;
//var_dump($result);
?>
