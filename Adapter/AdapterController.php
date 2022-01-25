<?php

    require_once('../Models/Invoice-invoicedetails-model.php');
    require_once('../Models/Invoice-model.php');
    require_once('../Models/InvoiceDetails-model.php');      
	require_once('../Models/SingleTon.php');
    require_once('MakePdf.php');
    require_once('MakeExcel.php');
    include_once("Target.php");
    include_once("FileMaker.php");
    include_once("Adapter.php");
    include_once("MakePdf.php");
    include_once("MakeExcel.php");
    include_once("MakeFile.php");   
	$Id = $_POST['Id'];
	$Invoice = new Invoice($Id);
    $FileType=$_POST['type'];
    $FileName=$_POST['FileName'];
    
    $Inv=invoiceinvoicedetailsmodel::Invoice($Id);
    if(count($Inv)>0)
    {
        for($i=0;$i<count($Inv);$i++)
        {
            
            $InvoiceD=new InvoiceDetails($Inv[$i]);
            $x=new MakeFile($Invoice,$InvoiceD);
            $x->request($FileType,$FileName);
            
        }
    }
    
    
    
    

    
?>