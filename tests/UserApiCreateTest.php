<?php
use PHPUnit\Framework\TestCase;

require_once "./tests/HTTPClient.php";
require_once "./config.php";

class UserApiCreateTest  extends TestCase {


    public function test_create_user_api()
    {
        (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;"); 
        $payload  = [
            "first_name" => "Mirio",
            "last_name" => "DaRoit",
            "birthday" => "2017-03-17",
            "birth_city" => "Fermo",
            "regione_id" => 16,
            "provincia_id" => 15,
            "gender" => "M",
            "username" => "d@email.com",
            "password" => "ciccio",
        ];

      
       $response = post("http://localhost/corso_php_mysql_2223/form_in_php/rest_api/users.php",$payload);
        
        //$this->assertNull($response);
         //$this->assertJson($response);
 
     fwrite(STDERR, print_r($response, TRUE));
    }

}


