<?php

//error_reporting(E_ALL); li vede tutti
//error_reporting(0); li spegne tutti
require "../config.php";
require "./class/Registry/it/Regione.php";
require "./class/Registry/it/Provincia.php";
require "./class/validator/Validable.php";
require "./class/validator/ValidateRequired.php";
// print_r($_POST);

$validatorName = new ValidateRequired('', 'Il nome è obbligatorio');
$validatorLastName = new ValidateRequired('', 'Il cognome è obbligatorio');
$validatorBirthday = new ValidateRequired('', 'La data è obbligatoria');
$validatorBirth_place = new ValidateRequired('', 'Il luogo di nascita è obbligatorio');
$validatorGender = new ValidateRequired('', 'Il genere è obbligatorio');
$validatorUsername = new ValidateRequired('', 'La mail è obbligatoria');
$validatorPassword = new ValidateRequired('', 'La password è obbligatoria');

//$validatorMail = new ValidateMail();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     $validatedName = $validatorName->isValid($_POST['first_name']);
     $validatedLastName = $validatorLastName->isValid($_POST['last_name']);
     $validatedBirthday = $validatorBirthday->isValid($_POST['birthday']);
     $validatedBirth_place = $validatorBirth_place->isValid($_POST['birth_place']);
     $validatedGender = $validatorGender->isValid($_POST['gender']);
     $validatedUsername = $validatorUsername->isValid($_POST['username']);
     $validatedPassword = $validatorPassword->isValid($_POST['password']);
}
/** questo script viene eseguito quanod visualizzo per la prima volta il form */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
}
?>


<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Esercitazione Form</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
     <header class="bg-light p-1">
          <h1 class="display-6">Applicazione demo</h1>
     </header>
     <main class="container">

          <section class="row">
               <div class="col-sm-3">
                    ciccio
               </div>
               <div class="col-sm-6">
                    <form class="mt-1 mt-md-5" action="create-user.php" method="post">
                         <div class="mb-3">
                              <label for="first_name" class="form-label">nome</label>
                              <input type="text" value="<?= $validatorName->getValue() ?>" class="form-control <?php echo !$validatorName->getValid() ? 'is-invalid' : ''  ?>" name="first_name" id="first_name">
                              <!-- mettere is-invalid -->
                              <?php


                              //GET isset($validatedName) prova a usare una variabile e se non esiste(false) non da warning
                              //POST isset($validatedName) in questo caso da true, nel nostro caso
                              if (!$validatorName->getValid()) { ?>
                                   <div class="invalid-feedback">
                                        <?php echo $validatorName->getMessage() ?>
                                   </div>
                              <?php
                              }
                              ?>


                         </div>
                         <div class="mb-3">
                              <label for="last_name" class="form-label">cognome</label>
                              <input type="text" value="<?= $validatorLastName->getValue() ?>" class="form-control <?php echo !$validatorLastName->getValid() ? 'is-invalid' : ''  ?>" name="last_name" id="last_name">
                              <?php
                              if (!$validatorLastName->getValid()) { ?>
                                   <div class="invalid-feedback">
                                        <?php echo $validatorLastName->getMessage() ?>
                                   </div>
                              <?php
                              }
                              ?>
                         </div>
                         <div class="mb-3">
                              <label for="birthday" class="form-label">data di nascita</label>
                              <input type="date" value="<?= $validatorBirthday->getValue() ?>" class="form-control <?php echo !$validatorBirthday->getValid() ? 'is-invalid' : ''  ?>" name="birthday" id="birthday">
                              <?php
                              if (!$validatorBirthday->getValid()) { ?>
                                   <div class="invalid-feedback">
                                        <?php echo $validatorBirthday->getMessage() ?>
                                   </div>
                              <?php
                              }
                              ?>
                         </div>
                         <div class="mb-3">
                              <label for="birth_place" class="form-label">luogo di nascita</label>
                              <input type="text" value="<?= $validatorBirth_place->getValue() ?>" class="form-control <?php echo !$validatorBirth_place->getValid() ? 'is-invalid' : ''  ?>" name="birth_place" id="birth_place">
                              <?php
                              if (!$validatorBirth_place->getValid()) { ?>
                                   <div class="invalid-feedback">
                                        <?php echo $validatorBirth_place->getMessage() ?>
                                   </div>
                              <?php
                              }
                              ?>
                         </div>

                         <div class="mb-3">
                              <div class = "row">
                              <div class="col">
                                   <label for = "birth_city" class= "form-label">Città</label>
                                   <input type="text" class="form-control" name="birth_city" id="birth_city">
                              </div>
                              <div class="col"> 
                                   <label for = "birth_region" class= "form-label">Regione</label>
                                   <!-- select, voglio ottenere l'elenco regioni -->
                                   <select id = "birth_region" class="birth_region" name="birth_region">
                                   <?php foreach (Regione::all() as $regione) : ?>
                                   <option value="<?= $regione->id_regione?>"><?=$regione->nome ?></option>
                                   <?php endforeach; ?>
                                   </select>                      
                              </div>
                              <div class="col">
                                   <label for = "birth_province" class= "form-label">Province</label>
                                   <select id = "birth_province" class="birth_province" name="birth_province">
                                   <!-- select, voglio ottenere l'elenco province -->
                                   <?php foreach (Provincia::all() as $provincia) : ?>
                                   <option value="<?= $provincia->id_provincia?>"><?=$provincia->nome ?></option>
                                   <?php endforeach; ?>
                                   </select>   
                              </div>
                              </div>
                         </div>

                         <div class="mb-3">
                              <label for="gender" class="form-label">genere</label>
                              <select name="gender" class="form-select <?php echo !$validatorGender->getValid() ? 'is-invalid' : ''  ?>" id="gender">
                                   <option value=""></option>
                                   <option value="M">M</option>
                                   <option value="F">F</option>
                              </select>
                              <?php
                              if (!$validatorGender->getValid()) { ?>
                                   <div class="invalid-feedback">
                                        <?php echo $validatorGender->getMessage() ?>
                                   </div>
                              <?php
                              }
                              ?>

                         </div>
                         <div class="mb-3">
                              <label for="username" class="form-label">nome utente</label>
                              <input type="email" value="<?= $validatorUsername->getValue() ?>" class="form-control <?php echo !$validatorUsername->getValid() ? 'is-invalid' : ''  ?>" name="username" id="username">
                              <?php
                              if (!$validatorUsername->getValid()) { ?>
                                   <div class="invalid-feedback">
                                        <?php echo $validatorUsername->getMessage() ?>
                                   </div>
                              <?php
                              }
                              ?>
                         </div>
                         <div class="mb-3">
                              <label for="password" class="form-label">password</label>
                              <input type="password" value="<?= $validatorPassword->getValue() ?>" id="password" name="password" class="form-control <?php echo !$validatorPassword->getValid() ? 'is-invalid' : ''  ?>">
                              <?php
                              if (!$validatorPassword->getValid()) { ?>
                                   <div class="invalid-feedback">
                                        <?php echo $validatorPassword->getMessage() ?>
                                   </div>
                              <?php
                              }
                              ?>
                         </div>

                         <button class="btn btn-primary btn-sm" type="submit">Registrati</button>
                    </form>
               </div>



               <div class="col-sm-3">

               </div>
          </section>
     </main>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>