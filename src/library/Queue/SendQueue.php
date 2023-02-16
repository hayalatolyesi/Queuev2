<?php

namespace Queue;

/*
 *
 * Erdal EROĞLU <erdal.eroglu@gmail.com>
 *
 * 19-08-2020
 *
 */

use PhpAmqpLib\Connection\AMQPStreamConnection;

use PhpAmqpLib\Message\AMQPMessage;

class SendQueue {
    
    /*
     * 
     * Message to the Rabbit
     *
     * $message string
     * 
     */
    private String $message;
    
    use Traits\ResponseStorage;
    
    /*
     * 
     * Rabbite stores the message to be sent
     *
     * @param string message
     * 
     * @return Queue\SendQueue
     * 
     */
    public function setMessage(String $message):SendQueue{
        
        $this->message=$message;
        
        return $this;
        
    }
    

    /*
     * 
     * Rabbite sends the message we stored earlier
     *
     * @return Array
     * 
     */
    public function sendMessage(Model $model):Array{
        
        $conf       = $model->getConf();
        
        $host       = $conf['host'];
        
        $port       = $conf['port'];
        
        $userName   = $conf['username'];
        
        $password   = $conf['password'];

        $channelName    = $model->getChannel();

        try{

            $connection = new AMQPStreamConnection($host, $port, $userName, $password);
            
            $channel = $connection->channel();
            
            $channel->queue_declare($channelName, false, false, false, false);
            
            try{

                $msg = new AMQPMessage($this->message);

                $channel->basic_publish($msg, '', $channelName);

                $connection->close();
                
                $channel->close();

                self::appendSuccess("Mesaj Başarıyla Kuyruğa Alındı");

            }catch(\Exception $ex){
                
                $channel->close();
                
                $connection->close();
                
                echo $ex->getMessage();

                self::appendError("Mesaj Kuyruğa Yazılırken Hata Oluştu",2001,$ex);

            }
            
            $connection->close();
            
        }catch(\Exception $ex){
                        
            self::appendError("Rabbit İle Bağlantı Kurulurken Hata Oluştu",2000,$ex);
            
        }
        
        return self::get();
        
    }
        
}