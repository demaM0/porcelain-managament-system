<?php
require_once('command.php');
class invoke{
    private  $Command;
    public function __construct($Command)
    {
        $this->Command=$Command;
    }
    public function run()
    {
        $this->Command->execute();
    }
}
?>