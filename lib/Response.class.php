<?php 

require_once "Database.class.php";

class Response{

    function __construct(){
        $this->IsValidMethod = ($_SERVER['REQUEST_METHOD'] == 'GET')? true : false;
        $this->response = ["status"=>200,"response"=>"None"];
    }

    /**
        1. get_ip() used to get the ip of the requested system 
        2. If the requested method is get(), IP Address will be returned 
        3. Else it will return invalid request
        @param none
        return status,response
    */
    static function get_ip(){
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     1. get_all_details() gets all the details of request body
     @param None
     */

    function get_all_details(){
        if (isset($_SERVER))
            $this->response["response"] = ["details"=>$_SERVER];
        else
            $this->response["status"] = 400;

        return $this->response;
    }

    /**
     1. check_vpn_ip() checks whether the given ip belong to vpn or not
     @param ipaddress
     returns True on vpn ip else False
     */
    function check_vpn_ip($ipaddress){
        $this->_currentip = $ipaddress;
    }

    /**
         1. get_user_details() returns ipaddess, vpnipaddress, iplocation and vpnlocation
        @param none
        returns True | False
     */
    function get_user_details(){

        if ($this->IsValidMethod){

            Database::$vpn_ip = $this->get_ip();
            Database::$vpn_location = "France";
            Database::$ipaddress = "53.23.24.123";
            Database::$ip_location = "India";

            Database::getconn();
            Database::insert();

            $user_details = [
                "vpn_ip" => Database::$vpn_ip,
                "original_ip" => Database::$ipaddress,
                "vpn_locaion" => Database::$vpn_location,
                "original_location" => Database::$ip_location
            ];
            
            $this->response["response"] = $user_details;

        }else{    
            $this->response["status"] = 400;
            $this->response["response"] = "Cannot fetch user details";
        }

        return $this->response;
    }
    
}