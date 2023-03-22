<?php 
namespace crud;

use models\User;
use PDO;

class UserCRUD {

    

    public function create(User $user)
    {
        $query = "INSERT INTO user ( first_name, last_name, birthday, birth_city, regione_id, provincia_id, gender, username, password)
        -- //i parametri hanno sempre :davanti
                 VALUES (:first_name,:last_name,:birthday,:birth_city,:regione_id,:provincia_id,:gender,:username,:password)
                "; 
        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        $stm = $conn->prepare($query);
        // ci aspettiamo una stringa quindi PARAM_STR o un intero PARAM_INT
        $stm->bindValue(':first_name',$user->first_name,\PDO::PARAM_STR);
        $stm->bindValue(':last_name',$user->last_name,\PDO::PARAM_STR);
        $stm->bindValue(':birthday',$user->birthday,\PDO::PARAM_STR);
        $stm->bindValue(':birth_city',$user->birth_city,\PDO::PARAM_STR);
        $stm->bindValue(':regione_id',$user->regione_id,\PDO::PARAM_INT);
        $stm->bindValue(':provincia_id',$user->provincia_id,\PDO::PARAM_INT);
        $stm->bindValue(':gender',$user->gender,\PDO::PARAM_STR);
        $stm->bindValue(':username',$user->username,\PDO::PARAM_STR);
        $stm->bindValue(':password',$user->password,\PDO::PARAM_STR);
        // dopo aver associato i valori ai parametri possiamo eseguire la query
        $stm->execute();
    }

    public function update()
    {
        # code...
    }

    //leggo le informazioni su tutti gli utenti
    public function read(int $user_id=null)
    {
        //con 3 uguali controlla il tipo, solo due no
        //stringa vuota "" ==  false -->true
        //stringa vuota "" === false -->false
        //null == false (comportamento automatico)
        //null == false --> true
        //null === false --> false
        //false === false ---> true
        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        if(!is_null($user_id)){
            //variante del read passando user_id
            $query = "SELECT * FROM user WHERE user_id = :user_id;";
            $stm =  $conn->prepare($query);
            $stm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS,'models\User');
        }else{
        $query = "SELECT * FROM user;";
        $stm =  $conn->prepare($query);
        $stm->execute();
        //ATTENZIONE devo specificare fetch_class perchè altrimenti mi ripete
        //due volte le informazioni (di default è fetch both)
        //devo specificare il nome della classe: 'models\User'
        //oppure con User::class chiedo alla classe il nome per esteso
        $result = $stm->fetchAll(PDO::FETCH_CLASS,'models\User');
        return $result;
        }

        $result = $stm->fetchAll(PDO::FETCH_CLASS,'models\User');
        return $result;
    }

    

    public function delete()
    {
        
    }
}