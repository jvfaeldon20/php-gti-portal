<?php
$sms_number    = $_POST['sms_caller_no'];
$sms_message   = $_POST['sms_message_2'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://172.21.251.143/api/send_sms");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

#sms_number = number
#text_param = message

curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"text\":\"#param#\",\"port\":[2],\"param\":[{\"number\":\"$sms_number\",\"text_param\":[\"$sms_message\"],\"user_id\":1}]}�");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, "admin" . ":" . "admin");

$headers   = array();
$headers[] = "Content-Type: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response  = curl_exec($ch);
curl_close ($ch);
echo "<script>alert('Message sent!');window.close();</script>"	
?>
