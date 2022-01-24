<?php
require_once("Context.php");
abstract class State
{
    private $state;
    protected $context;
    abstract public function transaction() ;
    public function setContext(Context $context)
    {
        $this->context = $context;
    }
}

?>