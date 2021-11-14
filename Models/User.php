<?php

include_once('\Observer\notify.php');
include_once('\Observer\observerinterface.php');
include_once('\Observer\subjectinterface.php');
include_once('\Controller\customercontroller.php');
include_once('\Controller\manager.php');
include_once('\Controller\salesman.php');
include_once('\Controller\suppliercontroller.php');
abstract class user{

    protected $Id;
    protected $Name;
    protected $Phone;
    protected $Email;
    protected $Password;
    protected $UserType;

    abstract public __construct($Id)
    {
        $con = mysqli_connect("localhost","root","","almasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
        }
        $sql="select * from user where Id=$Id";
        $Userdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($Userdataset))
        {
          $this->Id=$row["Id"];
          $this->Name=$row["Name"];
          $this->Phone=$row["Phone"];
          $this->Email=$row["Email"];
          $this->Password=$row["Password"];
          $this->UserType=$row["UserType"];
        }
		
    }

        #setters
    abstract public function setPassword(string $Password)
    {
        $this->Password = $Password;
    }

    abstract public function setName(string $Name)
    {
        $this->Name = $Name;
    }
    abstract public function setPhone(string $Phone)
    {
        $this->Phone = $Phone;
    }
    abstract public function setEmail(string $Email)
    {
        $this->Email =$Email
    }
    abstract public function setUserType(string $UserType)
    {
        $this->UserType =$UserType
    }
    
    #getters
    abstract public function getId()
    {
        return $this->Id;
    }

    abstract public function getName()
    {
        return $this->Name;
    }
    abstract public function getPhone()
    {
        return $this->Phone;
    }
    abstract public function getEmail()
    {
        return $this->Email;
    }

    abstract public function getPassword()
    {
         
        return $this->Password;
    }
    abstract public function getUserType()
    {
         
        return $this->UserType;
    }
  }
?>