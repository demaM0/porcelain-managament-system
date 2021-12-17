<?php
require_once('../Models/usermodel.php');
require_once('../Models/SingleTon.php'); 
    $id = $_POST['Id'];
    $user = new user($id);
    $user->userdelete();
?>