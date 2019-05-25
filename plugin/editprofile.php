<?php
if(strstr($msg, ".ebio")){
	$ebio = str_replace(".ebio", "", $msg);
	if(empty($ebio)){
		em($chatID, "Lütfen bir bio için yazı yazın.", $msgid);
		} else {
	$MadelineProto->account->updateProfile(['about' => $ebio, ]); 
	em($chatID, "Bio başarıyla güncellendi!", $msgid);
		}}
if(strstr($msg, ".ename")){
	$ebio = str_replace(".ename", "", $msg);
	if(empty($ebio)){
		em($chatID, "Lütfen bir isim için yazı yazın.", $msgid);
		} else {
	$MadelineProto->account->updateProfile(['last_name' => $ebio, ]); 
	em($chatID, "İsim başarıyla güncellendi!", $msgid);
		}}
if($msg == ".pphoto"){
	touch('a.jpg');
	$yanitid = $update['message']['reply_to_msg_id'];
	if(empty($yanitid)){
		em($chatID, "Reply a photo!", $msgid);
		} else {
	if($type == "supergroup" or $type == "channel"){
 $s = $MadelineProto->channels->getMessages(['channel' => $chatID, 'id' => [$yanitid], ])['messages'][0]['media']['photo'		];
 } else {
 $s = $MadelineProto->messages->getMessages(['id' => [$yanitid], ])['messages'][0]['media']['photo'];
 }

$MadelineProto->download_to_file($s, 'a.jpg');
$MadelineProto->photos->uploadProfilePhoto(['file' => 'a.jpg', ]); 
em($chatID, "Succesfully uploaded profile photo.", $msgid);
	 unlink('a.jpg');
	}}
	