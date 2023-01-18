<?php

namespace Route\Mvc\core;

class app{

    private $controller;


    private $method;


    private $params;

    private $num;


    public function __construct()
    {
        $this->buildUrl();
        $this->run();
    }


    private function buildUrl(){
        $url =  explode("/",$_SERVER['QUERY_STRING']);


        $this->controller = (empty($url[0])) ? 'home' : $url[0];


        $this->method = (empty($url[1])) ? 'index' : $url[1];

        $this->num = (empty($url[2])) ? 0 : $url[2];


        unset($url[0],$url[1]);
        
        
        $this->params = $url;
    }

    private function run(){
        $controller = "Route\Mvc\controllers\\".$this->controller;
        if(class_exists($controller)){
            call_user_func_array([new $controller,$this->method],$this->params);
        }else{
            header("location:../../public/home/notFound");
        }
    }
}