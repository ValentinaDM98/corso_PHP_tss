<?php
class ValidateMail implements Validable{

    public function isValid($mail): bool{
        return filter_var($mail,FILTER_VALIDATE_EMAIL);
    }

}