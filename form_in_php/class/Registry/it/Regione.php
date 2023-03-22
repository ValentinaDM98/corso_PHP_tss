<?php 

namespace Registry\it;

class Regione {
    public static function all()
    {
        try {
            //connessione al db, uso la costante che ho creato
            $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
            //scrivo la query, ma non viene subito lanciataphp
            $stm = $conn->prepare('SELECT * FROM regione;');
            //esegue la query
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_OBJ);//array di oggetti
            //ritorna il contenuto in un array
           // $result = $stm->fetchAll();
           print_r($result);
           return $result;
        } catch (\Throwable $th) {
            throw $th;
        }

        
    }
}