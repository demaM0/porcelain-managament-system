<?php 
require_once('../Models/SingleTon.php');
require_once('../Models/InvoiceDetails-model.php');
session_start();
      $con =DbConnection::getInstance();
    if(!$con)
    {
        die('could not connect: ' . mysqli_error($con));
    }
	
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["name"],
				'item_price'		=>	$_POST["price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
			$Id			=	$_GET["id"];
			$Price		=	$_POST["price"];
			$Quant		=	$_POST["quantity"];
			$Total = $Price*$Quant;
			InvoiceDetails::create($Id,$Quant,$Total);
			echo '<script>window.location="shoppingcart.php"</script>';
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["name"],
			'item_price'		=>	$_POST["price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
		$Id	= $_GET["id"];
		$Price = $_POST["price"];
		$Quant = $_POST["quantity"];
		$Total = $Price*$Quant;
		InvoiceDetails::create($Id,$Quant,$Total);
		echo '<script>window.location="shoppingcart.php"</script>';
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		$query = "SELECT * FROM invoicedetails ";
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
			if($values["item_id"] == $_GET["id"])
			{
				InvoiceDetails::physicaldelete($IdDelete);
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>window.location="shoppingcart.php"</script>';
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart</title>
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
				$query = "SELECT * FROM items ";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
						if($row["IsDeleted"]==0)
						{
		
						
				?>
				
	
			<div class="col-md-4">
				<form method="post" action="shoppingcart.php?action=add&id=<?php echo $row["Id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img src="images/<?php echo $row["Image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["Name"]; ?></h4>

						<h4 class="text-danger">$<?php echo $row["Price"]; ?></h4>

						<input type="number" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="name" value="<?php echo $row["Name"]; ?>" />

						<input type="hidden" name="price" value="<?php echo $row["Price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
						}
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="shoppingcart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
				<form action="invoice-create-controller.php" method="POST">
						<input type="submit" name="buy" style="margin-top:5px;" class="btn btn-success" value="Buy" />			
				</form>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>

<?php
?>