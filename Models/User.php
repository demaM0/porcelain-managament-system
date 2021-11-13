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

    abstract public __construct($id)
    {
        $con = mysqli_connect("localhost","root","","almasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
        }
        $sql="select * from User where id=$Id";
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
    abstract public function setusername(string $username)
    {
        $this->username = $username;
    }
    abstract public function setpassword(string $password)
    {
        $this->password = $password;
    }

    abstract public function setname(string $name)
    {
        $this->name = $name;
    }
    abstract public function setphone(string $phone)
    {
        $this->phone = $phone;
    }
    abstract public function setemail(string $email)
    {
        $this->email =$email
    }

    #getters
    abstract public function getid()
    {
        return $this->id;
    }

    abstract public function getname()
    {
        return $this->name;
    }
    abstract public function getphone()
    {
        return $this->phone;
    }
    abstract public function getemail()
    {
        return $this->email;
    }
    abstract public function getusername()
    {
        return $this->username;
    }
    abstract public function getpassword()
    {
         
        return $this->password;
    }
    abstract public function getUserTypeObj()
    {
         
        return $this->UserTypeObj;
    }
  }
?>