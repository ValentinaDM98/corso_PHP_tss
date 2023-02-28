<?php
//serve per visualizzare tutti gli errori (se metto 0 spegne tutti gli errori)
error_reporting(E_ALL);

require "./class/validator/Validable.php";
require "./class/validator/ValidateRequired.php";

// qui siamo nel post (dopo aver cliccato il bottone)
//print_r($_SERVER['REQUEST_METHOD']); 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
     echo "POST - dati inviati adesso, li devo controllare";

     $validatorName = new ValidateRequired();
     $validatedName = $validatorName->isValid($_POST['first_name']);
     $isValidNameClass = $validatorName->isValid($_POST['first_name']) ? '' : 'is-invalid';

     $validatorSourname = new ValidateRequired();
     $validatedSourname = $validatorSourname->isValid($_POST['last_name']);
     $isValidLast_nameClass = $validatorSourname->isValid($_POST['last_name']) ? '' : 'is-invalid';

     $validatorBirthday = new ValidateRequired();
     $validatedBirthday = $validatorBirthday->isValid($_POST['birthday']);
     $isValidBirthdayClass = $validatorBirthday->isValid($_POST['birthday']) ? '' : 'is-invalid';
     
     $validatorBirthPlace = new ValidateRequired();
     $validatedBirthPlace = $validatorBirthPlace->isValid($_POST['birth_place']);
     $isValidBirth_placeClass = $validatorBirthPlace->isValid($_POST['birth_place']) ? '' : 'is-invalid';
   
     $validatorUsername = new ValidateRequired();
     $validatedUsername = $validatorUsername->isValid($_POST['username']);
     $isValidUsernameClass = $validatorUsername->isValid($_POST['username']) ? '' : 'is-invalid';

     $validatorPassword = new ValidateRequired();
     $validatedPassword  = $validatorPassword ->isValid($_POST['password']);
     $isValidPasswordClass = $validatorPassword->isValid($_POST['password']) ? '' : 'is-invalid';

     $validatorGender = new ValidateRequired();
     // ! = se non è impostato l'indie gender dell'array post metti una stringa vuota
     $validatedGender = $validatorGender->isValid(!isset($_POST['gender']) ? '': $_POST['gender']);

  

     print_r($_POST);
}
//questo script viene eseguito quando visualizzo per la prima volta il FORM di registrazione
if($_SERVER['REQUEST_METHOD'] == 'GET'){
     //$validatedName = false; //con false evita di far scattare la segnalazione di warning (validatedName variabile indefinita) 
     //vedi soluzione alternativa sotto 
     $isValidNameClass = ''; //metto predefinito un valore di stringa vuota  
    /* $validatedSourname = false;
     $validatedBirthday = false;
     $validatedBirthPlace = false;
     $validatedUsername = false;*/
     $validatedGender = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Form_Registrazione_PHP</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
     <header class="bg-light p-1">
          <h1 class="display-6">Applicazione demo</h1>
     </header>
     <main class="container">

          <section class="row">
               <div class="col-sm-2">

               </div>
               <div class="col-sm-8">
                    <form class="mt-1 mt-md-5" action="create-user.php" method="post">
                         <div class="mb-3">
                              <label for="nome" class="form-label">Nome</label>
                              <input type="text" class="form-control <?php echo $isValidNameClass ?> " name="first_name" id="first_name">
                              <!-- apro un tag php, con all'interno html -->
                              <?php 
                              // se non è false allora il nome è obbligatorio + per risolvere il problema di warning posso fare anche in questo modo
                              //Caso 1:
                              //GET ISSET ($validatedName) false
                              // first_name = 'Valentina' => !$validatedName = 'Valentina' | isset ($validatedName) true && false
                              //POST ISSET ($validatedName) true

                              //Caso 2:
                              //GET ISSET ($validatedName) false
                              // first_name = '' => $validatedName = false 
                              //POST ISSET ($validatedName) true && |false | isset ($validatedName) true && false
                              if(isset($validatedName) && !$validatedName){ ?>
                              <div class="invalid-feedback">
                                   il nome è obbligatorio
                              </div>
                              <?php }
                              ?>
                              

                              
                         </div>
                         <div class="mb-3">
                              <label for="cognome" class="form-label">Cognome</label>
                              <input type="text" class="form-control <?php echo $isValidLast_nameClass ?> " name="last_name" id="last_name">
                              <div class="invalid-feedback">
                                   il cognome è obbligatorio
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="data_di_nascita" class="active">Data di nascita</label>
                              <input type="date" class="form-control <?php echo $isValidBirthdayClass ?>" name="birthday" id="birthday">
                              <div class="invalid-feedback">
                                   la data è obbligatoria
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="luogo_di_nascita" class="form-label">Luogo di nascita</label>
                              <input type="text" class="form-control <?php echo $isValidBirth_placeClass ?>" name="birth_place" id="birth_place">
                              <div class="invalid-feedback">
                                   il luogo di nascita è obbligatorio
                              </div>
                         </div>
                         <div class="mb-3">
                              <!-- mettere is-invalid su entrambi i generi, ma messaggio di errore solo sul secondo -->
                              <label for="genereF" class="form-check-label">F</label>
                              <input type="radio" class="form-check-input <?php echo !$validatedGender ? 'is-invalid':'' ?>" value="F" name="gender" id="genderF">
                              
                         </div>
                         <div class="mb-3">
                              <label for="genereM" class="form-check-label">M</label>
                              <input type="radio" class="form-check-input <?php echo !$validatedGender ? 'is-invalid':'' ?>" value="M" name="gender" id="genderM">
                              <?php if(!$validatedGender) { ?>
                              <div class="invalid-feedback">
                                   il sesso è obbligatorio
                              </div>
                              <?php }
                              ?>
                         </div>
                         <div class="mb-3">
                              <label for="username" class="form-label">Username</label>
                              <input type="email" class="form-control <?php echo $isValidUsernameClass ?>" name="username" id="username">
                              <div class="invalid-feedback">
                                   username obbligatorio
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" id="password" name="password" class="form-control <?php echo $isValidPasswordClass ?>">
                              <div class="invalid-feedback">
                                   password obbligatoria
                              </div>
                         </div>

                         <button class="btn btn-primary btn-sm" type="submit"> Accedi </button>
                    </form>

               </div>

               <div class="col-sm-2">
               </div>
          </section>

     </main>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



</body>

</html>