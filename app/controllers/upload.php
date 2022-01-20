<?php

class upload extends controller{

  
    public function index($params)
    {  
        // $data["page_title"] = "upload";
        // $this->view("catalog/index",$data); 
    }

    public function image($params)
    {  
        $data["page_title"] = "upload image";
        //check if the user is logged in
        $model = $this->loadmodel("user");
        if(!$model->is_logged_in())
        {
          header("location: " . ROOT . "login");die;
        } 
        if(isset($_POST['title']) && isset($_FILES['file'])){
          $upload_file = $this->loadModel("upload_file");
          $upload_file->upload($_POST,$_FILES);
        }
      $this->view("catalog/upload_image",$data);

       
    }
    public function video($params)
    {  
        $data["page_title"] = "upload video";
        $this->view("catalog/upload_video",$data); 
       
    }

}