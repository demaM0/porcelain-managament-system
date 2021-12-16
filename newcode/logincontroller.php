
<?php
require_once('../Models/usermodel.php');
	$id = $_POST['id'];
	$login = new user($id);
	$login->Id = $_POST['id'];
	$login->Password = $_POST['pass'];
	$login->login();

?>