<?php
require_once('../../Models/SingleTon.php');
header('Content-Type: application/json');
$aResult = array();
// if( !isset($_GET['Translate']) ) { $aResult['error'] = 'No function name!'; }
    // if( !isset($_GET['lang_code']) ) { $aResult['error'] = 'No function arguments!'; }

   
    
$aResult['result'] = Translate( $_GET['lang_code'],$_GET['trans_key'] );
$json=json_encode($aResult);
//return $json;
echo($json);
function Translate($lang_code, $trans_key)
{
  
  
    $con =DbConnection::getInstance();
    if(!$con)
    {
      die('could not connect: ' . mysqli_error($con));
    }
    // select  id from translation where TranslationName =  $trans_key

    $sql="select word from translationdetails inner join translation on translation.TranslationName = '$trans_key' where translationdetails.LangId = $lang_code ";
    $result = mysqli_query($con,$sql);
    
    if ($result->num_rows > 0) {
        if($row = mysqli_fetch_array($result))
        {
            return $row["word"];
        }else 
        return "row no results";

    }else 
    return "no results";
}





?>