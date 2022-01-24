<?php
include_once("MakeExcel.php");
include_once("MakePdf.php");
class Factory
{
    private $invoice;
    private $invoiced;
    public function __construct($invoice,$invoiced)
    {
        $this->invoice=$invoice;
        $this->invoiced=$invoiced;
    } 
    public function getType($Type)
    {
        if($Type==null)
        {
            return null; 
        }
        if(strcasecmp($Type,"pdf")==0)
        {
            return new Pdf($this->invoice,$this->invoiced);
        }
        else if (strcasecmp($Type,"excel")==0)
        {
            return new Excel($this->invoice,$this->invoiced);
        }
     
    }

}






?>
