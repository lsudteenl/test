<?php
 
$strAccessToken = "cVEzC6zHrhzVc5gHgNwQ4LhEi/4w+uGMqTaJEtYFWNmtiobUlcMOkab5Ay2sHA7OXxxozIhjQ1h5ikQkVUQHZv4eld7MGeUR7Vu++UvHRZB7s0ykSwwLjf5ilqwyLPej9SPZk3s3bfyQzHEqmwlcSAdB04t89/1O/w1cDnyilFU=";
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer cVEzC6zHrhzVc5gHgNwQ4LhEi/4w+uGMqTaJEtYFWNmtiobUlcMOkab5Ay2sHA7OXxxozIhjQ1h5ikQkVUQHZv4eld7MGeUR7Vu++UvHRZB7s0ykSwwLjf5ilqwyLPej9SPZk3s3bfyQzHEqmwlcSAdB04t89/1O/w1cDnyilFU=";
 
$arrPostData = array();
$arrPostData['to'] = "USER_ID";
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "นี้คือการทดสอบ Push Message";
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
