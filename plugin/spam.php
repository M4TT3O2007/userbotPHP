<?php
if(strstr($msg, ".spam")){
	$spam = explode(" ", $msg);
	if($type == "supergroup" or $type == "channel"){
	$MadelineProto->channels->deleteMessages(['channel' => $chatID, 'id' => [$msgid], ]);

	} else {
$MadelineProto->messages->deleteMessages(['revoke' => true, 'id' => [$msgid], ]);
}
	$sifir = "0";
	if(ctype_digit($spam[1])){
		while($sifir < $spam[1]){
		sm($chatID, str_replace(".spam","",str_replace($spam[1],"",$msg)));
		$sifir++;
		}
		}
	}
