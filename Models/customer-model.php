<?php

abstract class customer {

    protected $ID;
    protected $Name;
    protected $Phone;
    protected $Email;
    function __construct($ID)
    {
        $con = mysqli_connect("localhost","root","","almasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
        }
        $sql="select * from customer where ID=$ID";
        $customerdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($customerdataset))
        {
          $this->ID=$row["ID"];
          $this->Name=$row["Name"];
          $this->Phone=$row["Phone"];
          $this->Email=$row["Email"];
        }
    }
    abstract public function setid(string $ID)
    {
        $this->ID = $ID;
    }
    abstract public function setname(string $Name)
    {
        $this->Name = $Name;
    }
    abstract public function setphone(string $Phone)
    {
        $this->Phone = $Phone;
    }
    abstract public function setemail(string $Email)
    {
        $this->Email = $Email;
    }

    abstract public function getid()
    {
        return $this->ID;
    }
    abstract public function getname()
    {
        return $this->Name;
    }
    abstract public function getphone()
    {
        return $this->Phone;
    }
    abstract public function getemail()
    {
        return $this->Email;
    }
  }
?>