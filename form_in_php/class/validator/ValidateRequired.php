<?php

class ValidateRequired implements Validable {
    
    public function isValid($value){
        //TRIM() elimina gli spazi all’inizio e alla fine di una stringa 
        //STRIP_TAGS() elimina i caratteri html della stringa
        $valueWidoutSpace = trim(strip_tags($value));
        //oppure $stripTag = strip_tags($value);

        if($valueWidoutSpace == ''){
            return false;
        }
        return $valueWidoutSpace;
    }
}



