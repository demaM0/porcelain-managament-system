<?php
require_once("Context.php");
require_once("StateInterface.php");
class Done extends State
{
    public function transaction()
    {
        echo("State : Done"."\n");
    }
}




?>