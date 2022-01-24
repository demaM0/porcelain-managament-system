<?php 
require_once("StateInterface.php");
require_once("TransactionDoesNotExist.php");

class context 
{
    private $state;

    public function __construct(State $state)
    {
        $this->transitionTo($state);
    }
    public function transitionTo(State $state): void
    {
        $this->state = $state;
        $this->state->setContext($this);
    }
    public function request()
    {
        $this->state->transaction();
    }
}


?>