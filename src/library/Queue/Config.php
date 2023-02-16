<?php
namespace Queue;

/*
 *
 * Erdal EROĞLU <erdal.eroglu@gmail.com>
 *
 * 19-08-2020
 *
 */

class Config{
    
    /*
     * 
     * set configurations
     *
     * @return Array
     * 
     */
    public function setConf(Array $confArr):Array{
        
        return $this->confArr = $confArr;
        
    }

    /*
     * 
     * Method that gives configurations
     *
     * @return Array
     * 
     */
    public function getConf():Array{
        
        return $this->confArr;
        
    }
    
    
}