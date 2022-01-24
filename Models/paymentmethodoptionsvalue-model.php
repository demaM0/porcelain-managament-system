<?php
require_once("SingleTon.php");
class paymentmethodoptionsvalue
{
    public $Id;
    public $PMOpId;
    public $Value;
    public $RegistrationId;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from paymentmethodoptionsvalue where Id=$Id";
        $PMOVdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($PMOVdataset))
        {
          $this->Id=$row["Id"];
          $this->PMOpId=$row["PMOpId"];
          $this->Value=$row["Value"];
          $this->RegistrationId=$row["RegistrationId"];
        }
    }
    public static function create($PMOpId,$Value, $IPMIdwanted)
    {
      $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
      
      $reg = "insert into paymentmethodoptionsvalue(PMOpId, Value,RegistrationId) values ($PMOpId,'$Value', $IPMIdwanted)";
      mysqli_query($con,$reg);
    }

}