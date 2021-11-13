<?php

abstract class customer {

    protected $ID;
    protected $Name;
    protected $Phone;
    protected $Email;
    public function __construct()
    {

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