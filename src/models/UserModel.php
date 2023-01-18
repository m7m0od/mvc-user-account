<?php

namespace Route\Mvc\models;

use Route\Mvc\core\Model;

class UserModel extends Model{

    public function find($key,$value)
    {
        return $this->check("users",$key,$value);
    }
    public function findLogin($key,$value,$key2,$value2)
    {
        return $this->checkTwoCond("users",$key,$value,$key2,$value2);
    }
    public function selectByData($key,$code){
        return $this->select("users")->where("$key","=",$code)->first();
    }
    public function create($data){
        return $this->insert("users",$data)->excute();
    }
    public function selectUserId($username){
        return $this->selectNum("users",'id')->where("username","=",$username)->first();
    }
    public function getUser($username,$password){
        return $this->select("users")->where("username","=",$username)->andWhere("password","=",$password)->first();
    }

    public function updateUser($data,$id){
        return $this->update("users",$data)->where("id","=",$id)->excute();
    }

}