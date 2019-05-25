<?php
if(strstr($msg, ".text")){
	// https://t.me/AnotherGroup/176551
          //time it takes to wait between the editions in microseconds
          $temposleep=300000;
          
          $text=substr($msg, 6);
          $chatid=$chatID;
          $messageid=$msgid;
          $oldtext="";
          $num=1;
          $MadelineProto->messages->editMessage(['no_webpage' => true, 'peer' => $update, 'id' => $messageid, 'message' => "|", 'entities' => [['_' => 'messageEntityCode', 'offset' => 0, 'length' => strlen(trim("|"))]]]);
          usleep($temposleep);
          while($oldtext!=$text){
            $oldtext=mb_substr($text, 0, $num);
            $oldtext1=$oldtext."|";
            $MadelineProto->messages->editMessage(['no_webpage' => true, 'peer' => $update, 'id' => $messageid, 'message' => $oldtext1, 'parse_mode' => 'HTML', 'entities' => [['_' => 'messageEntityCode', 'offset' => 0, 'length' => strlen(trim($oldtext1))]]]);
            usleep($temposleep);
            $MadelineProto->messages->editMessage(['no_webpage' => true, 'peer' => $update, 'id' => $messageid, 'message' => $oldtext, 'parse_mode' => 'HTML', 'entities' => [['_' => 'messageEntityCode', 'offset' => 0, 'length' => strlen(trim($oldtext))]]]);
            $num++;
            usleep($temposleep);
          }
          echo "bruh!";
        }
