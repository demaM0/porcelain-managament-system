<?php

 require_once("SingleTon.php");
 class customer {

    public $Id;
    public $Name;
    public $Phone;
    public $Email;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql= "SELECT * FROM customer WHERE Id=$Id";
        $customerdataset = mysqli_query($con,$sql,MYSQLI_USE_RESULT);
        if($row = mysqli_fetch_array($customerdataset))
        {
          $this->Id=$row["Id"];
          $this->Name=$row["Name"];
          $this->Phone=$row["Phone"];
          $this->Email=$row["Email"];
        }
    }
    public static function create($Name, $Phone, $Email)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into customer(Name, Phone, Email) values ('$Name', $Phone, '$Email')";

      mysqli_query($con,$reg);
      echo '<script>window.location="../../Views/shoppingcart.php"</script>';
      
    }
    public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE customer SET Name =? ,Phone =? ,Email=?,UpdatedAt =CURRENT_TIMESTAMP()
        WHERE Id =?"
      );
      $sql->bind_param('sisi',$this->Name, $this->Phone, $this->Email,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("updated");
      }
    }
    public function delete()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE customer SET IsDeleted =? ,UpdatedAt =CURRENT_TIMESTAMP() where Id=?"
      );
      $this->IsDeleted=1;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("customer deleted");
      }

    }
  }
?>