<?php
include_once("FileMaker.php");
class Pdf implements Maker
{
    private $invoice;
    private $invoiced;
    public function __construct($invoice,$invoiced)
    {
        $this->invoice=$invoice;
        $this->invoiced=$invoiced;
        //var_dump($this->invoiced);
    }
    public function print($filename)
    {
          
        
         //echo"we reached";
         echo"InvoiceTotal:".$this->invoice->Total."\n";
         echo"Item:".$this->invoiced->ItemId."\n"."Q:".$this->invoiced->Quantity."\n"."Total:".$this->invoiced->Total."\n";
    }
    public function makeexcel($filename)
    {
        
     //donth;
        
    }

}

?>