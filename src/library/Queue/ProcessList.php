<?php
namespace Queue;

/*
 *
 * Erdal EROĞLU <erdal.eroglu@gmail.com>
 *
 * 01-09-2020
 *
 */

 Class ProcessList{

    /*
     * 
     * Messages sent to Rabbit are matched to the index in the following string
     *
     * On the match, the run method of the corresponding class is executed!
     * 
     * protected static array $processList
     * 
     */
    private static array $processList = [

        //'send-message' => ProcessList\Example::class,
        'send-message' => Queue\ProcessList\Example::class,     

    ];


    public static function getRepositories():Array
    {

        return self::$processList;

    }

 }