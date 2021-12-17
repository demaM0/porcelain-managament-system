<?php
require_once('../Models/SingleTon.php');
class transaction
{
	public $Id;
	public $FullPrice;
	public $SupplierId;
	public $ManagerId;
	public $IsDeleted;
    public $UpdatedAt;
    public $CreatedAt;

    public function __construct($id)
    {
      $con =DbConnection::getInstance();
    if(!$con)
    {
        die('could not connect: ' . mysqli_error($con));
    }
    $s = "select * from transaction where Id  = $id ";
    $result = mysqli_query($con,$s);
    $num = mysqli_num_rows($result);
    if($num == 1 && $row = mysqli_fetch_assoc($result)){
    $this->Id = $id;
    $this->FullPrice = $row["FullPrice"];
    $this->SupplierId = $row["SupplierId"];
    $this->ManagerId = $row["ManagerId"];
   }
        
    }
    public static function create($FullPrice, $SupplierId, $ManagerId)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into transaction(FullPrice, SupplierId, ManagerId) values ($FullPrice, $SupplierId, $ManagerId)";
      var_dump(mysqli_query($con,$reg));
      echo("transaction created");
    }
    public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE transaction SET FullPrice =?, UpdatedAt = CURRENT_TIMESTAMP() ,SupplierId =? ,ManagerId =?
        WHERE Id =?"
      );
      $sql->bind_param('iiii',$this->FullPrice, $this->SupplierId,$this->ManagerId, $this->Id);
      $bol = $sql->execute();
      if($bol)
      {
       echo("transaction updated");
      }		
    }
    public function delete()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE transaction SET IsDeleted =?, UpdatedAt=CURRENT_TIMESTAMP() where Id=?"
      );
      $this->IsDeleted=1;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("transaction deleted");
      }		

    }
}  
?>