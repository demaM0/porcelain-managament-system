<?php
include_once("Target.php");
class MakeFile implements Target
{
    public $target;
    private $invoice;
    private $invoiced;
    public function __construct($Invoice,$invoiced)
    {
        $this->invoiced=$invoiced;
        $this->invoice=$Invoice;
    }
    public function request($filetype,$filename)
    {
        
        if(strcasecmp($filetype,"excel")==0||(strcasecmp($filetype,"pdf")==0))
        {
            $this->target=new Adapter($filetype,$this->invoice,$this->invoiced);
            $this->target->request($filetype,$filename);
        }
        else
        {
            echo"invalid FileType";
        }
    }

}


?>