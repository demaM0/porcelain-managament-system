<?php
require_once('../../Models/userjobtitle-model.php');
require_once('../../Models/SingleTon.php');

$Name = $_POST['Name'];
userjobtitle::create($Name)
?>