<?php

namespace Erdal\Responder;

/**
*@Author-Name   : Erdal EROĞLU 
*@Author-Mail   : erdal.eroglu@gmail.com
*@Create-Date   : dd-mm-YYYY
**/
class Warning implements IResponder{
    
    /**
    * 
    * For Response Messages
    *
    * $message string
    * 
    */
    public string | Array $message;
    
    /** 
    * 
    * This Object, Identity Name
    *
    * CONST STATUS string
    * 
    */      
    CONST STATUS ="warning";
    
    /** 
    *
    *  @param string $message (Not null)
    *
    *  @param int $customCode (Not null)
    *
    *  @return void
    *
    */
    public function set(string | Array $message):void{
        
        $this->message      = $message;

    }
    
}