<?php

class contact extends controller{
    
    public function index($params)
    {  
        $data["page_title"] = "Contact";
        $this->view("catalog/contact",$data);  
    }
}