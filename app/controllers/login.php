<?php

class Login extends controller{
    
    public function index($params)
    {  
        $data = null;
        $data["page_title"] = "login";
        if(isset($_POST['login']))
        {
            $model = $this->loadmodel('user');
            $result = $model->login($_POST);
            if($result == true)
            {
                header("location: " . ROOT . "photo/" );die;
            }else {
                $data['error'] = $result;
            }
            
        }
        $this->view("catalog/login",$data);  
    }
}