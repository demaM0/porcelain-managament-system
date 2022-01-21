<?php
require_once('command.php');
class deleteCommand implements command{

    private Receiver $receiver;
    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute(){
        //steps needed for revert
        $this->receiver->invoicedelete();
    }
}
?>