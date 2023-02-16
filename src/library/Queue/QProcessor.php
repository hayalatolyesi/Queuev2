<?php

namespace Queue;

/*
 *
 * Erdal EROĞLU <erdal@istanbul-soft.com.tr>
 *
 * 19-08-2020
 *
 */

use Exception;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Queue\Process\IProcess;

class QProcessor{
    
    use Traits\ResponseStorage;

    /*
     * 
     * It processes incoming messages by listening to the Rabbit channel
     * 
     * @param Queue\Model $model 
     * 
     * @return void
     * 
     */

    public function listen(Model $model, $obj):void{
        
        $conf           = $model->getConf();
        
        $host           = $conf['host'];
        
        $port           = $conf['port'];
        
        $userName       = $conf['username'];
        
        $password       = $conf['password'];

        $channelName    = $model->getChannel();
        
        try{
            
            $connection = new AMQPStreamConnection($host, $port, $userName, $password);
            
            try{
                
                $channel = $connection->channel();

                $channel->queue_declare($channelName, false, false, false, false);
                
                $callback = function ($msg) use($obj) {

                    if(isset($obj[$msg->body])){

                        try{

                            $obj = new $obj[$msg->body];

                            $obj->run();

                            //ResponseStorage::appendSuccess("Mesaj Alındı ve İlgili İşlem Çalıştırıldı!");
                            echo ("Mesaj Alındı ve İlgili İşlem Çalıştırıldı!");
                        }catch(\Exception $ex){
                            
                            self::appendError("Mesaj Geldi, Sınıf Çalıştırılırken Hata Oluştu",2006,$ex);

                        }

                    }else{

                        self::appendError("Talep Edilen Mesaj ve / veya Onunla İLişkili Sınıf Çalıştırılamadı!",2006,new Exception());

                    }
                    
                };
                
                $channel->basic_consume($channelName, '', true, true, false, false, $callback);
                
                while ($channel->is_consuming()) {
                    
                    try{

                        self::appendSuccess("Mesaj Alındı");

                        $channel->wait();

                    }catch(\Exception $ex){

                        self::appendError("Mesaj Geldi Dinleme Hatası Oldu",2004,$ex);

                    }

                }

            }catch(\Exception $ex){
                
                self::appendError("Bağlantı Sağlandı Ancak Mesaj Alınırken Hata Oluştu",2003,$ex);

                $channel->close();
                
                $connection->close();
                
            }
            
        }catch(\Exception $ex){
            
            self::appendError("Bağlantı Hatası",2000,$ex);

            $connection->close();
            
        }
         
    }
       
}