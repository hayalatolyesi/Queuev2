<?php
namespace ExampleExternal;

use Queue\Process\IProcess;

/*
 *
 * Erdal EROĞLU <erdal.eroglu@gmail.com>
 *
 * 02-16-2023
 *
 */

 Class Example implements IProcess
 {

    public  function run():Void
    {

        echo "Mesaj Geldi \n";
        
    }

 }