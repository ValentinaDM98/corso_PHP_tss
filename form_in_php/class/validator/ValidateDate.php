<?php

class ValidateDate implements Validable{
    public function isValid($value){
        // createFromFormat è un metodo statico (la classe non è istanziata)
        // :: significa appartenente alla classe
        //DateTime è una classe

        $sanitaze = trim(strip_tags($value));
        $dt = DateTime::createFromFormat('d/m/y',$sanitaze);
        if($dt){
           //return $dt;
           return $dt->format('d/m/Y');
        }else{
            return $dt;
        }
    }

    public function message()
    {
        return 'data non valida';
    }
    
};