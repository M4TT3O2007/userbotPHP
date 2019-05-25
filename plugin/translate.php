<?php

if(strstr($msg, ".trt")){
if(!empty($update['message']['reply_to_msg_id'])){
	$yanitid = $update['message']['reply_to_msg_id'];
	if($type == "supergroup" or $type == "channel"){
 $text = $MadelineProto->channels->getMessages(['channel' => $chatID, 'id' => [$yanitid], ])['messages'][0]['message'];
 } else {
 $text = $MadelineProto->messages->getMessages(['id' => [$yanitid], ])['messages'][0]['message'];
 }
$tolang = str_replace(".trt","",str_replace("-","",str_replace(" ","",$msg)));
$fromlang = "auto";
	} else {
$trt = str_replace(".trt","",$msg);
		
if(empty($trt)){
	em($chatID, "Type text. Example: <code> .trt -en -tr hello </code>",$msgid);
	} else {
$explode1 = explode("-", $trt);
if(count($explode1) == "3"){
$fromlang = trim($explode1[1]);
$tolang = substr($explode1[2], 0, 2);
$text = substr($explode1[2], 3, 10000);
} else {
$fromlang = "auto";
$tolang = substr($explode1[1], 0, 2);
$text = substr($explode1[1], 3, 10000);
}}}
$text2 = str_replace(" ","+",$text);
$translate = json_decode(file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl='.$fromlang.'&tl='.$tolang.'&dt=t&q='.$text2.''));
em($chatID, '
Source:  <code> '.$fromlang.' </code>
To Lang: <code> '.$tolang.' </code>
Translated Text: <code> '.$translate[0][0][0].'</code>', $msgid
);
}