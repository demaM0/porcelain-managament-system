<?php
include_once("Invoice.php");

class discount extends invoice{
    protected $ref;
    protected $discount;
    public function __construct($ref)
    {
        $this->ref=$ref;
    }
    public function getref()
    {
        return $this-> ref;
    }
    public function discount($discount)
    {
        $this->discount=$discount;
    }
    public function upgradeInvoice()
    {
        return $this->ref.upgradeInvoice()-($this->discount * $this->ref.upgradeInvoice());
    }
}
?>
