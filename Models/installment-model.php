<?php
require_once("SingleTon.php");
 class installment {

    public $Id;
    public $Quantity;
    
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from installment where Id=$Id";
        $installmentdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($installmentdataset))
        {
          $this->Id=$row["Id"];
          $this->Quantity=$row["Quantity"];
          
        }
    }
    public static function create($Quantity)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into installment(Quantity) values ('$Quantity')";
      
      mysqli_query($con,$reg);
      
    }
    public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE installment SET Quantity =? ,UpdatedAt =CURRENT_TIMESTAMP()
        WHERE Id =?"
      );
      $sql->bind_param('ii',$this->Quantity,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("update 10/10");
      }
    }
    public function delete()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE installment SET IsDeleted =? ,UpdatedAt =CURRENT_TIMESTAMP() where Id=?"
      );
      $this->IsDeleted=1;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("installment deleted");
      }

    }

    
  }
?>