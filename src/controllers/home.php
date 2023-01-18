<?php

namespace Route\Mvc\controllers;

use Route\Mvc\core\basecontroller;

class home extends basecontroller{

    public function index(){$this->view('index');}

    public function notFound(){$this->view("notFound/error");}
}