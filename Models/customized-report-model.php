<?php 

class customizedreport  {

    public $Id;
    public $UserId;
    public $SqlStatements;
    public $UpdatedAt;
    public $CreatedAt;
    public $IsDeleted;
    
    public function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $s="select * from customizedreport where Id=$Id";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($row = mysqli_fetch_array($result))
        {
          $this->Id=$row["Id"];
          $this->UserId=$row["UserId"];
          $this->SqlStatements=$row["SqlStatements"];
          $this->UpdatedAt=$row["ZipCode"];

          $this->CreatedAt=$row["CreatedAt"];
          $this->IsDeleted=$row["IsDeleted"];
          
        }
    }
    public static function customizedreport($s)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
            die('could not connect: ' . mysqli_error($con));
        }
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        $invoiceIdArray=array();
        if($num>0)
        {
          while($row=mysqli_fetch_array($result))
          {
            if($row["IsDeleted"]==0)
            {
              $invoiceloop=$row;
              array_push($invoiceIdArray,$invoiceloop);
            }
          }
          return  $invoiceIdArray;
        }

    }

    public static function AddReportToDB($ReporterId,$s)
    {
     
        $con =DbConnection::getInstance();
        if(!$con)
        {
            die('could not connect: ' . mysqli_error($con));
        }
        $sql = mysqli_prepare($con,
        "insert into customizedreport(UserId, SqlStatements) values ($ReporterId, ?)"
        );
        $sql->bind_param('s',$s);
        $bol = $sql->execute();
   

        var_dump($bol);
        

    }
}


?>