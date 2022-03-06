<?php

require_once "lib/Response.class.php";

$resp = new Response();

/**
 1. Get method if getip == true return the details 
 2. Else return bad status code
 */
if (isset($_GET['getip']) == "true"){  //TODO: change GET method to POST method 

    $details = $resp->get_user_details();
    if ($details["status"] == 200){
         $result = $details["response"]; 

    }else{
        $result = ["status"=>400,"response"=>"Unable to fetch the details"];
    }

    print_r(json_encode($result));
}




