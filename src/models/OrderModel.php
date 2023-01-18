<?php

namespace Route\Mvc\models;

use Route\Mvc\core\Model;

class OrderModel extends Model{
    public function getAllOrders(){
        return $this->select("orders")->rows();
    }
    public function getAllOrdersCond($status,$user_id){
        return $this->select("orders")->where("user_id","=",$user_id)->andWhere("order_status","=",$status)->rows();
    }
    public function find($key,$value)
    {
        return $this->check("orders",$key,$value);
    }

    public function getAllOrdersTwoCond($status,$status2,$user_id)
    {
        return $this->select("orders")->where("user_id","=",$user_id)->andTwoWhere("order_status","=",$status,$status2)->rows();
    }

    public function selectByData($key,$code){
        return $this->select("orders")->where("$key","=",$code)->first();
    }

    public function addNewOrder($data){
        return $this->insert("orders",$data)->excute();
    }

    public function deleteOrder($id){
        return $this->delete("orders")->where("id","=",$id)->excute();
    }

    public function showOrderById($id){
        return $this->select("orders")->where("id","=",$id)->first();
    }

    public function updateOrder($data,$id){
        return $this->update("orders",$data)->where("id","=",$id)->excute();
    }

}