<?php
	require_once('../../Models/SingleTon.php');
	require_once('../../Models/Invoice-model.php');
    require_once('../../Models/InvoiceDetails-model.php');
	require_once('../../Models/invoice-invoicedetails-model.php');

    $con =DbConnection::getInstance();
    if(!$con)
    {
        die('could not connect: ' . mysqli_error($con));
    }
class Receiver
{
    private $log=[];
    public function getLog(): array
    {
        return $this->log;
    }
    //functions
    public function invoiceCreate()
    {
        $CustomerId=$_POST['id'];
        $Total = $_POST['total'];
        return $check = Invoice::create($Total,$CustomerId);
    }
    public function invoiceCheckCreate($check)
    {
        if($check==1)
        {
            $result = invoice::selectall();
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $IdDelete = $row["Id"];
                }
            }
        
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                    $Id = $values["item_id"];
                    $Price = $values["item_price"];
                    $Quant = $values["item_quantity"];
                    $Tot = $Price*$Quant;
                    InvoiceDetails::create($Id,$Quant,$Tot);
                    $result = InvoiceDetails::selectall();
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                            $IdDelete2 = $row["Id"];
                        }
                    }  
                    invoiceinvoicedetailsmodel::create($IdDelete,$IdDelete2) ;  
            }
        
            
            $_SESSION["shopping_cart"]=array();
        }
        else
        {
            echo("Wrong Customer ID");
        }
    }
    public function invoicedelete()
    {
        $Id = $_POST['Id'];
        $Invoice = new invoice($Id);
        $Invoice->delete();
    }
    public function invoicerevert()
    {
        $Id = $_POST['Id'];
        $Invoice = new invoice($Id);
        $Invoice->undelete();
    }
}
?>