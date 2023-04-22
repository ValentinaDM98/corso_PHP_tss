<?php
use PHPUnit\Framework\TestCase;

require_once "./tests/HTTPClient.php";
require_once "./form_in_php/config.php";
require_once "./tests/taskTest.php";

class TaskApiUpdateTest  extends TestCase {


    public function test_update_task_api()
    {
        (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE task;"); 
        tasks_test();

         $payload = [
            "task_id" => 1,
            "user_id" => 1,
            "name" => "Comprare latte",
            "due_date" => "2023-04-24",
            "done" => false
        ];

      
       $response = put("http://localhost/corso_php_tss/form_in_php/rest_api/tasks.php?task_id=2",$payload);
        
       fwrite(STDERR, print_r($response, TRUE));
        //$this->assertNull($response);
         $this->assertJson($response);
 
     
    }

}
