<?php

class ValidateDate implements Validable{
    public function isValid($value){
        // createFromFormat è un metodo statico (la classe non è istanziata)
        // :: significa appartenente alla classe
        //DateTime è una classe

        $sanitaze = trim(strip_tags($value));
        $dt = DateTime::createFromFormat('d/m/Y',$sanitaze);

        //se data non è false viene formattato il valore, che deve essere = a sanitaze
        if($dt && $dt->format('d/m/Y') === $sanitaze){
           return $dt->format('d/m/Y');
        }else{
            //se $dt è false restituisce subito false
            return false;
        }
    }

    public function message()
    {
        return 'data non valida';
    }
    
};