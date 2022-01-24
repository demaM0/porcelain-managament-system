<?php
include_once("Target.php");
include_once("Factory.php");
    class Adapter implements Target
    {
        public $file;
        private $invoice;
        private $invoiced;
        public function __construct($filetype,$invoice,$invoiced)
        {
            $this->invoiced=$invoiced;
            $this->invoice=$invoice;
            $Factory=new Factory($this->invoice,$this->invoiced);
            $this->file=$Factory->getType($filetype);
        }
        public function request($filetype,$filename)
        {
            $this->file->print($filename);
        }

    }

?>