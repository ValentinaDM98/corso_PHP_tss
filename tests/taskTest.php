<?php

function tasks_test(){
    (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("INSERT INTO `task` (`task_id`, `user_id`, `name`, `due_date`, `done`)
    VALUES (1, 1, 'Comprare latte', '2023-04-24', false),
    (3, 3, 'Andare in palestra', '2021-04-24', true),
    (4, 5, 'Cucinare', '2022-04-24', true),
    (2, 2, 'Fare la spesa', '2023-05-24', true);"); 
    
    
}