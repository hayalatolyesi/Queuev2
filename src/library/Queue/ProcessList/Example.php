<?php
namespace Queue\ProcessList;

use Queue\Process\IProcess;

/*
 *
 * Erdal EROĞLU <erdal.eroglu@gmail.com>
 *
 * 01-09-2020
 *
 */

 Class Example implements IProcess
 {

    public  function run():Void
    {

        echo "Mesaj Geldi \n";
        
    }

 }