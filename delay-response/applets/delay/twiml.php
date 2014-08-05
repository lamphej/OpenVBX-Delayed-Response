<?php
$delays = AppletInstance::getValue('delays[]');
$messages = AppletInstance::getValue('messages[]');

foreach ($delays AS $i=>$pause) {
    sleep(intval($pause));
    $response = new TwimlResponse();
    $response->message($messages[$i]);
    $response->respond();
    unset($response);
    break;
}