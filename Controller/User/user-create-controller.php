<?php
require_once('../../Models/user-model.php');
require_once('../../Models/SingleTon.php');

$Name = $_POST['Name'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];
$Password = sha1($_POST['Password']);
user::create($Name, $Phone, $Email,$Password)

?>