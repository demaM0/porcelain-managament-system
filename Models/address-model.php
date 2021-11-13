<?php

class address {

    protected $ID;
    protected $City;
    protected $Building;
    protected $zipCode;
    protected $SupplierID
    public function __construct($ID)
    {
        $con = mysqli_connect("localhost","root","","almasrya");
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
          $this->zipCode=$row["zipCode"];
          $this->SupplierID=$row["SupplierID"];
        }
    }
     public function setCity($City)
    {
        $this->City = $City;
    }
     public function setBuilding($Building)
    {
        $this->Building = $Building;
    }
     public function setzipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

     public function getID()
    {
        return $this->ID;
    }
     public function getCity()
    {
        return $this->City;
    }
     public function getBuilding()
    {
        return $this->Building;
    }
     public function getzipCode()
    {
        return $this->zipCode;
    }
     public function getSupplierID()
    {
        return $this->SupplierID;
    }
  }
?>