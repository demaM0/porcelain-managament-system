<?php
abstract class Person {

    protected $id;
    protected $name;
    protected $phone;
    protected $email;
    abstract public __construct();

    #setters
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
  }
?>