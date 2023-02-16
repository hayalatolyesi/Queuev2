<?php
namespace Queue;

/*
 *
 * Erdal EROĞLU <erdal.eroglu@gmail.com>
 *
 * 19-08-2020
 *
 */

class Init extends Config{
    
    /*
     * 
     * The channel where the Rabbit will receive and send messages
     *
     * $channel string
     * 
     */
    private String $channel;

    /*
     * 
     * Rabbit kanal set eder
     *
     * @param int $channelNum 
     * 
     * @return Queue\Init
     * 
     */
    public function setChannel(int $channelNum):Init{
        
        $this->channel  =   $this->getConf()['channels'][$channelNum];
        
        return $this;
        
    }
    
    
}