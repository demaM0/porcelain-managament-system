<?php
require_once('Models\SingleTon.php');
class Items
{
	public $Id;
	public $Name;
	public $Color;
	public $Price;
	public $Quantity;

    public function __construct($id)
    {
      $con =DbConnection::getInstance();
    if(!$con)
    {
        die('could not connect: ' . mysqli_error($con));
    }
    $s = "select * from items where Id  = $id ";
    $result = mysqli_query($con,$s);
    $num = mysqli_num_rows($result);
    if($num == 1 && $row = mysqli_fetch_assoc($result)){
    $this->Id = $id;
    $this->Name = $row["Name"];
    $this->Color = $row["Color"];
    $this->Price = $row["Price"];
    $this->Quantity = $row["Quantity"];
   }
        
    }
    public static function createitem($Name, $Color, $Quantity,$Price)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into items(Name, Color, Quantity,Price) values ('$Name', '$Color', $Quantity,$Price)";
      mysqli_query($con,$reg);
      header('location:viewupdate.html');
    }
    public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE items SET Price =? ,Quantity =? 
        WHERE Id =?"
      );
      $sql->bind_param('iii',$this->Price, $this->Quantity, $this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        header('location:viewdelete.html');
      }		
    }
    public function delete()
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
    $s = "select * from items where Id  = $this->Id ";
    $result = mysqli_query($con,$s);
    if(!$result)
    {
      echo"No such item id";
    }
    else{
    $reg = "DELETE FROM `items` WHERE  Id  = $this->Id ";
       mysqli_query($con,$reg);
    echo"Sucessfuly deleted";
    }

    }

    


}  



?>