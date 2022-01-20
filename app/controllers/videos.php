<?php

class Videos extends controller{

    public function index($params)
    {  
        $data["page_title"] = "Videos";
        $this->view("catalog/videos",$data);  
    }
}