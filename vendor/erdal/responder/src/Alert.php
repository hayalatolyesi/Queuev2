<?php

namespace Erdal\Responder;

/**
*@Author-Name   : Erdal EROĞLU 
*@Author-Mail   : erdal.eroglu@gmail.com
*@Create-Date   : dd-mm-YYYY
**/
class Alert implements IResponder{
    
    /** 
    * 
    * For Response Messages
    *
    * $message string
    * 
    */    
    public String | Array $message;
    
    /** 
    * 
    * This Object, Identity Name
    *
    * CONST STATUS string
    * 
    */    
    CONST STATUS ="alert";
    
    /** 
    *
    *  @param string $message (Not Null)
    *
    *  @param int $customCode (Not Null)
    *
    *  @return void
    *
    */

    public function set(String | Array $message):void{
        
        $this->message  = $message;

    }
    
}