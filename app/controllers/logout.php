<?php

class Logout extends controller{

    public function index($params)
    {  
        $data['page_title'] = "Logout";
        if(isset($_POST['logout']))
        {
            if(isset($_SESSION['userid'])){
                session_destroy();
                header("location: " . ROOT . "login");
            }
        }  
        $this->view("catalog/logout",$data); 
    }
}