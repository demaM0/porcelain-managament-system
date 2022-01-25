<?php
require_once("../Models/SingleTon.php");

class Optionretrieval{
    public function Retrieveoptions($paymentid)
    {
        
        $con = DbConnection::getInstance();
        if (!$con) {
            die('could not connect: ' . mysqli_error($con));
        }
        //get name of option,type of option,and id of option
        $sql = "select o.Name as OptionField,v.Name as Type,o.Id as OptionId from options o inner join paymentmethodoptions p on o.Id = p.OptionId inner join valuetype v on v.Id = o.TypeId where p.PaymentId = $paymentid ";
        $result = mysqli_query($con, $sql);
        //putting the results in an array
        $num = mysqli_num_rows($result);
        $optionsarray = array();
        if($num>0)
        {
            while($row = mysqli_fetch_array($result))
            {
                
                    $option = $row;
                    array_push($optionsarray,$option);
              
            }
        }
        
        
        return $optionsarray;
        
    }
}
?>
