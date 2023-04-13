<?php

use crud\TaskCRUD;
use models\Task;

require "../../config.php";
require "../autoload.php";

$crud = new TaskCRUD();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $task_id = filter_input(INPUT_GET, 'task_id');
        $user_id = filter_input(INPUT_GET, 'user_id');
        
        if (!is_null($user_id)) {
            $tasks = $crud->read($user_id);
            echo json_encode($tasks);
        } elseif (!is_null($task_id)) {
            $task = $crud->read($task_id);
            echo json_encode($task);
        } else {
            $tasks = $crud->read();
            echo json_encode($tasks);
        }
        break;

    case 'POST':
        
        $input = file_get_contents('php://input');
        $request = json_decode($input, true);
        $task = Task::arrayToTask($request);
        $last_id = $crud->create($task);
   

        $task = (array) $task;
        $task['task_id'] = $last_id;
        $response = [
            'data' => $task,
            'status' => 201,
            'details' => "Task con id " . $last_id . " creata con successo"
        ];
        echo json_encode($response);
  break;


    case 'DELETE':
        $task_id = filter_input(INPUT_GET, 'task_id', FILTER_VALIDATE_INT);
        if(!is_null($task_id)) {
            $rows = $crud->delete($task_id);
            if($rows == 1) {
                http_response_code(200);
                $response = [
                    'data' => $task_id,
                    'status' => 200,
                    'details' => "Task con id " . $task_id . " cancellata con successo"
                ];
                
            }
            if($rows == 0) {
                http_response_code(404);
                $response = [
                    'errors' => [
                        [
                            "status" => "404",
                            "title" =>  "Task non trovata",
                            "detail" => $task_id
                        ]
                    ]
                ];
            }
            echo json_encode($response);
        }
        break;

        case 'PUT':

            $task_id = filter_input(INPUT_GET, 'task_id');
            $input = file_get_contents('php://input');
            $request = json_decode($input, true);
            $task = Task::arrayToTask($request);
    
            if (!is_null($task_id)) {
                $rows = $crud->update($task);
    
                if ($rows == 1) {
                    $task = (array) $task;
    
                    $task['task_id'] = $task_id;
    
                    $response = [
                        'data' => $task,
                        'status' => 201,
                        'details' => "Task con id " . $task_id . " aggiornata con successo"
                    ];
                }
                if ($rows == 0) {
                    http_response_code(404);
                    $response = [
                        'errors' => [
                            [
                                "title" =>  "Nessuna attività trovata",
                                "detail" => $task_id
                            ]
                        ]
                    ];
                }
                echo json_encode($response,JSON_PRETTY_PRINT);
            } else {
                $tasks = $crud->read();
                echo json_encode($tasks);
            }
    
            break;
        }

?>