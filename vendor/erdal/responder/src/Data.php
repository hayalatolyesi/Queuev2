<?php

namespace Erdal\Responder;

/**
*@Author-Name   : Erdal EROĞLU 
*@Author-Mail   : erdal.eroglu@gmail.com
*@Create-Date   : dd-mm-YYYY
**/
class Data implements IResponder{
    
    /*
    * 
    * For Response Messages
    *
    * $message string
    * 
    */    
    public Array $message;
    
    /** 
    * 
    * For Response code
    *
    * $message int
    * 
    */    
    public $code=0;
    
    /*
    * 
    * This Object, Identity Name
    *
    * CONST STATUS string
    * 
    */    
    CONST STATUS ="data";
    
    /*
    *
    *  @param string $message 
    *
    *  @return void
    *
    */

    public function set(array $data):void{
        
        $this->message  =$data;
        
    }
    
}