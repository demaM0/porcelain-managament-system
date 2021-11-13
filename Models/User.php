<?php
include_once("UserType.php");

abstract class User extends Person {

    protected $Id;
    protected $Name;
    protected $Phone;
    protected $Email;
    protected $Username;
    protected $Password;
    protected $UserTypeObj;

    abstract public __construct($Id)
    {
        $con = mysqli_connect("localhost","root","","almasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
        }
        $sql="select * from User where Id=$Id";
        $Userdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($Userdataset))
        {
          $this->Id=$row["Id"];
          $this->Name=$row["Name"];
          $this->Phone=$row["Phone"];
          $this->Email=$row["Email"];
          $this->Username=$row["Username"];
          $this->Password=$row["Password"];
          $this->UserTypeObj=new UserType($row["UserType"]);
        }
		
    }

        #setters
    abstract public function setusername(string $Username)
    {
        $this->Username = $Username;
    }
    abstract public function setpassword(string $Password)
    {
        $this->Password = $Password;
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
        $this->Email =$Email
    }

    #getters
    abstract public function getid()
    {
        return $this->Id;
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
    abstract public function getusername()
    {
        return $this->Username;
    }
    abstract public function getpassword()
    {
         
        return $this->Password;
    }
    abstract public function getUserTypeObj()
    {
         
        return $this->UserTypeObj;
    }
  }
?>