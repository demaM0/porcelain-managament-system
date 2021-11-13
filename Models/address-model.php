<?php

abstract class address {

    protected $ID;
    protected $City;
    protected $Building;
    protected $zipCode;
    protected $SupplierID
    public function __construct($ID)
    {
        $con = mysqli_connect("localhost","root","","elmasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
        }
        $sql="select * from address where ID=$ID";
        $addressdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($addressdataset))
        {
          $this->ID=$row["ID"];
          $this->City=$row["City"];
          $this->Building=$row["Building"];
          $this->zipCode=$row["ZipCode"];
          $this->SupplierID=$row["SupplierID"];
        }
    }
    abstract public function setid(string $ID)
    {
        $this->ID = $ID;
    }
    abstract public function setcity(string $City)
    {
        $this->City = $City;
    }
    abstract public function setbuilding(string $Building)
    {
        $this->Building = $Building;
    }
    abstract public function setzipcode(string $zipCode)
    {
        $this->zipCode = $zipCode;
    }

    abstract public function getid()
    {
        return $this->ID;
    }
    abstract public function getcity()
    {
        return $this->City;
    }
    abstract public function getbuilding()
    {
        return $this->Building;
    }
    abstract public function getzipcode()
    {
        return $this->zipCode;
    }
    abstract public function getsupplierid()
    {
        return $this->SupplierID;
    }
  }
?>