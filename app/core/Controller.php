<?php

class Controller {
    
    public function __construct(){}
    
    function model($model)
    {
        //echo $model;
        echo '<br> our class model is '.$model;
        echo '</br';
        require_once '../app/models/'.$model.'.php';
        var_dump($model);
         echo '<h3> end of Controller model </h3>';
        return  new $model();
        
        
    }
    public function view($view, $data = [])
    {
       require_once '../app/views/'.$view.'.php'; 
       
          echo '<h3> end of Controller view </h3>';
    }
}