
<?php
	require_once('../Models/installment-model.php');
    $Id = $_POST['Id'];
    $Installment = new installment($Id);
    $Installment->IsPaid =1;
    $Installment->update();
    echo '<script>alert("Installment paid")</script>';
    echo '<script>window.location="../Views/Transaction-id-input.html"</script>';

	


    
?>