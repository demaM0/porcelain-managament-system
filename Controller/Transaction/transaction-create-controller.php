
<?php
	session_start();
	require_once('../../Models/transaction-model.php');
	require_once('../../Models/SingleTon.php');
	require_once('../../Models/installment-model.php');
	require_once('../../Models/transaction-installment-model.php');
	require_once('../../Decorator/InterestFacade.php');
	$FullPrice = $_POST['fullprice'];
	$SupplierId = $_POST['supplierid'];
	$ManagerId = $_SESSION["CurrentId"];
	$Installments = $_POST['Installments'];
	$Interest = $_POST['interest'];
	$check=0;
	$test=0;

	if(isset($_POST["other"]))
	{
		$PriceWithInterest = new InterestFacade($FullPrice,$Interest);
		
		$EachInstallment = $PriceWithInterest->display() / $Installments;
		$check = transaction::create($PriceWithInterest->display(),$SupplierId,$ManagerId);

	if($check==1)
	{
		$result = transaction::selectall();
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_array($result))
			{
				$IdSelect = $row;
			}
		}
		for ($x = 0; $x < $Installments; $x++) 
		{
		
				installment::create($EachInstallment);
				$result = installment::selectall();
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
						$IdSelect2 = $row;
					}
				}  
				transactioninstallment::create($IdSelect2["Id"],$IdSelect["Id"]) ;  
		}

	}

	
	}
	// no installments
	else
	{
		$test = transaction::create($FullPrice,$SupplierId,$ManagerId);

	}
	if($test==1 || $check==1)
	{
		echo '<script>alert("Transaction created")</script>';
		echo '<script>window.location="../../Views/Transaction/Transaction-create-view.html"</script>';
		
		
	}
	else
	{
		echo '<script>alert("Transaction failed")</script>';
		echo '<script>window.location="../../Views/Transaction/Transaction-create-view.html"</script>';
		
		
	}
	
	
	
	
	
?>