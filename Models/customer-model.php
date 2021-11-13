<?php

 class customer {

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
    public function setName($Name)
    {
        $this->Name = $Name;
    }
    public function setPhone($Phone)
    {
        $this->Phone = $Phone;
    }
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getID()
    {
        return $this->ID;
    }
    public function getName()
    {
        return $this->Name;
    }
    public function getPhone()
    {
        return $this->Phone;
    }
    public function getEmail()
    {
        return $this->Email;
    }
  }
?>