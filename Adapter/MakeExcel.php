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
        $date = date('Y-m-d-H-i-s');
        $myfile = fopen("excels/$filename.$date.txt", "w");
        $txt ="InvoiceId:".$this->invoice->Id."\n"."InvoiceTotal:".$this->invoice->Total."\n"."Item:".$this->invoiced->ItemId."\n"."Q:".$this->invoiced->Quantity."\n"."Total:".$this->invoiced->Total."\n";
        fwrite($myfile, $txt);
        fclose($myfile);  
        
         echo"Invoice sent  ";

       
    }

}

?>