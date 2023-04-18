<?php
use PHPUnit\Framework\TestCase;

require_once "./tests/HTTPClient.php";
require_once "./form_in_php/config.php";
require_once "./tests/usersTest.php";

class UserApiUpdateTest  extends TestCase {


    public function test_update_user_api()
    {
        (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;"); 
        users_test();
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

      
       $response = put("http://localhost/corso_php_tss/form_in_php/rest_api/users.php?user_id=1",$payload);
        
       fwrite(STDERR, print_r($response, TRUE));
        //$this->assertNull($response);
         $this->assertJson($response);
 
     
    }

}
