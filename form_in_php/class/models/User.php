<?php

namespace models;

class User
{

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
}
