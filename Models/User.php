<?php

include_once('\Observer\notify.php');
include_once('\Observer\observerinterface.php');
include_once('\Observer\subjectinterface.php');
include_once('\Controller\customercontroller.php');
include_once('\Controller\manager.php');
include_once('\Controller\salesman.php');
include_once('\Controller\suppliercontroller.php');
require_once("SingleTon.php");
abstract class user{

    protected $Id;
    protected $Name;
    protected $Phone;
    protected $Email;
    protected $Password;
    protected $UserType;

     function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
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
     public function setPassword(string $Password)
    {
        $this->Password = $Password;
    }

     public function setName(string $Name)
    {
        $this->Name = $Name;
    }
     public function setPhone(string $Phone)
    {
        $this->Phone = $Phone;
    }
     public function setEmail(string $Email)
    {
        $this->Email =$Email;
    }
     public function setUserType(string $UserType)
    {
        $this->UserType =$UserType;
    }
    
    #getters
     public function getId()
    {
        return $this->Id;
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

     public function getPassword()
    {
         
        return $this->Password;
    }
     public function getUserType()
    {
         
        return $this->UserType;
    }
  }
?>