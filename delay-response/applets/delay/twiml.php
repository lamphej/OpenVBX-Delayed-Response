<?php
include('/public_html/sms/OpenVBX/libraries/Services/Twilio.php');

$from = $_REQUEST["From"];
$msg = $_REQUEST["Body"];
$res = PluginData::sqlQuery("SELECT * from incoming WHERE number='".$from."'");
$row_count = count($res);
if ($row_count){
    return;
}
else{
    $sql = "INSERT INTO `incoming`(`number`, `time`, `message`) VALUES ('$from', NOW(), '$msg')";
    PluginData::sqlQuery($sql);
}

$sid = AppletInstance::getValue("sid");
$token = AppletInstance::getValue("token");
$client = new Services_Twilio($sid, $token);

$delays = AppletInstance::getValue('delays[]');
$messages = AppletInstance::getValue('messages[]');
$reply_numbers = AppletInstance::getValue("numbers[]");

foreach ($delays AS $i=>$pause) {
    sleep(intval($pause));
    if(!empty($messages[$i])){
        $client->account->messages->sendMessage($reply_numbers[$i], $from, $messages[$i]);
    }
}