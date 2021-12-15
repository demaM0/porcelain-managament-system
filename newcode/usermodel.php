<?php
require_once('Models\SingleTon.php');
class user
{
	public $Id;
	public $Name;
	public $Phone;
	public $Email;
	public $Password;
	public $IsDeleted;

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
		header('location:viewcreate.html');
		#change to login menu ^^^
		}
		else{
		echo"Wrong username or password";
		}  

	}

	public static function createuser($Name, $Phone, $Email,$Password)
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

   public function userupdate()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE user SET Name =? ,Phone =? ,Email =? ,Password =? 
        WHERE Id =?"
      );
      $sql->bind_param('sissi',$this->Name, $this->Phone, $this->Email, $this->Password, $this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        #header('');
      }		
    }

	public function userdelete()
	{
		$con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE user SET IsDeleted =? where Id=?"
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