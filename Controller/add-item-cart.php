<?php 
require_once('../Models/item-model.php');
session_start();
$item = new Items($_POST["id"]);
if(isset($_POST["add_to_cart"]) && $_POST["quantity"]<= $item->Quantity && $_POST["quantity"] >0)
{
   
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_POST["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_POST["id"],
				'item_name'			=>	$_POST["name"],
				'item_price'		=>	$_POST["price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
			//echo '<script>window.location="shoppingcart.php"</script>';
		}
		else
		{
		
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
		
			if($_SESSION["shopping_cart"][$keys]['item_id'] == $_POST["id"] && $item->Quantity >= $_SESSION["shopping_cart"][$keys]['item_quantity'] + $_POST["quantity"] )
			{
				$_SESSION["shopping_cart"][$keys]['item_quantity'] += $_POST["quantity"];
			}
            else
            {
                echo '<script>alert("Not enough stock")</script>';
            }
					//echo '<script>window.location="shoppingcart.php"</script>';
				
			}
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_POST["id"],
			'item_name'			=>	$_POST["name"],
			'item_price'		=>	$_POST["price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}

	
	echo '<script>window.location="../Views/shoppingcart.php"</script>';

	
}
else{
    echo '<script>alert("Not enough stock")</script>';
    echo '<script>window.location="../Views/shoppingcart.php"</script>';
   
}


?>