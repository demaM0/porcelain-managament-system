<?php
include_once("FileMaker.php");
class Excel implements Maker
{
    private $invoice;
    private $invoiced;
    public function __construct($invoice,$invoiced)
    {
        $this->invoice=$invoice;
        $this->invoiced=$invoiced;
        //var_dump($this->invoiced);
    }
    
    public function makepdf($filename)
    {
        //donth;
        
    }
    public function makeexcel($filename)
    {
        
        $myfile = fopen($filename, "a+") or die("Unable to open file!");
        $txt ="InvoiceId:".$this->invoice->Id."\n"."InvoiceTotal:".$this->invoice->Total."\n"."Item:".$this->invoiced->ItemId."\n"."Q:".$this->invoiced->Quantity."\n"."Total:".$this->invoiced->Total."\n";
        fwrite($myfile, $txt);
        fclose($myfile);  
        
         //echo"we reached";
         echo"InvoiceTotal:".$this->invoice->Total."\n";
         echo"Item:".$this->invoiced->ItemId."\n"."Q:".$this->invoiced->Quantity."\n"."Total:".$this->invoiced->Total."\n";
       
    }

}

?>