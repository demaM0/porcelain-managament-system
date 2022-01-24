<!DOCTYPE html>

<html>
	<head>
		<title>Invoice List View</title>
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
                require_once('../Models/invoice-model.php');
                $invoicearray = invoice::selectallforview();
				if(count($invoicearray)>0)
				{

					for($i=0;$i<count($invoicearray);$i++)
					{
                        
                        
						
		
						
				?>
				
	
			<div class="col-md-4">
				
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						
                    <h4 class="text-danger">Invoice Id: <?php echo $invoicearray[$i]->Id; ?></h4>
						<h4 class="text-info">Customer Id: <?php echo $invoicearray[$i]->CustomerId; ?></h4>
                        <h4 class="text-info">Total: <?php echo $invoicearray[$i]->Total; ?></h4>

					</div>
				
			</div>
			<?php
                        }	
					}
				
			?>
			
			
		</div>
	    <br />
	</body>
</html>
