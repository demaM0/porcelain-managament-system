
<?php
	require_once('../../Models/item-model.php');
	require_once('../../Models/SingleTon.php');
	$Name = $_POST['name'];
	$Color = $_POST['color'];
	$Price = $_POST['price'];
	$Quantity = $_POST['quantity'];
	$SupplierId = $_POST['SupplierId'];
	$image = basename($_FILES["fileToUpload"]["name"]);
	Items::create($Name,$Color,$Quantity,$Price,$SupplierId,$image);
	Items::itemsupplier($SupplierId);
	
	$directory = "../../Views/images/";
	$FinalFile = $directory . basename($_FILES["fileToUpload"]["name"]);
	$uploadflag = 1;
	$imageFileType = strtolower(pathinfo($FinalFile,PATHINFO_EXTENSION));
	
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadflag = 1;
	  } else {
		echo "File is not an image.";
		$uploadflag = 0;
	  }
	}
	
	if (file_exists($FinalFile)) {
	  echo "Sorry, file already exists.";
	  $uploadflag = 0;
	}

	if ($_FILES["fileToUpload"]["size"] > 500000) {
	  echo "Sorry, your file is too large.";
	  $uploadflag = 0;
	}
	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadflag = 0;
	}
	
	if ($uploadflag == 0) 
	{
	  echo "Sorry, your file was not uploaded.";
	} 
	else 
	{
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $FinalFile)) 
	  {
		echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	  } 
	  else 
	  {
		echo "Sorry, there was an error uploading your file.";
	  }
	}

    
?>