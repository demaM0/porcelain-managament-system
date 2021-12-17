<?php
require_once("SingleTon.php");
class userjobtitle {

  public $Id;
  public $Name;

  function __construct($Id)
  {
    $con =DbConnection::getInstance();
    if(!$con)
    {
      die('could not connect: ' . mysqli_error($con));
    }
      $sql="select * from usertype where Id=$Id";
      $UserTypedataset = mysqli_query($con,$sql);
      if($row = mysqli_fetch_array($UserTypedataset))
      {
        $this->Id=$row["Id"];
        $this->Name=$row["Name"];
      }
  }

    public static function create($Name)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into userjobtitle (Name) values ('$Name')";
      mysqli_query($con,$reg);
      #header('');
    }

    public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE userjobtitle SET Name =? ,UpdatedAt = CURRENT_TIMESTAMP() WHERE Id =?"
      );
      $sql->bind_param('si',$this->Name, $this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        #header('');
      }		
    }

    public function delete()
	{
		$con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE userjobtitle SET IsDeleted =? ,UpdatedAt = CURRENT_TIMESTAMP() where Id=?"
      );
      $this->IsDeleted=1;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("user deleted");
      }

	}
}
?>