<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

use Queue\SendQueue;

use Queue\Model;

$confArr=[
        
    'host'      =>'172.28.1.9',
    'port'      =>'5672',
    'username'  =>'rabbit1',
    'password'  =>'testrabbit',
    'channels'  =>[
        0=>'channel_1',
        1=>'channel_2',
    ],
]; 

$Model = new Model($confArr);

$Model->setChannel(0);

$SendQueue = new Queue\SendQueue();

$ret = $SendQueue->setMessage('send-message')->sendMessage($Model);

foreach($ret as $key=>$val){

    echo( "Sonuç :".$key."<br/>");

    foreach($val as $index=>$msg)
        echo( "Mesaj :".$msg->message."\n");

}