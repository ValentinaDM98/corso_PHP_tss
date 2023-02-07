
<!-- <h1>Sono la risposta (RESPONSE)</h1> -->
<?php

/**echo"<pre>";
echo "get:";
print_r($_GET);

echo "post:";
print_r($_POST);
echo"</pre>";

echo "La tua email è: <br>";
echo "<strong>".$_POST['email']."</strong>";*/

//Argomenti: costante + nome variabile da prendere + (filtro facoltativo)
$test = filter_input(INPUT_GET,"email",FILTER_VALIDATE_EMAIL);

if($test == false){
    echo "\nla mail non è valida!\n";
}else{
    echo "Grazie, la tua email è valida: $test";
}


?>

