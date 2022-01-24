<?php 
require_once('../Models/SingleTon.php'); 
require_once('../Controller/installment-handle-controller.php');

      $con =DbConnection::getInstance();
    if(!$con)
    {
        die('could not connect: ' . mysqli_error($con));
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Installment Handling</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<br />
			<br />
			<br />
			<br /><br />
			<?php

				if (!is_numeric($_POST['transid']))
				{
					echo '<script>alert("Enter a number")</script>';
					echo '<script>window.location="../Views/Transaction-id-input.html"</script>';
				}
				$TEST = new InstallmentHandleController($_POST['transid']);
				if(count($TEST->returner)>0)
				{

					for($i=0;$i<count($TEST->returner);$i++)
					{


						
		
						
				?>
				
	
			<div class="col-md-4">
				<form method="post" action="../Controller/installment-pay-controller.php">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">

						<h4 class="text-info">Installment Id: <?php echo $TEST->returner[$i]->Id; ?></h4>

						<h4 class="text-danger">Installment Quantity: $<?php echo $TEST->returner[$i]->Quantity; ?></h4>
						


						<input type="hidden" name="Id" value="<?php echo $TEST->returner[$i]->Id; ?>" />

						<input type="hidden" name="Quantity" value="<?php echo $TEST->returner[$i]->Quantity; ?>" />
						<input type="hidden" name="CreatedAt" value="<?php echo $TEST->returner[$i]->CreatedAt; ?>" />
						<?php
						if($TEST->returner[$i]->IsPaid==0)
						{
						?>
						<h4 class="text-info">Installment Issue Date: <?php echo $TEST->returner[$i]->CreatedAt; ?></h4>
						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Pay Installment" />
						<?php
						}
						if($TEST->returner[$i]->IsPaid==1)
						{
						?>
						<h4 class="text-info">Installment Pay Date: <?php echo $TEST->returner[$i]->UpdatedAt; ?></h4>
							<input type="button" onclick ="myFunction()" name="add_to_cart" style="margin-top:5px;" class="btn btn-danger" value="Installment already paid" />

						<?php
						}
						?>
						<script>
						function myFunction() {
							alert("Installment already paid");
						}
						</script>
					</div>
				</form>
			</div>
			<?php
		
						
					
				}
			}
			?>

			
		</div>
	</div>
	</body>
</html>
