<?php
require_once('..\Model\usermodel.php');
$id = $_POST['id'];
$user = new user($id);
$Name = $_POST['name'];
$Phone = $_POST['phone'];
$Email = $_POST['email'];
$Password = $_POST['password'];
$user->userupdate();

?>
