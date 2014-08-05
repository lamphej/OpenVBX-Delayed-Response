<?php
include('/public_html/sms/OpenVBX/libraries/Services/Twilio.php');

$sid = "AC5647f7bbee5e19c7ea681c4099cffd3c";
$token = "82bb70cc653ce64bdf30176a0f218c8a";
$from = $_REQUEST["From"];
$client = new Services_Twilio($sid, $token);

$delays = AppletInstance::getValue('delays[]');
$messages = AppletInstance::getValue('messages[]');

foreach ($delays AS $i=>$pause) {
    sleep(intval($pause));
    $client->account->messages->sendMessage("+16467599725", $from, $messages[$i]);
}