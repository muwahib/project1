<?php

class db_class{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset; 
    private $stmt;

    
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "Muwahib";
        $this->password = "Muwahib@521409";
        $this->dbname = "user_db";
        $this->charset = "utf8mb4";
    }

    public function connect(){

        try{
        $sqlconn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
        $conn = new PDO($sqlconn, $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn;
        } catch(PDOException $e){
        echo "Connection failed: ".$e->getMessage();
        }
        
    }
    //query & prepare
    public function query($sql_query){
       $conn = $this->connect();
        $this->stmt=$conn->prepare($sql_query);
        return $this->stmt;
    }
   
   
    //query_execute
    public function execute_stmt(){
       return $this->stmt->execute(); 
    }

    //execute & fetch_obj
    public function fetch_Assoc(){
        $this->execute_stmt();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>

