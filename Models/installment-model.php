<?php
require_once("SingleTon.php");
 class installment {

    public $Id;
    public $Quantity;
    public $IsPaid;
    public $CreatedAt;
    
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
          $this->IsPaid=$row["IsPaid"];
          $this->CreatedAt=$row["CreatedAt"];
          
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
        "UPDATE installment SET Quantity =?, IsPaid=1 ,UpdatedAt =CURRENT_TIMESTAMP()
        WHERE Id =?"
      );
      $sql->bind_param('ii',$this->Quantity,$this->Id);
      $bol = $sql->execute();

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
    public static function selectall()
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $query = "SELECT * FROM installment ";
      $result = mysqli_query($con, $query);
      return $result;
    }


    
  }
?>