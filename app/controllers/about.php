<?php

class About extends controller{

    public function index($params)
    {  
        $data["page_title"] = "About";
        $this->view("catalog/about",$data);  
    }
}