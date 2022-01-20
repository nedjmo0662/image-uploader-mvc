<?php

class pagination {

    public $URL = "";

    public function __construct()
    {
       
        $this->URL = $_GET;
    }
    public function curr_page_num()
    {
        $page = isset($this->URL['page']) && $this->URL['page'] > 0 ? $this->URL['page'] : 0;
        if($page == 0){
            $page = isset($this->URL['url']) && (int)$this->URL['url'] > 0 ? (int) $this->URL['url'] : 1;
        }
        // pre($_GET['page']);
        return $page;
    } 
    // public function current_url()
    // {
    //     // $url = isset($this->URL['url']) ? $this->URL['url'] : 1;
    //     $num = $this->curr_page_num();
    //     $url = "?page=";
    //     // foreach($_GET as $key => $val)
    //     // {
    //     //     $url .= $num;
    //     //     $num++;
    //     // }
    //     // return $num;
    //     $url .= $num;
    //     return ROOT . $url;
    // }
    public function generate_url()
    {

    }
}