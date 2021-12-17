<?php
require_once('../../Models/userjobtitle-model.php');
require_once('../../Models/SingleTon.php');
$id = $_POST['Id'];
$userjobtitle = new userjobtitle($id);
$userjobtitle->Name = $_POST['Name'];
$userjobtitle->update();

?>
