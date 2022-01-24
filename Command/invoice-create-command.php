<?php
require_once('command.php');
class createCommand implements command{

    private  $receiver;
    public function __construct( $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute(){
        
       $check= $this->receiver->invoiceCreate();
        $this->receiver->invoiceCheckCreate($check);
    }
}
?>