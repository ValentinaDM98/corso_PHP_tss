<?php

namespace validator;

class ValidateMail implements Validable{

    private $value; //valore immesso nel form ripulito 
    private $message;
    private $valid;

    public function __construct($default_value='', $message= 'è obbligatorio') {
        $this->value = $default_value; //valore predefinito, se non lo metto è = stringa vuota
        $this->message = $message;
        $this->valid = true;
    }

    public function isValid($mail): bool{
        //$strip_tag = strip_tags($value);
        //$valueWidoutSpace = trim($strip_tag);
        return filter_var($mail,FILTER_VALIDATE_EMAIL);

    }

    public function getValue(){
        return $this->value;
       }
   
       
       public function getMessage(){
           return $this->message;
       }
   
       public function getValid(){
           return $this->valid;
       }


}
?>