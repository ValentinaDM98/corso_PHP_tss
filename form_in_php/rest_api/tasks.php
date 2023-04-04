<?php

use crud\TaskCRUD;
use models\Task;

include "../../config.php";
include "../autoload.php";

$crud = new TaskCRUD;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        //ottenere elenco utenti
        //utilizziamo un model = parte dell'applicazione che deve gestire i dati
        $task_id = filter_input(INPUT_GET, 'task_id');
        if (!is_null($task_id)) {
            echo json_encode($crud->read($task_id));
        } else {
            $tasks = $crud->read();
            //trasformiamo l'array in json (stringa)
            echo json_encode($tasks);
        }
        break;

        // var_dump($user_id); die();

    case 'DELETE':
        $task_id = filter_input(INPUT_GET, 'task_id');
        if (!is_null($task_id)) {
            $rows =  $crud->delete($task_id);
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
                            'title' => "Task non trovata",
                            'detail' => $task_id
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
        $task = Task::arrayToTask($request);
        $last_id = $crud->create($task);

        $response = [
            'data' => [
                'type' => "tasks",
                'id' => $task_id,
                'attribute' => $task
            ]
        ];
        echo json_encode($response);
        break;

        // $user = (array)$user;
        // unset($user['password']);ss
        // $response = [
        //     'data'=>$users,
        //     'status'=>202

        // ];
        // echo json_encode($response);
        // break;

    case 'PUT':
        $input = file_get_contents('php://input');
        $request = json_decode($input, true); //con true ottengo un array associativo
        $task = Task::arrayToTask($request);
        $task_id = filter_input(INPUT_GET, 'task_id');
       
        if (!is_null($task_id)) {
            echo json_encode($crud->read($task_id));
            $rows =  $crud->update($task);
           
            if ($rows == 0) {
                http_response_code(404);
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Task non trovata",
                            'detail' => $task_id
                        ]
                    ]
                ];
            }else 
            if ($rows == 1) {
                http_response_code(202);
                $response = [
                    'data' => [
                        'type' => "tasks",
                        'title' => "Task aggiornata",
                        'attribute' => $task
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
