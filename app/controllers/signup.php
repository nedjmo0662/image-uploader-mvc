<?php

class Signup extends controller{
    
    public function index($params)
    {  
        $data = null;
        $data["page_title"] = "Signup";

        if(isset($_POST['signup'])){
           $model = $this->loadmodel("user");
           $data['error'] = $model->signup($_POST);
        }
        $this->view("catalog/signup",$data);  
    }
}