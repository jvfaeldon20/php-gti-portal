<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://172.21.251.143/api/send_sms");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

#sms_number = number
#text_param = message

curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"text\":\"#param#\",\"port\":[2],\"param\":[{\"number\":\"09286394252\",\"text_param\":[\"test\"],\"user_id\":1}]}’");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, "admin" . ":" . "admin");

$headers = array();
$headers[] = "Content-Type: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close ($ch);
?>
