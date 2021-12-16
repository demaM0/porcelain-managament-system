<?php
require_once('../Models/usermodel.php');
require_once('../Models/SingleTon.php');

$Name = $_POST['Name'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
user::createuser($Name, $Phone, $Email,$Password)

?>