
<?php
require_once('../Models/user-model.php');
header('Content-Type: application/json');
$results = array();

$id = $_POST['id'];
$login = new user($id);
$login->Id = $_POST['id'];
$login->Password = sha1($_POST['pass']);
$results['result'] = $login->login();

$json = json_encode($results);
echo ($json);



?>