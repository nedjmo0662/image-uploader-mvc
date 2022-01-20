<?php

class controller {

    public function view($view,$data = [])
    {
        
        if(file_exists("../app/views/". $view . ".php"))
        {
            require "../app/views/". $view . ".php";
        }
    }

    public function loadModel($model)
    {
        if(file_exists("../app/models/" . strtolower($model) . ".php"))
        {
            require("../app/models/" . strtolower($model) . ".php");
            return new $model;
        }
    }
}