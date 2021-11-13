<?php
class invoice
{
    protected $id;
    protected $itemID;
    protected $itemName;
    protected $itemQuantity;
    protected $itemPrice;
    protected $date;
    protected $time;
    public function Calculate()
    {

    }
    
    public function __construct()
    {

    }
    public function getID()
    {
        return $this->id;
    }
    public function setItemID(int $itemID)
    {
        $this->itemID = $itemID;
    }
    public function getItemID()
    {
        return $this->itemID;
    }
    public function setItemName(string $itemName)
    {
        $this->itemName = $itemName;
    }
    public function getItemName()
    {
        return $this->itemName;
    }
    public function setItemQuantity(int $itemQuantity)
    {
        $this->itemQuantity = $itemQuantity;
    }
    public function getItemQuantity()
    {
        return $this->itemQuantity;
    }
    public function setItemPrice(int $itemPrice)
    {
        $this->itemPrice = $itemPrice;
    }
    public function getItemPrice()
    {
        return $this->itemPrice;
    }
    public function getDate()
    {
        return $this->date;
        
    }
    public function getTime()
    {
        return $this->time;
    }
}
?>
