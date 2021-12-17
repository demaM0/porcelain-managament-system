<?php
require_once('../../Models/Category-model.php');
require_once('../../Models/SingleTon.php');
    $id = $_POST['Id'];
    $Category = new Category($id);
    $Category->delete();
?>