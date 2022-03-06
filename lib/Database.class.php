<?php 

class DataBase{

    public static $dbconn = null;
    public static $col = null;

    function __construct(){
        
    }

    /**
         1. getconn() function used to get the connection of MongoDB
        @param Collection Name | None
        return MongoDb Connection | false
     */
    static function getconn($db=null,$collection=null){ // TODO: need to make custom $db conn

        $client = new MongoDB\Client(
            'mongodb://<rastro>:<rastro2022>@<rastro-mongodb>/admin?tls=true'
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
        
        $ins_res = DataBase::$col->insertOne([
            'ipaddress' => '172.168.23.45',
            'vpn_ip' => '23.545.65.90',
            'ip_location' => 'india',
            'vpn_location' => 'turkey'
        ]);

        echo "Inserted id: ".$ins_res->getInsertedId();

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