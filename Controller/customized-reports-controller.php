<?php
require_once('../Models/SingleTon.php');
require_once('../Models/customized-report-model.php');
session_start();
$beforedate= $_POST['before'];
$afterdate = $_POST['after'];
$minprice = $_POST['minprc'];
$maxprc= $_POST['maxprc'];
$minquant = $_POST['minquant'];
$maxquant = $_POST['maxquant'];
$UserId = $_SESSION["CurrentId"];
$s = "select * from items where ";   
$s = $s . "CreatedAt <= '$beforedate'";
$s = $s . " AND CreatedAt >= '$afterdate'";
$s = $s . " AND Price >= '$minprice'";
$s = $s . " AND Price <= '$maxprc'";
$s = $s . " AND Quantity <= '$maxquant'";
$s = $s . " AND Quantity >= '$minquant'";
$results = 0;
$results = customizedreport::customizedreport($s);
if($results!=0 && count($results)>0)
{
  for($i=0;$i<count($results);$i++)
  {
    $date = date('Y-m-d-H-i-s');
    $myfile = fopen("../Views/Reports/'Report'.$date.txt", "a+");
    $txt = "Item ID: ". $results[$i]["Id"] . "\n". "Name: " . $results[$i]["Name"] ."\n". "Color: " . $results[$i]["Color"] ."\n". "Price:  " . $results[$i]["Price"] ."\n". "Quantity: " . $results[$i]["Quantity"] ."\n";
    fwrite($myfile, $txt);
    fclose($myfile);  
  

  }
  echo '<script>alert("A report was saved!")</script>';
  
}
else
{
  echo '<script>alert("No matches")</script>';
}
customizedreport::AddReportToDB($UserId,$s);
//echo '<script>window.location="../Views/customized-report.php"</script>';

// $con =DbConnection::getInstance();
// if(!$con)
// {
//     die('could not connect: ' . mysqli_error($con));
// }
// $result = mysqli_query($con,$s);
// $num = mysqli_num_rows($result);
// $invoiceIdArray=array();
// if($num>0)
// {
//   while($row=mysqli_fetch_array($result))
//   {
//     if($row["IsDeleted"]==0)
//     {
//       $invoiceloop=$row;
//       array_push($invoiceIdArray,$invoiceloop);

//     }
//   }
// }
?>