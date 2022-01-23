<?php
require_once('real-subject.php');
require_once('proxy.php');
$usertobedel = $_POST['Id'];
$realsubject = new RealSubject();
$proxy = new Proxy($realsubject);
$proxy->ExecuteQuery($usertobedel);