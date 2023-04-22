<?php
use PHPUnit\Framework\TestCase;

require_once "./tests/HTTPClient.php";
require_once "./form_in_php/config.php";
require_once "./tests/usersTest.php";

class UserApiDeleteTest  extends TestCase {
    
    public function test_delete_task_api() {
        (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;");
        users_test();

        
        $response = delete("http://localhost/corso_php_tss/form_in_php/rest_api/users.php?user_id=1");
        fwrite(STDERR, print_r($response, TRUE));

        // $this->assertNull($response);

        $this->assertJson($response);
    }


}