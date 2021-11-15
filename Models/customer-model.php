<?php
 include_once('\Observer\notify.php');
 include_once('\Observer\observerinterface.php');
 include_once('\Observer\subjectinterface.php');
 include_once('\Controller\customercontroller.php');
 include_once('\Controller\manager.php');
 include_once('\Controller\salesman.php');
 include_once('\Controller\suppliercontroller.php');
 require_once("SingleTon.php");
 class customer {

    protected $ID;
    protected $Name;
    protected $Phone;
    protected $Email;
    function __construct($ID)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql= "SELECT * FROM customer WHERE ID=$ID";
        $customerdataset = mysqli_query($con,$sql,MYSQLI_USE_RESULT);
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