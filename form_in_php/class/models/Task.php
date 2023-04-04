<?php

namespace models;

class Task{

    public $task_id;
    public $user_id;
    public $name;
    public $due_date;
    public $done;

    //  //rappresenta nome e cognome dell'utente di seguito
    //  public function label()
    //  {
    //      return $this->first_name . " " . $this->last_name;
    //  }
 
    //  $class_array array associativo che contiene tutte le informazioni degli attributi dell'oggetto 
    //  user che verrà creato.
     public static function arrayToTask($class_array):Task
     {
         $task = new Task;
         foreach ($class_array as $class_attribute => $value_of_class_attribute) {
             $task->$class_attribute = $value_of_class_attribute;
         }
         return $task;
     }
}