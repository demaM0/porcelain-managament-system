<?php
require_once('../Models/usermodel.php');   
require_once('../Models/SingleTon.php');
$id = $_POST['Id'];
$user = new user($id);
$user->Name = $_POST['Name'];
$user->Phone = $_POST['Phone'];
$user->Email = $_POST['Email'];
$user->Password = $_POST['Password'];
$user->userupdate();

?>
