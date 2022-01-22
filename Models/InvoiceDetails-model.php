<?php
require_once("SingleTon.php");
class InvoiceDetails
{
    public $Id;
    public $ItemId;
    public $Quantity;
    public $Total;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from invoicedetails where Id=$Id";
        $invoicedetailsdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($invoicedetailsdataset))
        {
          $this->Id=$row["Id"];
          $this->ItemId=$row["ItemId"];
          $this->Quantity=$row["Quantity"];
          $this->Total=$row["Total"];
        }
    }

    public static function create($ItemId, $Quantity,$Total)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into invoicedetails (ItemId, Quantity, Total) values ($ItemId, '$Quantity', '$Total')";
      mysqli_query($con,$reg);
      #header('');
    }

   public function update()
    {
      $con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE invoicedetails SET ItemId =? ,InvoiceId =? ,Quantity =? ,Total =? ,UpdatedAt = CURRENT_TIMESTAMP() WHERE Id =?"
      );
      $sql->bind_param('iiiii',$this->ItemId, $this->InvoiceId, $this->Quantity, $this->Total, $this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        #header('');
      }		
    }

	public function delete()
	{
		$con =DbConnection::getInstance();
      $sql = mysqli_prepare($con,
        "UPDATE invoicedetails SET IsDeleted =? ,UpdatedAt = CURRENT_TIMESTAMP() where Id=?"
      );
      $this->IsDeleted=1;
      $sql->bind_param('ii',$this->IsDeleted,$this->Id);
      $bol = $sql->execute();
      if($bol)
      {
        echo("user deleted");
      }

	}
  public static function physicaldelete($Id)
  {
    $con =DbConnection::getInstance();
    if(!$con)
    {
      die('could not connect: ' . mysqli_error($con));
    }
    $reg = "DELETE FROM invoicedetails WHERE Id = $Id";
    mysqli_query($con,$reg);
  }
  public static function selectall()
  {
    $con =DbConnection::getInstance();
    if(!$con)
    {
      die('could not connect: ' . mysqli_error($con));
    }
    $query = "SELECT * FROM invoicedetails ";
    $result = mysqli_query($con, $query);
    return $result;
}
}
?>