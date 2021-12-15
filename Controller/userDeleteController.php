<?php
require_once('..\Models\usermodel.php');
    $id = $_POST['id'];
    $user = new user($id);
    $user->userdelete();
?>