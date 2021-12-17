<?php

session_start();


$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'almasrya');

$Id = $_POST['Id'];
$password = $_POST['password'];
$s = "select * from users where Id = '$Id' && password = '$password'";

$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if($num==1){
	
	
	header('location:Index.html');
}
else{

	echo"Wrong username or password";




}
