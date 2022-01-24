<?php
require_once('command.php');
class undoDeleteCommand implements command{

    private Receiver $receiver;
    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute(){
        
        $this->receiver->invoicerevert();
    }
}
?>