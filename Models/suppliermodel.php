<?php
require_once('../Models/SingleTon.php');
class supplier
{
	public $Id;
	public $Name;
	public $Email;
	public $Phone;
  public $IsDeleted;
	

    public function __construct($Id)
    {
      $con =DbConnection::getInstance();
    if(!$con)
    {
        die('could not connect: ' . mysqli_error($con));
    }
    $s = "select * from supplier where Id  = $Id ";
    $result = mysqli_query($con,$s);
    $num = mysqli_num_rows($result);
    if($num == 1 && $row = mysqli_fetch_assoc($result)){
    $this->Id = $Id;
    $this->Name = $row["Name"];
    $this->Phone = $row["Phone"];
    $this->Email = $row["Email"];
    $this->IsDeleted = $row["IsDeleted"];
    
   }
        
    }
    public static function create($Name, $Phone, $Email)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into supplier(Name, Phone, Email) values ('$Name', '$Phone', '$Email')";
      mysqli_query($con,$reg);
      echo("supplier created");
    }
    public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE supplier SET Name =? ,Phone =?, UpdatedAt=CURRENT_TIMESTAMP() ,Email=?
        WHERE Id =?"
      );
      $sql->bind_param('sisi',$this->Name, $this->Phone, $this->Email,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("supplier updated");
      }		
    }
    public function delete()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE supplier SET IsDeleted =?, UpdatedAt=CURRENT_TIMESTAMP() where Id=?"
      );
      $this->IsDeleted=1;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("supplier deleted");
      }		

    }
 
}  



?>