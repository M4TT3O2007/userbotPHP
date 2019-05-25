<?php
// Get info a user/bot
// Created by Quiec [ Telegram: @Quiec ]
if($msg == ".info"){
if(empty($update['message']['reply_to_msg_id'])){
	$MadelineProto->messages->editMessage(['peer' => $chatID, 'id' => $msgid, 'parse_mode' => "HTML", 'message' => '
						<code>
						Reply a message!
						
						</code>
						', ]);
	} else {
	$yanitid = $update['message']['reply_to_msg_id'];
	if($type == "supergroup" or $type == "channel"){
	$MadelineProto->channels->deleteMessages(['channel' => $chatID, 'id' => [$msgid], ]);

	} else {
$MadelineProto->messages->deleteMessages(['revoke' => true, 'id' => [$msgid], ]);
}
	if($type == "supergroup" or $type == "channel"){
	$s = $MadelineProto->channels->getMessages(['channel' => $chatID, 'id' => [$yanitid], ])['users'][0]['id'];
	} else {
	$s = $MadelineProto->messages->getMessages(['id' => [$yanitid], ])['users'][0]['id'];
	}
	touch(''.$s.'.jpg');
	$info = $MadelineProto->get_full_info($s);
	if($info["full"]["profile_photo"]){
	$MadelineProto->download_to_file($info["full"]["profile_photo"], "$s.jpg");
	if(empty($info["full"]["user"]["last_name"])){
		$lastname = "Not available.";
		} else {
		$lastname = $info["full"]["user"]["last_name"];
		}
	if(!empty($info["full"]["about"])){
		$about = $info["full"]["about"];
		} else {
		$about = "Not available";
		}
	if($info["full"]["user"]["bot"] == true){
		$bott = "✅";
		$status = "Bot";
		} else {
			if(empty($info["full"]["user"]["status"]["was_online"])){
		if($info["full"]["user"]["status"]["_"] == "userStatusRecently"){
			$status = "Recently saw";
			} elseif($info["full"]["user"]["status"]["_"] == "userStatusOnline"){ 
		$status = "Online.";}
		} else {
		$status = ''.date('d.m.Y H:i:s',$info["full"]["user"]["status"]["was_online"]).'';
		}
		$bott = "❌";
		}
		
	if(!empty($info["full"]["user"]["username"])){
		$usernam = '@'.$info["full"]["user"]["username"].'';
		} else {
		$usernam = "Not available";
		}
	$MadelineProto->messages->sendMedia([
    'peer' => $chatID,
    'media' => [
        '_' => 'inputMediaUploadedPhoto',
        'file' => ''.$s.'.jpg'
    ],
    'message' => '
ID: <code>'.$info["full"]["user"]["id"].'</code>
First Name: <code>'.$info["full"]["user"]["first_name"].'</code>
Last Name: <code>'.$lastname.'</code>
Username: '.$usernam.'
Status: <code>'.$status.'</code>
Bio: <code>'.$about.'</code>
Data Center: <b>'.$info["full"]["user"]["photo"]["photo_small"]["dc_id"].'</b>
Bot: '.$bott.'

',
    'parse_mode' => 'html'
]);
unlink(''.$s.'.jpg');
	} else {
	$MadelineProto->messages->editMessage(['peer' => $chatID, 'id' => $msgid, 'parse_mode' => "HTML", 'message' => '
					ID: <code>'.$info["full"]["user"]["id"].'</code>
First Name: <code>'.$info["full"]["user"]["first_name"].'</code>
Last Name: <code>'.$lastname.'</code>
Username: '.$usernam.'
Status: <code>'.$status.'</code>
Bio: <code>'.$about.'</code>
Data Center: <b>'.$info["full"]["user"]["photo"]["photo_small"]["dc_id"].'</b>
Bot: '.$bott.'
						', ]);
	} }}