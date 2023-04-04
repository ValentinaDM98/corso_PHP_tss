<?php

use crud\UserCRUD;
use models\User;

include "../../config.php";
include "../autoload.php";

//get
// echo $_SERVER['REQUEST_METHOD'];

$crud = new UserCRUD;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        //ottenere elenco utenti
        //utilizziamo un model = parte dell'applicazione che deve gestire i dati
        $user_id = filter_input(INPUT_GET, 'user_id');
        if (!is_null($user_id)) {
            echo json_encode($crud->read($user_id));
        } else {
            $users = $crud->read();
            //trasformiamo l'array in json (stringa)
            echo json_encode($users);
        }
        break;

        // var_dump($user_id); die();

    case 'DELETE':
        $user_id = filter_input(INPUT_GET, 'user_id');
        if (!is_null($user_id)) {
            $rows =  $crud->delete($user_id);
            if ($rows == 1) {
                http_response_code(204);
            }
            if ($rows == 0) {
                http_response_code(404);
                //formato messaggio di errore
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Utente non trovato",
                            'detail' => $user_id
                        ]
                    ]
                ];
            }
            echo json_encode($response);
        }
        break;

    case 'POST':
        $input = file_get_contents('php://input');
        $request = json_decode($input, true); //con true ottengo un array associativo
        $user = User::arrayToUser($request);
        $last_id = $crud->create($user);

        $response = [
            'data' => [
                'type' => "users",
                'id' => $last_id,
                'attribute' => $user
            ]
        ];
        echo json_encode($response);
        break;

        // $user = (array)$user;
        // unset($user['password']);
        // $response = [
        //     'data'=>$users,
        //     'status'=>202

        // ];
        // echo json_encode($response);
        // break;

    case 'PUT':
        $input = file_get_contents('php://input');
        $request = json_decode($input, true); //con true ottengo un array associativo
        $user = User::arrayToUser($request);
        $user_id = filter_input(INPUT_GET, 'user_id');
       
        if (!is_null($user_id)) {
            echo json_encode($crud->read($user_id));
            $rows =  $crud->update($user);
            unset($user->password);
            unset($user->username);
            if ($rows == 0) {
                http_response_code(404);
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Utente non trovato",
                            'detail' => $user_id
                        ]
                    ]
                ];
            }else 
            if ($rows == 1) {
                http_response_code(202);
                $response = [
                    'data' => [
                        'type' => "users",
                        'title' => "Utente aggiornato",
                        'attribute' => $user
                    ]
                ];
            }
        
        echo json_encode($response);  
        }
        break;


    default:
        # code...
        break;
}
