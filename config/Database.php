<?php
class Database
{
    private $hostname='localhost';
    private $dbname='rest_api_mvc';
    private $username='root';
    private $password='';
     
    
   
    //connect function will connect to server and return connection
    
     public function connect()
     {
        $this->connection=NULL;
         //create connection
        $this->connection= new mysqli($this->hostname,$this->username,$this->password,$this->dbname);

        //check connection
        if($this->connection->connect_error)
        {
            die('Connection Failed:'.$this->connection->connect_error);
        }
        
       return $this->connection;
     }
     
    
}


?>