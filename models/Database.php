<?php

class Database{
    private $connect;
    private $username = "root";
    private $host = "localhost";
    private $password = '';
    private $dbName ="textrix";

    public function __construct(){
        $this->connect = new mysqli($this->host,$this->username,$this->password,$this->dbName);
    }
    // public function __construct(){
    //     try{
    //         $this->connect = new PDO("mysql:host=$this->host;dbname= $this->dbName",$this->username,$this ->password);
    //         return $this->connect;
    //     }catch(PDOException $e){
    //         exit("Error In Connection ".$e->getMessage());
    //     }
    // }

    public function getConnection(){
        if($this->connect->connect_error){
        exit("Error In Connection " . $this->connect ->connect_error);
        }else{
            return $this->connect;
        }
    }

}



