<?php
require_once("SingleTon.php");
class invoice
{
    public $Id;
    public $CustomerId;
    public $Total;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from invoice where Id=$Id";
        $invoicedataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($invoicedataset))
        {
          $this->Id=$row["Id"];
          $this->CustomerId=$row["CustomerId"];
          $this->Total=$row["Total"];
        }
    }
    public static function create($Total,$CustomerId)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into invoice(Total,CustomerId) values ($Total,$CustomerId)";
      $test=mysqli_query($con,$reg);
      if($test)
      {
        return 1;
      }
      
    }
    public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE invoice SET Total =? ,CustomerId=? ,UpdatedAt =CURRENT_TIMESTAMP()
        WHERE Id =?"
      );
      $sql->bind_param('iii',$this->Total,$this->CustomerId,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("update 10/10");
      }
    }
    public function delete()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE invoice SET IsDeleted =? ,UpdatedAt =CURRENT_TIMESTAMP() where Id=?"
      );
      $this->IsDeleted=1;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        header("Location: ../../Views/Invoice/invoice-delete-view.html", true);
        exit();
      }

      
    }
    public function undelete()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE invoice SET IsDeleted =? ,UpdatedAt =CURRENT_TIMESTAMP() where Id=?"
      );
      $this->IsDeleted=0;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        header("Location: ../../Views/Invoice/invoice-delete-view.html", true);
        exit();
      }

      
    }
    public static function selectall()
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $query = "SELECT * FROM invoice ";
      $result = mysqli_query($con, $query);
      return $result;
  }
  public static function selectallforview()
  {
    $con =DbConnection::getInstance();
    if(!$con)
    {
        die('could not connect: ' . mysqli_error($con));
    }
    $query = "SELECT * FROM invoice";
    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);
    $invoicearray = array();
    if($num>0)
    {
        while($row = mysqli_fetch_array($result))
        {
            if($row["IsDeleted"]==0)
            {
                $invoiceloop = new invoice($row["Id"]);
                array_push($invoicearray,$invoiceloop);
            }
        }
    }
    return $invoicearray;
  }
}
?>
