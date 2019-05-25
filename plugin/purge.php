<?php
if(strstr($msg, ".purge")){
	$purge = str_replace(".purge","",$msg);
	if(strstr($purge, "me")){
	$me2 = $MadelineProto->get_self();	
	$start = time();
	$MadelineProto->channels->deleteUserHistory(['channel' => $chatID, 'user_id' => $me2['id'], ]); 
$finish = time() - $start;
sm($chatID, '<b> Deleted all your messages in   '.$finish.'  second </b>');
	} elseif(strstr($purge, "all")){
		$yanitid = $update['message']['reply_to_msg_id'];
		if(!empty($yanitid)){
		if($type == "supergroup" or $type == "channel"){
	$s = $MadelineProto->channels->getMessages(['channel' => $chatID, 'id' => [$yanitid], ])['users'][0]['id'];
$s1 = $MadelineProto->channels->getMessages(['channel' => $chatID, 'id' => [$yanitid], ])['users'][0]['first_name'];

			} else {
	$s = $MadelineProto->messages->getMessages(['id' => [$yanitid], ])['users'][0]['id'];
	$s1 = $MadelineProto->messages->getMessages(['id' => [$yanitid], ])['users'][0]['first_name'];

	}
			$start = time();
	$MadelineProto->channels->deleteUserHistory(['channel' => $chatID, 'user_id' => $s, ]); 
$finish = time() - $start;
em($chatID, '<b> Deleted all '.$s1.' messages in   '.$finish.'  second </b>', $msgid);
} else {
	em($chatID, "<code> Reply a message! </code>",$msgid);
}
		} else {
			$yanitid = $update['message']['reply_to_msg_id'];
		
		if($type == "supergroup" or $type == "channel"){
	$s = $MadelineProto->channels->getMessages(['channel' => $chatID, 'id' => [$yanitid], ])['messages'][0]['id'];
			$ns = $s;
				} else {
		
	$s = $MadelineProto->messages->getMessages(['id' => [$yanitid], ])['messages'][0]['id'];
	$ns = $s;
	}
	$MadelineProto->channels->deleteMessages(['channel' => $chatID, 'id' => [$s], ]); 
	$sifir = "0";
	$start = time();
	while($s < $msgid){
	$sifir++;
	$s++;
	$MadelineProto->channels->deleteMessages(['channel' => $chatID, 'id' => [$s], ]); 
	}
	$MadelineProto->channels->deleteMessages(['channel' => $chatID, 'id' => [$ns], ]); 
	$finish = time() - $start;
	sm($chatID, 'Deleted '.$sifir.' message in '.$finish.' second');

	}}
