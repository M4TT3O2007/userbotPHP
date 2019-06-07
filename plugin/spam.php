<?php
if(strstr($msg, ".spam")){
	$spam = explode(" ", $msg);
	$sifir = "0";
	if(ctype_digit($spam[1])){
		while($sifir < $spam[1]){
		sm($chatID, str_replace(".spam","",str_replace($spam[1],"",$msg)));
sleep(1);
		$sifir++;
		}
		}
	}
