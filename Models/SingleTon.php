<?php
class DbConnection
 {
    private $host="localhost";
    private $username="root";
    private $password="";
    private $db_Name="almasrya";
    private $db_connection;
    private static $instance;
    public static $counter=0;
    private function __construct()
    {
        $this->db_connection=$this->database_connect($this->host,$this->username,$this->password,$this->db_Name);

    }
    public static function getInstance()
    {
        if(self::$instance==null)
        {
            echo "Return New Instance";
            self::$instance=new DbConnection();
        }
        else
        {
            echo "Object is their <br>";  
        }
        return self::$instance;

    }
    private function database_connect($database_host,$database_username,$database_password,$db_Name)
    {
        if($connection=mysqli_connect($database_host,$database_username,$database_password,$db_Name))
        {
            return $connection;
        }
        else
        {
            die("Database connection error");
        } 
        
    }
    
    private function database_select($db_Name)
    {
        return mysqli_select_db($this->database_connection,$db_Name)
        or die("no database is selected");

    }
    
}
?>