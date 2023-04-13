<?php
use crud\UserCRUD;
require "../form_in_php/config.php";
require "./autoload.php";

print_r($_GET);

// il filtro lo metto prima, se non supera la validazione si fa il delete 
$user_id = filter_input(INPUT_GET,'user_id', FILTER_VALIDATE_INT);
if($user_id){
    (new UserCRUD)->delete($user_id);
    header("location:index-user.php");
}else{
    echo "problemi";
}
