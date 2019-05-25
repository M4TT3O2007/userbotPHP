<?php
if (strstr($msg, ".tts")) {
  $tts = str_replace(".tts", "",$msg);
if(!strstr($tts, "lang")){
if(file_exists("lang.txt")){
if($type == "supergroup" or $type == "channel"){
	$MadelineProto->channels->deleteMessages(['channel' => $chatID, 'id' => [$msgid], ]);

	} else {
$MadelineProto->messages->deleteMessages(['revoke' => true, 'id' => [$msgid], ]);
}
 $data = array('msg' => $tts, 'lang' => 'Filiz', 'source' => 'ttsmp3');
 $ch = curl_init();
 curl_setopt ($ch, CURLOPT_URL, "https://ttsmp3.com/makemp3.php");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 curl_setopt ($ch, CURLOPT_REFERER, "https://ttsmp3.com/text-to-speech/Turkish/");
 curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +[url]http://www.google.com/bot.html)");
 $sonuc = curl_exec($ch);
 curl_close($ch);

$mp3url = json_decode($sonuc, true)["URL"];
copy($mp3url, "output.mp3");
$MadelineProto->messages->sendMedia([
    'peer' => $chatID,
    'media' => [
        '_' => 'inputMediaUploadedDocument',
        'file' => 'output.mp3',
        'attributes' => [
            ['_' => 'documentAttributeAudio', 'voice' => true,]
        ]
    ],
]);
unlink("output.mp3");
} else {
$MadelineProto->messages->editMessage(['peer' => $chatID, 'id' => $msgid, 'parse_mode' => "HTML", 'message' => '<b>Set the language!</b>
						<code>
						use: .ttslang
						</code>
						', ]);
	
}
}
}
if(strstr($msg, ".ttslang") and !strstr($msg, "use:")){
$tts2 = substr($msg,9,100);if (strstr($msg, ".tts")) {
  $tts = str_replace(".tts", "",$msg);
if(!strstr($tts, "lang")){
if(file_exists("lang.txt")){
if($type == "supergroup" or $type == "channel"){
	$MadelineProto->channels->deleteMessages(['channel' => $chatID, 'id' => [$msgid], ]);

	} else {
$MadelineProto->messages->deleteMessages(['revoke' => true, 'id' => [$msgid], ]);
}
 $data = array('msg' => $tts, 'lang' => file_get_contents("lang.txt"), 'source' => 'ttsmp3');
 $ch = curl_init();
 curl_setopt ($ch, CURLOPT_URL, "https://ttsmp3.com/makemp3.php");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 curl_setopt ($ch, CURLOPT_REFERER, "https://ttsmp3.com/text-to-speech/Turkish/");
 curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +[url]http://www.google.com/bot.html)");
 $sonuc = curl_exec($ch);
 curl_close($ch);

$mp3url = json_decode($sonuc, true)["URL"];
copy($mp3url, "output.mp3");
$MadelineProto->messages->sendMedia([
    'peer' => $chatID,
    'media' => [
        '_' => 'inputMediaUploadedDocument',
        'file' => 'output.mp3',
        'attributes' => [
            ['_' => 'documentAttributeAudio', 'voice' => true,]

        ]
    ],
'message' => '[Developed by Quiec](https://t.me/quiec)', 'parse_mode' => 'Markdown'
]);
unlink("output.mp3");
} else {
$MadelineProto->messages->editMessage(['peer' => $chatID, 'id' => $msgid, 'parse_mode' => "HTML", 'message' => '<b>Set the language!</b>
						<code>
						use: .ttslang
						</code>
						', ]);
	
}
}
}
if(strstr($msg, ".ttslang") and !strstr($msg, "use:")){
$tts2 = substr($msg,9,100);
if(file_exists("lang.txt")){
unlink("lang.txt");
}
if($tts2 == "it"){
$tts3 = "Carla";
	} elseif($tts2 == "it2") {
		$tts3 = "Bianca";
		} elseif($tts2 == "en") {
			$tts3 = "Justin";
			} elseif($tts2 == "en2") {
				$tts3 = "Joanna";
				} elseif($tts2 == "fr") {
					$tts3 = "Mathieu";
					} elseif($tts2 == "tr") {
						$tts3 = "Filiz";
						} else {
						$MadelineProto->messages->editMessage(['peer' => $chatID, 'id' => $msgid, 'parse_mode' => "HTML", 'message' => '<b>Not found this language code!</b>
						Available languages:
						<code>
						it -> Italian Women 1
						it2 -> Italian Women 2
						en -> English Man 1
						en2 -> Englsih Women 2
						fr -> France Man 1
						tr -> Turkish Women 1
						</code>
						', ]);
	
						}
					if($tts3){
						$MadelineProto->messages->editMessage(['peer' => $chatID, 'id' => $msgid, 'parse_mode' => "HTML", 'message' => '<b>Succesfully set the language!</b>
						Language:<code> '.$tts2.'
						</code>
						', ]);
						$dt = fopen('lang.txt', 'w');
fwrite($dt, $tts3);
fclose($dt);
						}}
	}
