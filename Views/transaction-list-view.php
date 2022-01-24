<!DOCTYPE html>

<html>
	<head>
		<title>Transaction List View</title>
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
            require_once('../Models/transaction-model.php');
                $transactionsarray = transaction::selectallforview();
				if(count($transactionsarray)>0)
				{

					for($i=0;$i<count($transactionsarray);$i++)
					{
                        
                        if($transactionsarray[$i]->IsDeleted==0)
                        {
						
		
						
				?>
				
	
			<div class="col-md-4">
				
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						
                    <h4 class="text-danger">Transaction Id: <?php echo $transactionsarray[$i]->Id; ?></h4>
						<h4 class="text-info">Full Price: $<?php echo $transactionsarray[$i]->FullPrice; ?></h4>
						<h4 class="text-info">Supplier Id: <?php echo $transactionsarray[$i]->SupplierId; ?></h4>
                        <h4 class="text-info">Manager Id: <?php echo $transactionsarray[$i]->ManagerId; ?></h4>

					</div>
				
			</div>
			<?php
                        }	
					}
				}
			?>
			
			
		</div>
	    <br />
	</body>
</html>
