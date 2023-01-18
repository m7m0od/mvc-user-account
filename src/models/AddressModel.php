<?php

namespace Route\Mvc\models;

use Route\Mvc\core\Model;

class AddressModel extends Model{

    public function create($data){
        return $this->insert("user_address",$data)->excute();
    }
}