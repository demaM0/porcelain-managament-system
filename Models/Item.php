<?php
class item(){
   protected $ID;
   protected $Name;
   protected $Color;
   protected $Quantity;
   protected $Type;
   protected $Price;
   protected $SupplierID;
   public function __construct()
   {

   }    
    
    public function setName($name)
    {
        $this->name=$name;
    }
    
    public function setColor($color)
    {
        $this->color=$color;
    }

    public function setQuantity($quantity)
    {
        $this->quantity=$quantity;
    }

    public function setPrice($price)
    {
        $this->price=$price;
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
    public function setSupplierID()
    {
        return $this->SupplierID;
    }
    public function getItemTypeId()
    {
        return $this->ItemTypeId;
    }

}

?>
