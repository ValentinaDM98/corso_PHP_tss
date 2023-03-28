<?php

namespace models;

class User
{
    public $user_id;
    public $first_name;
    public $last_name;
    public $birthday;
    public $birth_city;
    public $regione_id;
    public $provincia_id;
    public $gender;
    public $username;
    public $password;

    //rappresenta nome e cognome dell'utente di seguito
    public function label()
    {
        return $this->first_name . " " . $this->last_name;
    }

    //$class_array array associativo che contiene tutte le informazioni degli attributi dell'oggetto 
    //user che verrà creato.
    public static function arrayToUser($class_array):User
    {
        $user = new User;
        foreach ($class_array as $class_attribute => $value_of_class_attribute) {
            $user->$class_attribute = $value_of_class_attribute;
        }
        return $user;
    }
}
