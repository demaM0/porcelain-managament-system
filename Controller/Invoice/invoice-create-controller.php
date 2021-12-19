<?php
	require_once('../../Models/SingleTon.php');
	require_once('../../Models/Invoice-model.php');
    require_once('../../Models/InvoiceDetails-model.php');
	require_once('../../Models/invoice-invoicedetails-model.php');
    session_start();
	$con =DbConnection::getInstance();
    if(!$con)
    {
        die('could not connect: ' . mysqli_error($con));
    }

  	$CustomerId=$_POST['id'];
	$Total = $_POST['total'];
    $check = Invoice::create($Total,$CustomerId);
	if($check==1)
	{
		$query = "SELECT * FROM invoice";
		$result = mysqli_query($con, $query);
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
				$query = "SELECT * FROM invoicedetails";
				$result = mysqli_query($con, $query);
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

 


?>