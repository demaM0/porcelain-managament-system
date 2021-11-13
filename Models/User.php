<?php
include_once("Person.php");

abstract class User extends Person {

    protected $username;
    protected $password;

    abstract public function setusername(string $username)
    {
        $this->username = $username;
    }
    abstract public function setpassword(string $password)
    {
        $this->password = $password;
    }

    abstract public function getusername()
    {
        return $this->username;
    }

    abstract public function getpassword()
    {
        return $this->password;
    }
  }
?>