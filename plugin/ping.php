<?php
if(strstr($msg, ".ping")){
        $ping = "<i>Pong...</i>";
        logger($update['message']['to_id'],5);
        $start_time = microtime(true); 
        $MadelineProto->messages->editMessage(
            [
                'peer' => $update,
                'id' => $messageid,
                'message' => $ping,
                'parse_mode' => 'HTML' 
            ]
        );
        $end_time = microtime(true); 
        $execution_time = ($end_time - $start_time)*1000;
        logger('$start_time    : '.$start_time,5);
        logger('$end_time      : '.$end_time,5);
        logger('$execution_time: '.$execution_time,5);
        $ping = "<b>Pong!</b>\nReply took: <code>".round($execution_time,2)."</code>ms";
        $MadelineProto->messages->editMessage(
            [
                'peer' => $update,
                'id' => $messageid,
                'message' => $ping,
                'parse_mode' => 'HTML' 
            ]
        );
    }
