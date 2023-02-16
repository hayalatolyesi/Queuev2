<?php
namespace Queue;

/*
 *
 * Erdal EROĞLU <erdal.eroglu@gmail.com>
 *
 * 19-08-2020
 *
 */

class Model extends Config{
    
    /*
     * 
     * The channel where the Rabbit will receive and send messages
     *
     * $channel string
     * 
     */
    private String $channel;


    public function __construct(Array $conf)
    {
        
        $this->setConf($conf);

    }


    /*
     * 
     * Rabbit sets channels
     *
     * @param int $channelNum 
     * 
     * @return Queue\Model
     * 
     */
    public function setChannel(int $channelNum):Model{
        
        $this->channel  =   $this->getConf()['channels'][$channelNum];
        
        return $this;
        
    }

    /*
     * 
     * Returns the set channel
     * 
     * @return String
     * 
     */
    public function getChannel():String{
        
        return $this->channel;
        
    }    
    
    
}