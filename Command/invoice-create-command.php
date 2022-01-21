<?php
require_once('command.php');
class createCommand implements command{

    private  $receiver;
    public function __construct( $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute(){
        //steps needed for invoice create
       $check= $this->receiver->invoiceCreate();
        $this->receiver->invoiceCheckCreate($check);
    }
}
?>