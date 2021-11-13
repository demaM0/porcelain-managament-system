<?php
class items(){
   protected $ID;
   protected $Name;
   protected $Color;
   protected $Quantity;
   protected $Type;
   protected $Price;
   protected $SupplierID;
   public function __construct($ID)
   {
    $con = mysqli_connect("localhost","root","","almasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
        }
        $sql="select * from items where ID=$ID";
        $itemsdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($itemsdataset))
        {
          $this->ID=$row["ID"];
          $this->Name=$row["Name"];
          $this->Color=$row["Color"];
          $this->Quantity=$row["Quantity"];
          $this->Type=$row["Type"];
          $this->Price=$row["Price"];
          $this->SupplierID=$row["SupplierID"];
        }
   }    
    
    public function setName($name)
    {
        $this->Name=$name;
    }
    
    public function setColor($color)
    {
        $this->Color=$color;
    }

    public function setQuantity($quantity)
    {
        $this->Quantity=$quantity;
    }

    public function setPrice($price)
    {
        $this->Price=$price;
    }

    public function setSupplierID($SupplierID)
    {
        $this->SupplierID=$SupplierID;
    }

    public function getID()
    {
        return $this->ID;
    }
    public function getName()
    {
        return $this->Name;
    }
    public function getColor()
    {
        return $this->Color;
    }
    public function getQuantity()
    {
        return $this->Quantity;
    }
    public function getPrice()
    {
        return $this->Price;
    }
    public function getSupplierID()
    {
        return $this->SupplierID;
    }


}

?>
