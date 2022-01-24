<!DOCTYPE html>
<html>
	<?php  
	require_once('../../Models/SingleTon.php');
	require_once('../../Controller/SupplierController.php');
	require_once('../../Models/supplier-model.php')
	?>
	<head>
		<title>Supplier Select</title>
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

	
				$TEST = new SupplierController();
				if(count($TEST->returner)>0)
				{

					for($i=0;$i<count($TEST->returner);$i++)
					{
						
		
						
				?>
				
	
			<div class="col-md-4">
				<form method="post" action="shoppingcart.php?action=add&id=<?php echo $TEST->returner[$i]->Id; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						
						<h4 class="text-info"><?php echo $TEST->returner[$i]->Name; ?></h4>
 
						<h4 class="text-info"><?php echo $TEST->returner[$i]->Phone; ?></h4>

						<h4 class="text-danger"><?php echo $TEST->returner[$i]->Email; ?></h4>

						<input type="hidden" name="name" value="<?php echo $TEST->returner[$i]->Name; ?>" />

						<input type="hidden" name="phone" value="<?php echo $TEST->returner[$i]->Phone; ?>" />

						

					</div>
				</form>
			</div>
			<?php
						
					}
				}
			?>
			
	</body>
</html>