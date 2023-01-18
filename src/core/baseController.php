<?php

namespace Route\Mvc\core;
 

class basecontroller{

    public function __call($name, $arguments)
    {
        header("location:../../public/home/notFound");
    }

    protected function view($path,$data = []){
        extract($data);
        require "../src/views/".$path.".php";
    }
}