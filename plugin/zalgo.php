<?php
if(strstr($msg, ".zalgo")){
	if(empty($update['message']['reply_to_msg_id'])){
		$zkesi = substr($msg,7,100);
		} else {
		$yanitid = $update['message']['reply_to_msg_id'];
	if($type == "supergroup" or $type == "channel"){
 $zkesi = $MadelineProto->channels->getMessages(['channel' => $chatID, 'id' => [$yanitid], ])['messages'][0]['message'];
 } else {
 $zkesi = $MadelineProto->messages->getMessages(['id' => [$yanitid], ])['messages'][0]['message'];
 }}

	$bosluksuzz = str_replace(" ","+",$zkesi);
	$zalgotext = file_get_contents("https://zalgo.io/api?text=$bosluksuzz");
	$MadelineProto->messages->editMessage(['peer' => $chatID, 'id' => $msgid, 'message' => "$zalgotext \n Plugin by @Quiec", ]);

	}