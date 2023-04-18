<?php
use PHPUnit\Framework\TestCase;

require_once "./tests/HTTPClient.php";
require_once "./form_in_php/config.php";
require_once "./tests/usersTest.php";

class TaskApiUpdateTest  extends TestCase {


    public function test_update_task_api()
    {
        (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE task;"); 
        users_test();

        $payload = [
            "user_id" => 1,
            "first_name" => "Giuse",
            "last_name" => "Bianchi",
            "birthday" => "2017-03-17",
            "birth_city" => "Como",
            "regione_id" => 16,
            "provincia_id" => 15,
            "gender" => "M",
            // "username" => "b@c",
            // "password" => "Password",
        ];

      
       $response = put("http://localhost/corso_php_tss/form_in_php/rest_api/tasks.php?task_id=2",$payload);
        
       fwrite(STDERR, print_r($response, TRUE));
        //$this->assertNull($response);
         $this->assertJson($response);
 
     
    }

}
