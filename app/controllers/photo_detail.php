<?php

class Photo_detail extends controller{
    
    public function index($params = '')
    {  
        
        $data["page_title"] = "Photo Details";
        $load_images_model = $this->loadmodel("load_images");
        $data['image'] = $load_images_model->get_single_image($params[0]);
        $data['random_images'] = $load_images_model->get_images();
        //resizing the images and crop if needed;
        $image_class = $this->loadmodel("image_class");
        if(is_array($data['random_images']) && count($data['random_images']) > 0){
            foreach($data['random_images'] as $index => $image){
                $data['random_images'][$index]->image = $image_class->get_thumbnail($image->image, 640, 300);
                
            }
        }
        $this->view("catalog/photo_detail",$data);  
    }
}