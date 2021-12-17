<?php
require_once("SingleTon.php");
class InvoiceDetails
{
    protected $Id;
    protected $ItemId;
    protected $InvoiceId;
    protected $Quantity;
    protected $Total;
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
          $this->ItemID=$row["ItemID"];
          $this->InvoiceID=$row["InvoiceID"];
          $this->Quantity=$row["Quantity"];
          $this->Total=$row["Total"];
        }
    }

    public static function create($ItemId, $InvoiceId, $Quantity,$Total)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into invoicedetails (ItemId, InvoiceId, Quantity, Total) values ($ItemId, $InvoiceId, '$Quantity', '$Total')";
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
}
?>