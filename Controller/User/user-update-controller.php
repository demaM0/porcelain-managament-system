<?php
require_once('../../Models/user-model.php');
require_once('../../Models/SingleTon.php');
$id = $_POST['Id'];
$user = new user($id);
$user->Name = $_POST['Name'];
$user->Phone = $_POST['Phone'];
$user->Email = $_POST['Email'];
$user->Password = sha1($_POST['Password']);
$user->update();

?>
