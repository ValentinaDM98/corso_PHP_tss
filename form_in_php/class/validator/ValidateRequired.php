<?php
/**
 * Cosa vogliamo dalla nostra classe:
 * - Preservare il valore iniziale valido (e ripulito) del campo di testo 
 * - visualizzare il messggio di errore per il singolo campo 
 *    + sapere se c'è un errore (isValid)
 *    + ripulire e controllare i valori (sicurezza)
 *    + ogni validazione ha il suo messaggio di errore
 *    + impostare la classe di bootstrap is-invalid
 */

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



