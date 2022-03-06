<?php 

require_once __DIR__."/../vendor/autoload.php";

class DataBase{

    private static $dbconn = null;
    private static $col = null;
    
    public static $ipaddress = null;
    public static $ip_location = null;
    public static $vpn_ip = null;
    public static $vpn_location = null;

    function __construct(){
        
    }

    /**
         1. getconn() function used to get the connection of MongoDB
        @param Collection Name | None
        return MongoDb Connection | false
     */
    static function getconn($db=null,$collection=null){ // TODO: need to make custom $db conn

        $client = new MongoDB\Client(
            'mongodb://rastro-mongo:27017/'
        );
        if ($collection == null)
            $col = $client->rastro->iplog;
        else
            $col = $client->rastro->$collection;

        DataBase::$col = $col;
        
    }

    /**
        1. insert() function used to insert a record in MongoDb
        @param Pass // TODO:
        return status [ status= True|False ]
     */
    static function insert(){
        
        if (DataBase::$ipaddress != null and DataBase::$ip_location != null and DataBase::$vpn_ip != null and DataBase::$vpn_location != null){
            
            $ins_res = DataBase::$col->insertOne([
                'ipaddress' => DataBase::$ipaddress,
                'vpn_ip' => DataBase::$vpn_location,
                'ip_location' => DataBase::$ip_location,
                'vpn_location' => DataBase::$vpn_location
            ]);
            return true;

        }else{
            return false;

        }

    }

    /**
        1. delete() function removes a record in MongoDb
        @param Pass  // TODO:
        return status [ status = True|False ]
     */
    function delete(){

    }

    /**
      1. check() function checks whether the records details correctness, existance 
      @param Pass // TODO:
      return Pass // TODO:
     */
    function check(){

    }
}