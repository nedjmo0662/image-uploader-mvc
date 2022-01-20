<?php

class Database{
    
    public function __construct()
    {
        // $thconnect = $this->connection();

    }
    private function connection()
    {
        try{

            $con = new PDO(DB_INFO, DB_USER , DB_PASS);
            return $con;
        }catch(PDOException $e){
            die("there is an error while connecting to the database please check the connection info:" . $e->getMessge());
        }

    }
    
    public function write($query, $data = [])
    {
        $con = $this->connection();

        $stmt = $con->prepare($query);

        $check = $stmt->execute($data);

        if($check){
            return true;
        }
        return false;
    }

    public function read($query, $data = [])
    {
        $con = $this->connection();

        $stmt = $con->prepare($query);

        
        $check = $stmt->execute($data);


        if($check){
            $result = $stmt->fetchall(PDO::FETCH_OBJ);
            if(is_array($result) && count($result) > 0){
                return $result;
            }
        }
        return false;
    }
}