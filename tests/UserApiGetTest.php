<?php
use PHPUnit\Framework\TestCase;

require_once "./tests/HTTPClient.php";
require_once "./config.php";

class UserApiGetTest  extends TestCase {


    public function test_get_user_api()
    {
        (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;"); 
       
      
       $response = get("http://localhost/corso_php_tss/form_in_php/rest_api/users.php");
        
       fwrite(STDERR, print_r($response, TRUE));
        //$this->assertNull($response);
         $this->assertJson($response);
 
     
    }

}