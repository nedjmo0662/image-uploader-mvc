<?php

class Load_images {

    public $limit = 10;
    public function get_images($find = "", $page_number = 1){

        $DB = new Database();
        // $page_number = isset($_GET['page']) && (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;
        $offset  = ($page_number - 1) * $this->limit;

        if($find == ''){

            $query = "SELECT * FROM images ORDER BY id DESC LIMIT $this->limit OFFSET $offset";
            return $DB->read($query);
        }else {
            $find = esc($find);
            $query = "SELECT * FROM images where title like '%$find%' ORDER BY id DESC LIMIT $this->limit OFFSET $offset";
            $result = $DB->read($query);
            return $result;
        }
    }


    public function get_total()
    {
        $DB = new Database();
        $query = "SELECT * FROM images";
        return ceil(count($DB->read($query)) / $this->limit);
    }

    public function get_single_image($url_address)
    {
        $DB = new Database();
        $query = "UPDATE  images SET views = views + 1 WHERE url_address = :url limit 1";
        $arr['url'] = $url_address;
        $DB->write($query, $arr);

        $DB = new Database();
        $query = "SELECT * FROM images WHERE url_address = :url limit 1";
        $data = $DB->read($query, $arr);
        return $data[0];
    }
}