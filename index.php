<?php
 
$strAccessToken = "ACCESS_TOKEN";
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer Z5V96HAgqYHHzj6m2k5q3CoMIt6EsqyD6wxkQVwqvgRRRIE1aqBZvIt7jT/CgOLkmn/fXYXqFC+HruiO+4hGWdaza7MtjIzU7ddRDlE6SPUUitX/Vb5Qgr8CDZL5/iXU0UqZJEKbKP+/9beWQMsV3AdB04t89/1O/w1cDnyilFU=";
 
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
