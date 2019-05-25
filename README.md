
# userbotPHP
Basic userbot, Madelineproto based. Available many commands

**Auto-Plugin Updater/Installer [removed]**

### How to Install
First, git clone;
`git clone https://github.com/quiec/userbotPHP`

Second, start!

`cd userbotPHP`

`php start.php`

----
### Files

`plugin.php -> Dont edit this file! Only for Userbotphp`


`bot.php -> Your bot codes.`

----

### Functions
**Send Message** : `sm($chatID, "Sent message by userbotPHP");`


**Edit Message** : `em($chatID, " Edited message by userbotPHP", $msgid);`


**Delete Message** :  `dm($msgid);`


`$chatID -> Chat ID`

`$userID -> User ID`

`$msg -> Message`

`$msgid -> Message ID`

----

### Commands:
`.alive => Check bot`

`.spam => Make flood. [Example : .spam 5 madelineproto]`

`.purge => Delete message.`

.purge samples:
- .purge => replied message to your message delete
- .purge all => delete a user messages [reply a message]
- .purge me => Delete all your messages in group/channel/private chat

`.info => Get user info.`

`.tts => Send a voice. (text-to-speech)`

`.mock => MoCk PlUgiN`

`.zalgo => Convert a text to zalgo`

`.ebio => Edit bio`

`.ename => Edit Last Name`

`.pphoto => Upload new profile photo[reply a photo]`

`.trt => Translate a Text.`

.trt samples: 
- reply a message: .trt -tr [Auto Lang to Turkish]
- .trt -en -tr hello [English to Turkish]
- .trt -tr ciao [Auto Language To Turkish]

----

Telegram: [Quiec](https://t.me/quiec)

Telegram Channel: [userbotPHP](https://t.me/userbotphp)

MadelineProto: [Madelineproto Docs](https://docs.madelineproto.xyz/)

TGUserbotLite(forked): [TGUserbotLite](https://github.com/peppelg/TguserbotLite)
