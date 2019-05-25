<?php
if(strstr($msg, ".mock")){
	if(empty($update['message']['reply_to_msg_id'])){
		$mocksuz = substr($msg,6,100);
		} else {
		$yanitid = $update['message']['reply_to_msg_id'];
	if($type == "supergroup" or $type == "channel"){
 $mocksuz = $MadelineProto->channels->getMessages(['channel' => $chatID, 'id' => [$yanitid], ])['messages'][0]['message'];
 } else {
 $mocksuz = $MadelineProto->messages->getMessages(['id' => [$yanitid], ])['messages'][0]['message'];
 }}

$firstpass = str_split($mocksuz);
$outstring = "";
for ($i = 0; $i < strlen($mocksuz); $i++) {
    if ($i == 0) {
        $outstring[$i] = strtoupper($firstpass[$i]);
    }
    elseif (ctype_upper($outstring[$i-1])) {
       
        if (mt_rand(0,3) == 2) {
            $outstring[$i] = strtoupper($firstpass[$i]);
        }
        else {
            $outstring[$i] = strtolower($firstpass[$i]);
        }
    }
    else {
        if (mt_rand(0,3) == 2) {
            $outstring[$i] = strtolower($firstpass[$i]);
        }
        else {
            $outstring[$i] = strtoupper($firstpass[$i]);
        }
    }
}
$final = $outstring;
$MadelineProto->messages->editMessage(['peer' => $chatID, 'id' => $msgid, 'message' => $final, ]);


}