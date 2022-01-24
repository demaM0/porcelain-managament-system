<?php
require_once("SingleTon.php");
class invoicepaymentmethod
{
    public $Id;
    public $PaymentId;
    public $InvoiceId;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from invoicepaymentmethod where Id=$Id";
        $PMOVdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($PMOVdataset))
        {
          $this->Id=$row["Id"];
          $this->PaymentId=$row["PaymentId"];
          $this->InvoiceId=$row["InvoiceId"];
        }
    }
    public static function create($PaymentId,$InvoiceId)
    {
       
        $con =DbConnection::getInstance();
        if(!$con)
        {
        die('could not connect: ' . mysqli_error($con));
        }
        $s = "select * from paymentmethod where Id  = $PaymentId ";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($num==1)
        {
            $reg = "insert into invoicepaymentmethod(PaymentId, InvoiceId) values ($PaymentId, $InvoiceId)";
            mysqli_query($con,$reg);
        }
    }
    public static function selectall()
    {
        $con =DbConnection::getInstance();
        if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $query = "SELECT * FROM invoicepaymentmethod ";
      $result = mysqli_query($con, $query);
      return $result;
    }
}