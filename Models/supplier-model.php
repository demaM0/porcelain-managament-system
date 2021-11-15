<?php
require_once("SingleTon.php");
 class supplier {

    protected $ID;
    protected $Name;
    protected $Phone;
    protected $Email;
    function __construct($ID)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from supplier where ID=$ID";
        $supplierdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($supplierdataset))
        {
          $this->ID=$row["ID"];
          $this->Name=$row["Name"];
          $this->Phone=$row["Phone"];
          $this->Email=$row["Email"];
        }
    }
     public function setname(string $Name)
    {
        $this->Name = $Name;
    }
     public function setphone(string $Phone)
    {
        $this->Phone = $Phone;
    }
     public function setemail(string $Email)
    {
        $this->Email = $Email;
    }

     public function getid()
    {
        return $this->ID;
    }
     public function getname()
    {
        return $this->Name;
    }
     public function getphone()
    {
        return $this->Phone;
    }
     public function getemail()
    {
        return $this->Email;
    }
  }
?>