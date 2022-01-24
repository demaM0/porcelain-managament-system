<?php
require_once("SingleTon.php");
class css{
    public $Id;

    public $ThemeHtml;

    public function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $s="select * from themes where Id=$Id";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($row = mysqli_fetch_array($result))
        {
          $this->Id=$row["Id"];
          $this->ThemeHtml=$row["ThemeHtml"];

          
        }
    }


}


?>