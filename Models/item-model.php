<?php
require_once('SingleTon.php');
class Items
{
	public $Id;
	public $Name;
	public $Color;
	public $Price;
	public $Quantity;
  public $IsDeleted;
  public $Image;

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
    $this->Image = $row["Image"];
   }
        
    }
    public static function create($Name, $Color, $Quantity,$Price,$id)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $s = "select * from supplier where Id  = $id ";
       $result = mysqli_query($con,$s);
      $num = mysqli_num_rows($result);
    if($num==1)
    {
      $reg = "insert into items(Name, Color, Quantity,Price) values ('$Name', '$Color', $Quantity,$Price)";
      var_dump(mysqli_query($con,$reg));
    }
      
      
    }
    public static function itemsupplier($id)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $s= mysqli_insert_id($con); 
      
      echo($id);
      $reg="insert into itemsupplier(SupplierId,ItemId) values ($id,$s)";

      var_dump(mysqli_query($con,$reg));
    }
    public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE items SET Price =?, UpdatedAt = CURRENT_TIMESTAMP() ,Quantity =? 
        WHERE Id =?"
      );
      $sql->bind_param('iii',$this->Price, $this->Quantity, $this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        header('location:itemviewdelete.html');
      }		
    }
    public function delete()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE items SET IsDeleted =?, UpdatedAt=CURRENT_TIMESTAMP() where Id=?"
      );
      $this->IsDeleted=1;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("item deleted");
      }		

    }
    public static function selectall()
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $query = "SELECT * FROM items ";
      $result = mysqli_query($con, $query);
      $num = mysqli_num_rows($result);
      $itemsarray = array();
      if($num>0)
      {
        while($row = mysqli_fetch_array($result))
        {
          if($row["IsDeleted"]==0)
          {
            $itemloop = new Items($row["Id"]);
            array_push($itemsarray,$itemloop);
          }
        }
      }
      return $itemsarray;
  }
  
}  
?>