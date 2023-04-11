<?php

use crud\UserCRUD;
use models\User;

include "../../config.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];

$crud = new UserCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        
        $user_id = filter_input(INPUT_GET,'user_id');
        if(!is_null($user_id)){
            $res = $crud->read($user_id);
            if($res == false){
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "risorsa non trovata",
                            'details' => filter_input(INPUT_GET,'user_id')
                         ]
                    ]    
                ];  
                echo json_encode($response);
            }else{
                echo json_encode($res);
            }
        }else{
            $users = $crud->read();
            $response = [
                'data' => $users,
                'status'=>200
            ]; 
            echo json_encode($response);
        }
    break;

    case 'DELETE':

        $user_id = filter_input(INPUT_GET,'user_id');
        if(!is_null($user_id)){
            $rows = $crud->delete($user_id);
            if($rows == 1){
                http_response_code(200);
                $response = [
                    'data' => $user_id,
                    'status'=>200
                ]; 
                echo json_encode($response);
            }

            if($rows == 0 ){
            
                http_response_code(404);

                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Utente non trovato",
                            'details' => $user_id
                         ]
                    ]    
                ];
                echo json_encode($response);
            }
           
        }
        break;
    
    case 'POST' :
   
        try {
            $input = file_get_contents('php://input');
         
            $request = json_decode($input,true); // ottengo iun array associativo
      
            $user = User::arrayToUser($request);
            
            $last_id = $crud->create($user);
            $user->user_id = $last_id;
                
            $response = [
                'data' => $user,
                'status' => 202
            ];
    
            echo json_encode($response);
        } catch (\Throwable $th) {
            $response = responseError($th);
            echo json_encode($response);
        }

        break;
    case 'PUT' : 

        try {

            $input = file_get_contents('php://input');
            $request = json_decode($input,true); // ottengo iun array associativo
    
            $user = User::arrayToUser($request);
            $user->user_id = filter_input(INPUT_GET,'user_id');
            $crud->update($user);

            unset($user->password); 

            $response = [
                'data' => $user,
                'status' => 202
            ];
            echo json_encode($response);
           

        } catch (\Exception $e) {

           $response = responseError($e);
           echo json_encode($response);
        }
        


        break;
        default:
        break;

    

    }


function responseError($e)
{
 
    if($e->getCode() == 404){

        http_response_code(404);

        $response = [
            'errors' => [
                [
                    'status' => 404,
                    'title' => "risorsa non trovata",
                    'details' => filter_input(INPUT_GET,'user_id')
                 ]
            ]    
        ];
        return $response;
    }

    if($e->getCode() == 23000){

        http_response_code(422);

        $response = [
            'errors' => [
                [
                    'status' => 422,
                    'title' => "formato non corretto",
                    'details' => $e->getMessage()
                 ]
            ]    
        ];
        return $response;
    }


}