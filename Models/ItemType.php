<?php
require_once("SingleTon.php");
class itemtype{
    protected $Id;
    protected $Category;
    protected $Shape;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from itemtype where Id=$Id";
        $ItemTypedataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($ItemTypedataset))
        {
          $this->Id=$row["Id"];
          $this->Category=$row["Category"];
          $this->Shape=$row["Shape"];
        }
    }
    public function getID()
    {
        return $this->Id;
    }
    public function setCategory($Category)
    {
        $this->Category = $Category;
    }
    public function getCategory()
    {
        return $this->Category;
    }
    public function setShape($Shape)
    {
        $this->Shape = $Shape;
    }
    public function getShape()
    {
        return $this->Shape;
    }

}




?>