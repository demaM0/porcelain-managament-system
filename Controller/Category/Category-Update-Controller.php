<?php
require_once('../Models/Category-Model.php');   
require_once('../Models/SingleTon.php');
$id = $_POST['Id'];
$Category = new Category($id);
$Category->Name = $_POST['Name'];
$Category->ParentId = $_POST['ParentId'];
$Category->updateCategory();

?>
