<?php
	require_once('../../Models/SingleTon.php');
	require_once('../../Models/Invoice-model.php');
    require_once('../../Models/InvoiceDetails-model.php');
	require_once('../../Models/invoice-invoicedetails-model.php');
    require_once('../../Models/Invoice-model.php');
    require_once('../../Models/item-model.php');

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
        $holderarray = array();
        if($check==1)
        {
            $result = invoice::selectall();
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $IdDelete = $row;
                }
            }
        
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                    $Id = $values["item_id"];
                    $Price = $values["item_price"];
                    $Quant = $values["item_quantity"];
                   
                    array_push($holderarray,$Id);
                    array_push($holderarray,$Quant);
                    $Tot = $Price*$Quant;
                    InvoiceDetails::create($Id,$Quant,$Tot);
                    $result = InvoiceDetails::selectall();
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                            $IdDelete2 = $row;
                        }
                    }  
                    invoiceinvoicedetailsmodel::create($IdDelete["Id"],$IdDelete2["Id"]) ;  
            }
        
            
            $_SESSION["shopping_cart"]=array();
            return $holderarray;
            echo '<script>alert("Purchase completed")</script>';
            //echo '<script>window.location="../../Views/shoppingcart.php"</script>';
        }
        else
        {
            echo '<script>alert("Wrong customer ID")</script>';
            echo '<script>window.location="../../Views/shoppingcart.php"</script>';
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
    public function MinusQuantFromDb($holderarray)
    {
        $item = new Items($holderarray[0]);

     for($i=0;$i<count($holderarray);$i++)
     {
        
         if($i%2==0)
         {
            $item = new Items($holderarray[$i]);
         }
         else
         {
            // echo($item->Quantity);
            // exit (0);
            $item->Quantity = $item->Quantity - $holderarray[$i];
      
            $item->update();
         }

       //$item = new Items(((int)$keys["item_id"]));
       
       //$item->Quantity = $item->Quantity - ((int)$keys["item_quantity"]);
       //$item->update();
     }
 
    }
 
    

}
?>