<?php
require_once('../../Models/user-model.php');
require_once('../../Models/SingleTon.php');

$Name = $_POST['Name'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];
$Password = sha1($_POST['Password']);

$JobTitleId = $_POST['JobTitleId'];
$con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
	$s = "select * from jobtitle where Id  = '$JobTitleId' ";
	$result = mysqli_query($con,$s);
	$num = mysqli_num_rows($result);

	if($num==1){
		user::create($Name, $Phone, $Email,$Password);
        user::assignjobtitle($JobTitleId);
		echo '<script>alert("User created")</script>';
		echo '<script>window.location="../../Views"</script>';
	}
	else{
	echo"this job title doesnt exist";
	} 


?>