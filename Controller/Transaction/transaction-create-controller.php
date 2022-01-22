
<?php
	require_once('../../Models/transaction-model.php');
	require_once('../../Models/SingleTon.php');
	require_once('../../Models/installment-model.php');
	require_once('../../Models/transaction-installment-model.php');
	require_once('../../Decorator/InterestFacade.php');
	$FullPrice = $_POST['fullprice'];
	$SupplierId = $_POST['supplierid'];
	$ManagerId = $_POST['managerid'];
	$Installments = $_POST['Installments'];
	$Interest = $_POST['interest'];

	if(isset($_POST["other"]))
	{
		$PriceWithInterest = new InterestFacade($FullPrice,$Interest);
		
		$EachInstallment = $PriceWithInterest->display() / $Installments;
		$check = transaction::create($PriceWithInterest->display(),$SupplierId,$ManagerId);

	if($check>=1)
	{
		$result = transaction::selectall();
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_array($result))
			{
				$IdSelect = $row["Id"];
			}
		}
		for ($x = 0; $x < $Installments; $x++) {
		
				installment::create($EachInstallment);
				$result = installment::selectall();
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
						$IdSelect2 = $row["Id"];
					}
				}  
				transactioninstallment::create($IdSelect2,$IdSelect) ;  
			}
	}
	else
	{
		echo("Wrong Supplier or Manager ID");
	}

	
	}
	// no installments
	else
	{
		transaction::create($FullPrice,$SupplierId,$ManagerId);
	}
	
	
	
	
	
?>