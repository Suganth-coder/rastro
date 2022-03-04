<?php 

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
    function get_ip(){

        if ($this->IsValidMethod){

            $this->ip = $_SERVER['REMOTE_ADDR'];
            $this->response["response"] = ["ipaddress"=>$this->ip];

        }else{    
            $this->response["status"] = 400;
        }

        return $this->response;
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
}