<?php
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

$sid='AC887201eaa863bf41e473fb7426c03097';
$token='de4dcb5a19b86daff77e07a93146740c';
$client= new Client($sid,$token);
$client->message->create(
    / Where to send a text message (your cell phone?)
    '+919014277247',
    array(
        'from' => +919014277247 ,
        'body' => 'I sent this message in under 10 minutes!'
    )
    );
?>