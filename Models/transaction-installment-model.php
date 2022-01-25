<?php
require_once("SingleTon.php");
class  transactioninstallment
{
    public $Id;
    public $InstallmentId;
    public $TransactionId;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from transactioninstallment where Id=$Id";
        $transactiondataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($transactiondataset))
        {
          $this->Id=$row["Id"];
          $this->InstallmentId=$row["InstallmentId"];
          $this->TransactionId=$row["TransactionId"];
        }
    }
    public static function Transaction($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from transactioninstallment where TransactionId=$Id";
        $result=mysqli_query($con,$sql);
        $num = mysqli_num_rows($result);
        $invoiceIdArray=array();
        if($num>0)
        {
          while($row=mysqli_fetch_array($result))
          {
            
              $invoiceloop=$row["InstallmentId"];
              array_push($invoiceIdArray,$invoiceloop);
            
          }
        }
        return $invoiceIdArray;
    }
    public static function create($InstallmentId,$TransactionId)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into  `transactioninstallment`(InstallmentId,TransactionId) values ($InstallmentId,$TransactionId)";
      mysqli_query($con,$reg);
    }
    public static function SelectAllWithId($Transaction)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $query = "SELECT * FROM transactioninstallment where TransactionId = $Transaction->Id";
      $result = mysqli_query($con, $query);
      $num = mysqli_num_rows($result);
      $installmentsarray = array();
      if($num>0)
      {
        while($row = mysqli_fetch_array($result))
        {

            $installmentloop = ($row);
            array_push($installmentsarray,$installmentloop);
          
        }
        return $installmentsarray;
      }

      
    }
    
    
}
?>
