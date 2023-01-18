<?php

namespace Route\Mvc\core;

class Model{
    private $connection;
    private $sql;

    public function __construct()
    {
       return $this->connection = mysqli_connect('localhost','root','','mvcplugin');
    }

    public function select($table,$column = "*"){
        $this->sql = "SELECT $column FROM `$table`";
        return $this;
    }
    public function selectNum($table,$column){
        $this->sql = "SELECT $column FROM `$table`";
        return $this;
    }

    public function check($table,$key,$value)
    {
        $this->sql = "SELECT $key FROM `$table` WHERE $key = '$value'";
        $query = mysqli_query($this->connection, $this->sql);
        return mysqli_num_rows($query);
    }

    public function checkTwoCond($table,$key,$value,$key2,$value2)
    {
        $this->sql = "SELECT $key FROM `$table` WHERE $key = '$value' AND $key2 = '$value2'";
        $query = mysqli_query($this->connection, $this->sql);
        return mysqli_num_rows($query);
    }

    public function where($column,$operator,$value){
        $this->sql .= " WHERE `$column` $operator '$value'";
        return $this;
    }

    public function rows(){
        $query = mysqli_query($this->connection, $this->sql);
        if(is_object($query)){
            return  mysqli_fetch_all($query,MYSQLI_ASSOC);
        }
        return  $this->showError();
    }

    public function first(){
        $query = mysqli_query($this->connection, $this->sql);
        if(is_object($query)){
            return  mysqli_fetch_assoc($query);
        }
        return  $this->showError();
    }

    public function delete($table){
       $this->sql = "DELETE FROM `$table` ";
       return $this;
    }

    public function insert($table,$data){
        $columns = '';
        $values = '';
        foreach ($data as $column => $value){
            $columns .= "`$column`,";
            $values .= " '$value',";
        }

        $columns = rtrim($columns,',');
        $values = rtrim($values,',');

        $this->sql = "INSERT INTO `$table`  ($columns) VALUES ($values)";
        return $this;
    }
    public function excute(){
        $query = mysqli_query($this->connection, $this->sql);
        if(is_object($query)){
            return mysqli_affected_rows($this->connection);
        }
        return  $this->showError();
    }

    public function update($table,$data){
        $row = '';
        foreach ($data as $column => $value){
            $row .= "`$column` = '$value',";
        }

        $row = rtrim($row,',');

        $this->sql = "UPDATE `$table` SET $row";
        return $this;
    }

    public function andWhere($column,$operation,$value){
        $this->sql .= "AND `$column` $operation '$value'";
        return $this;
    }
    public function andTwoWhere($column,$operation,$value,$value2)
    {
        $this->sql .= "AND(`$column` $operation '$value' OR `$column` $operation '$value2')";
        return $this;
    }

    public function orWhere($column,$operation,$value){
        $this->sql .= "OR `$column` $operation '$value'";
        return $this;
    }

    public function join($type,$table,$primary,$foreign){
        $this->sql .= "$type JOIN `$table` ON $primary = $foreign";
        return $this;
    }

    private function showError(){
       return mysqli_error_list($this->connection);
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }
}