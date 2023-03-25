<?php

namespace crud;

use Exception;
use models\User;
use PDO;

class UserCRUD
{

    public function create(User $user)
    {
        $query = "INSERT INTO user ( first_name, last_name, birthday, birth_city, regione_id, provincia_id, gender, username, password)
        -- //i parametri hanno sempre :davanti
                 VALUES (:first_name,:last_name,:birthday,:birth_city,:regione_id,:provincia_id,:gender,:username,:password)
                ";
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stm = $conn->prepare($query);
        // ci aspettiamo una stringa quindi PARAM_STR o un intero PARAM_INT
        //bind = associa il valore al parametro
        $stm->bindValue(':first_name', $user->first_name, \PDO::PARAM_STR);
        $stm->bindValue(':last_name', $user->last_name, \PDO::PARAM_STR);
        $stm->bindValue(':birthday', $user->birthday, \PDO::PARAM_STR);
        $stm->bindValue(':birth_city', $user->birth_city, \PDO::PARAM_STR);
        $stm->bindValue(':regione_id', $user->regione_id, \PDO::PARAM_INT);
        $stm->bindValue(':provincia_id', $user->provincia_id, \PDO::PARAM_INT);
        $stm->bindValue(':gender', $user->gender, \PDO::PARAM_STR);
        $stm->bindValue(':username', $user->username, \PDO::PARAM_STR);
        $stm->bindValue(':password', md5($user->password), \PDO::PARAM_STR);
        // dopo aver associato i valori ai parametri possiamo eseguire la query
        $stm->execute();
        
    }

    public function update($user)
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "UPDATE user SET first_name = :first_name, last_name = :last_name, 
        birthday = :birthday, birth_city = :birth_city, regione_id = :regione_id, 
        provincia_id = :provincia_id, gender = :gender, username = :username, password = :password WHERE user_id = :user_id;";
       
        $stm =  $conn->prepare($query);
        $stm->bindValue(':first_name', $user->first_name, \PDO::PARAM_STR);
        $stm->bindValue(':last_name', $user->last_name, \PDO::PARAM_STR);
        $stm->bindValue(':birthday', $user->birthday, \PDO::PARAM_STR);
        $stm->bindValue(':birth_city', $user->birth_city, \PDO::PARAM_STR);
        $stm->bindValue(':regione_id', $user->regione_id, \PDO::PARAM_INT);
        $stm->bindValue(':provincia_id', $user->provincia_id, \PDO::PARAM_INT);
        $stm->bindValue(':gender', $user->gender, \PDO::PARAM_STR);
        $stm->bindValue(':username', $user->username, \PDO::PARAM_STR);
        $stm->bindValue(':password', md5($user->password), \PDO::PARAM_STR);
        $stm->bindValue(':user_id', $user->user_id, \PDO::PARAM_INT);
        $stm->execute();
       
    }

    //leggo le informazioni su tutti gli utenti
    public function read(int $user_id = null)
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        if (!is_null($user_id)) {
            //variante del read passando user_id
            $query = "SELECT * FROM user WHERE user_id = :user_id;";
            $stm =  $conn->prepare($query);
            $stm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            //ATTENZIONE devo specificare fetch_class perchè altrimenti mi ripete
            //due volte le informazioni (di default è fetch both)
            //devo specificare il nome della classe: 'models\User'
            //oppure con User::class chiedo alla classe il nome per esteso 
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, User::class);

            if (count($result) == 1) {
                return $result[0];
            }
            if (count($result) > 1) {
                throw new \Exception("Chiave primaria duplicata", 1);
            }
            if (count($result) === 0) {
                return false;
            }
        } else {
            $query = "SELECT * FROM user;";
            $stm =  $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, User::class);
            if (count($result) === 0) {
                return false;
            }
            return $result;
        }
        //return $result;
    }



    public function delete($user_id)
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "DELETE FROM user where user_id = :user_id";
        $stm =  $conn->prepare($query);
        $stm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        //non si fa fetchAll perchè non ho un risultato
        $stm->execute();
        //dato da restituire: mi dice cos'ho cancellato
        return $stm->rowCount();
    }
}
