<?php
class item(){
   protected $id;
   protected $name;
   protected $color;
   protected $quantity;
   protected $itemTypeId;
   protected $price;
   public function __construct()
   {}    
    public function getId()
    {
        return $this->id;
    }
    public function setName($name)
    {
        $this->name=$name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setColor($color)
    {
        $this->color=$color;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function setQuantity($quantity)
    {
        $this->quantity=$quantity;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setItemTypeId($itemTypeId)
    {
        $this->itemTypeId=$itemTypeId;
    }
    public function getItemTypeId()
    {
        return $this->ItemTypeId;
    }
    public function setPrice($price)
    {
        $this->price=$price;
    }
    public function getPrice()
    {
        return $this->Price;
    }

}

?>
