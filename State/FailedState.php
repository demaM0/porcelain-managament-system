<?php
require_once("Context.php");
require_once("StateInterface.php");
class FailedState extends State
{
    public function transaction()
    {
        echo("State : Transaction Does Not Exist"."\n");
        
    }
}



?>