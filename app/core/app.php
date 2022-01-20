<?php

class app {
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        
        $url = $this->spliteURL();
        $file = "../app/controllers/" . strtolower($url[0]) .".php";
        if(file_exists($file))
        {
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }
        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        if(isset($url[1]) && !isset($url[0]))
        {
            
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = array_values($url);
        $method = $this->method;
        $this->controller->$method($this->params);

    }
    private function spliteURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode("/",filter_var(trim ($url,"/"),FILTER_SANITIZE_URL));
    }
}