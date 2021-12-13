<?php
require_once('Models\SingleTon.php');
class user
{
	public $Id;
	public $Name;
	public $Phone;
	public $Email;
	public $Password;

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
		}
		else{
		echo"Wrong username or password";
		}  

	}
}

?>