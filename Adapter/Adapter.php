<?php
include_once("Target.php");
    class Adapter implements Target
    {
        public $file;
        private $invoice;
        private $invoiced;
        public function __construct($filetype,$invoice,$invoiced)
        {
            $this->invoiced=$invoiced;
            $this->invoice=$invoice;
            if(strcasecmp($filetype,"pdf")==0 )
            {
                $this->file = new Pdf($this->invoice,$this->invoiced);
            }
            else if(strcasecmp($filetype,"excel")==0)
            {
                $this->file = new Excel($this->invoice,$this->invoiced);
            }
        }
        public function request($filetype,$filename)
        {
            if(strcasecmp($filetype,"pdf")==0 )
            {
                $this->file ->makepdf($filename);
            }
            elseif(strcasecmp($filetype,"excel")==0 )
            {
                $this->file ->makeexcel($filename);
            }
        }

    }

?>