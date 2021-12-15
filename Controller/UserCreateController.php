<?php
require_once("..\Models\SingleTon.php");
require_once("..\newcode\usermodel.php");

$Name = $_POST['name'];
$Phone = $_POST['phone'];
$Email = $_POST['email'];
$Password = $_POST['password'];
user::createuser($Name, $Phone, $Email,$Password)

?>