<?php
require_once('../Models/Category-Model.php');
require_once('../Models/SingleTon.php');

$Name = $_POST['Name'];
$ParentId = $_POST['ParentId'];
Category::createCategory($Name, $ParentId)


?>