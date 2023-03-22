<?php
namespace validator;
/**
 * Cosa vogliamo dalla nostra classe:
 * 1. Preservare il valore iniziale valido (e ripulito) del campo di testo 
 * 2. visualizzare il messggio di errore per il singolo campo 
 *    + sapere se c'è un errore (isValid)
 *    + ripulire e controllare i valori (sicurezza)
 *    + ogni validazione ha il suo messaggio di errore
 *    + impostare la classe di bootstrap is-invalid
 */

class ValidateRequired implements Validable {
    //1. Preservare il valore iniziale valido (e ripulito) del campo di testo 
    private $value; //valore immesso nel form ripulito 
    private $message;
    //Rappresenta se il valore è valido e se devo visualizzare il messaggio
    private $valid;

    //2. visualizzare il messggio di errore per il singolo campo 
    public function __construct($default_value='', $message= 'è obbligatorio') {
        $this->value = $default_value; //valore predefinito, se non lo metto è = stringa vuota
        $this->message = $message;
        $this->valid = true;
    }
    
    public function isValid($value){
        //TRIM() elimina gli spazi all’inizio e alla fine di una stringa 
        //STRIP_TAGS() elimina i caratteri html della stringa
        $valueWidoutSpace = trim(strip_tags($value));
        //oppure $stripTag = strip_tags($value);

        if($valueWidoutSpace == ''){
            $this->valid = false;
            return false;
        }
        $this->valid = true;
        $this->value = $valueWidoutSpace;
        return $valueWidoutSpace;
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



