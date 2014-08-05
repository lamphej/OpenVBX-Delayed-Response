<?php
include('/public_html/sms/OpenVBX/libraries/Services/Twilio.php');

$from = $_REQUEST["From"];
$res = PluginData::sqlQuery("SELECT * from incoming WHERE number='".$from."'");
$row_count = count($res);
if ($row_count){
    return;
}
else{
    $sql = "INSERT INTO `incoming`(`number`, `time`) VALUES ('$from', NOW())";
    PluginData::sqlQuery($sql);
}

$sid = AppletInstance::getValue("sid");
$token = AppletInstance::getValue("token");
$client = new Services_Twilio($sid, $token);

$delays = AppletInstance::getValue('delays[]');
$messages = AppletInstance::getValue('messages[]');

foreach ($delays AS $i=>$pause) {
    sleep(intval($pause));
    if(!empty($messages[$i])){
        $client->account->messages->sendMessage(AppletInstance::getValue("reply-from"), $from, $messages[$i]);
    }
}