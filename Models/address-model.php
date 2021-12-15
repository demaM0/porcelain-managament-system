<?php
require_once("SingleTon.php");
class address {

    public $Id;
    public $City;
    public $Building;
    public $ZipCode;
    
    public function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $s="select * from address where Id=$Id";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($row = mysqli_fetch_array($result))
        {
          $this->Id=$row["Id"];
          $this->City=$row["City"];
          $this->Building=$row["Building"];
          $this->ZipCode=$row["ZipCode"];
          
        }
    }
    public static function createaddress($City, $Building, $ZipCode)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into address(City, Building, ZipCode) values ('$City', '$Building', $ZipCode)";
      
      var_dump(mysqli_query($con,$reg));
      
    }
    public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE address SET City =? ,Building =? ,ZipCode=?
        WHERE Id =?"
      );
      $sql->bind_param('ssii',$this->City, $this->Building, $this->ZipCode,$this->Id);
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
        "UPDATE address SET IsDeleted =? where Id=?"
      );
      $this->IsDeleted=1;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("address deleted");
      }

    }
    
}
?>