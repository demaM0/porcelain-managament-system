<?php
include_once("../Models/singleton.php");
header('Content-Type: application/json');
class Url{
    public $Fname;
    public $url;
    function __construct($a,$b)
    {  
       $this->Fname = $a;
       $this->url = $b;       
    }
}
$results = array();
$id = $_GET['user_id'];
$con = DbConnection::getInstance();
        if (!$con) {
            die('could not connect: ' . mysqli_error($con));
        }
        
$sql= "select FriendlyName,Url from urls 
inner join permissions on permissions.UrlId = urls.Id
inner join userjobtitle on userjobtitle.JobTitleId = permissions.JobTitleId
where  userjobtitle.UserId  = $id ";

$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
    $array = array();
    while($row = mysqli_fetch_array($result)){
  

        $button = new Url($row["FriendlyName"],$row["Url"]);
        array_push($array,$button);
        

}
$results['result'] = $array;
} else
$results['error'] = "no results";

$json=json_encode($results);
echo($json);
