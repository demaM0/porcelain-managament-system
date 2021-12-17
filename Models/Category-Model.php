<?php
require_once("SingleTon.php");
class Category{
    public $Id;
    public $Name;
    public $ParentId;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from category where Id=$Id";
        $ItemTypedataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($ItemTypedataset))
        {
          $this->Id=$row["Id"];
          $this->Name=$row["Name"];
          $this->ParentId=$row["ParentId"];
        }
    }
    public static function createCategory($Name, $ParentId)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }

      $reg = "insert into category (Name, ParentId) values ('$Name', $ParentId)";
      mysqli_query($con,$reg);
      #header('');
    }

   public function updateCategory()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE category SET Name =?, ParentId=?  ,UpdatedAt = CURRENT_TIMESTAMP() WHERE Id =?"
      );
      $sql->bind_param('sii',$this->Name, $this->ParentId, $this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        #header('');
      }		
    }

	public function deleteCategory()
	{
		$con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE category SET IsDeleted =? ,UpdatedAt = CURRENT_TIMESTAMP() where Id=?"
      );
      $this->IsDeleted=1;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("category deleted");
      }

	}

}




?>