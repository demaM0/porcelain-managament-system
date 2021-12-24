<?php
require_once('SingleTon.php');
class user
{
	public $Id;
	public $Name;
	public $Phone;
	public $Email;
	public $Password;
	public $IsDeleted;

  //public $JobTitleId;

    public function __construct($id)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
		  $s = "select * from user where Id  = $id ";
		  $result = mysqli_query($con,$s);
		  $num = mysqli_num_rows($result);
		  if($num == 1 && $row = mysqli_fetch_assoc($result)){
			  $this->Id = $id;
			  $this->Name = $row["Name"];
			  $this->Phone = $row["Phone"];
			  $this->Email = $row["Email"];
			  $this->Password = $row["Password"];
		  }
	}
  
	public function login(){
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
		$s = "select * from user where Id  = '$this->Id' && Password = '$this->Password'";
		$result = mysqli_query($con,$s);
		$num = mysqli_num_rows($result);
		if($num==1){
    return "success_login";
 		}
		else{
		return "error_login";
		}  

	}
  public static function assignjobtitle($JobTitleId){
    $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      } 
      //$query = "SELECT Max(Id) FROM users";
      $query = mysqli_insert_id($con);
      $reg = "insert into userjobtitle ( UserId, JobTitleId ) values ($query,$JobTitleId);";
      echo($query);
      echo($JobTitleId);
      var_dump(mysqli_query($con,$reg));
      
}


	public static function create($Name, $Phone, $Email,$Password)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into user (Name, Phone, Email, Password) values ('$Name', '$Phone', '$Email', '$Password')";
      mysqli_query($con,$reg);
      #header('');
    }

   public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE user SET Name =? ,Phone =? ,Email =? ,Password =? ,UpdatedAt = CURRENT_TIMESTAMP() WHERE Id =?"
      );
      $sql->bind_param('sissi',$this->Name, $this->Phone, $this->Email, $this->Password, $this->Id);
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
        "UPDATE user SET IsDeleted =? ,UpdatedAt = CURRENT_TIMESTAMP() where Id=?"
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