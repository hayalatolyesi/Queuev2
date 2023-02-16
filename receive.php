<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

/**
 * 
 * if runing in vendor folder example
 * 
 */
require_once ('ExampleExternal/Example.php');


/**
 * 
 * if runing in vendor folder example
 * 
 */
use ExampleExternal\Example;


/**
 * 
 * if running local library example
 * 
 */
//use Example\Example;

use Queue\QProcessor;

use Queue\Model;


/*
* 
* Rabbit Configurations
*
* @$confArr Array
* 
*/

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

$QProcessor = new QProcessor();

$run = ['send-message'=>  Example::class];

$QProcessor->listen($Model, $run);