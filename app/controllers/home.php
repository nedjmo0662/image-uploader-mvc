<?php

class Home extends controller{

    public function index($params)
    {  
        $data["page_title"] = "Photos";
        //pagination
       $co = $this->loadModel("pagination");

       //genetatin a links for the next and previous and 1,2,3,4 paages ..
       if($co->curr_page_num() % 4 == 1 ){
           //ex 1 or 5
           $data['curr'] = $co->curr_page_num();
           // 2 or 6
           $data['page'][] = $co->curr_page_num() + 1;
           //3 or 7
           $data['page'][] = $co->curr_page_num() + 2;
           //4 or 8
           $data['page'][] = $co->curr_page_num() + 3;
       }
       //if the curr page is not the first from 4 like (2,3) (1,2,3,4)
       // you need to generate the number that it position befor the (2,3) 
       else {
           $position = $co->curr_page_num() % 4;
           if($position == 0){
               $position = 4;
           }
           $to_complete = 4 - $position;
           //the befor pages ex:1,2
           for($i=1; $i<=$to_complete; $i++)
           {
               if($i == 4){
                   break;
               }
               $data["page"][] = $co->curr_page_num() + $i;
               
           }
           //current page ex:3
           $data['curr'] = $co->curr_page_num();

           //the next pages ex:4
           for($i=$position - 1; $i>=1; $i--)
           {
             
               $data["page"][] = $co->curr_page_num() - $i;
           }
           
        }


        // sortin the pages asc
        for($j=0; $j<count($data['page']); $j++){

            for($i=0; $i<count($data['page']) - 1; $i++)
            {
                
                if($data['page'][$i] > $data['page'][$i+1]){
                    $r = $data['page'][$i] ;
                    $data['page'][$i] = $data['page'][$i+1];
                    $data['page'][$i+1] = $r;
                }
            }
        }

        //includin the class from the models (load_images);
        $load_images_class = $this->loadmodel("load_images");
        //get the total number of pages
        $data['page_total'] = $load_images_class->get_total() ;
        //find (search)
        $find = isset($_GET['find'])? $_GET['find'] : "";
        //asign the images to data[images]
        $data['images'] = $load_images_class->get_images($find,$co->curr_page_num());

        //includin the class from the models(image class);
        $image_class = $this->loadmodel("image_class");
        //resizing and croping the images
        if(is_array($data['images']) && count($data['images']) > 0){
            foreach($data['images'] as $index => $image){
                $data['images'][$index]->image = $image_class->get_thumbnail($image->image, 640, 300);
                
            }
        }
        $this->view("catalog/index",$data); 
    }
}