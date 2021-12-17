<?php
require_once('../../Models/user-model.php');
require_once('../../Models/SingleTon.php');
    $id = $_POST['Id'];
    $user = new user($id);
    $user->delete();
?>