<?php
class itemtype{
    protected $Id;
    protected $Category;
    protected $Shape;
    function __construct($Id)
    {
        $con = mysqli_connect("localhost","root","","almasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
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
    public function setCategory(string $Category)
    {
        $this->Category = $Category;
    }
    public function getCategory()
    {
        return $this->Category;
    }
    public function setShape(string $Shape)
    {
        $this->Shape = $Shape;
    }
    public function getShape()
    {
        return $this->Shape;
    }

}




?>