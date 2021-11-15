<?php
require_once("SingleTon.php");

 class usertype {

  protected $Id;
  protected $Name;

  function __construct($Id)
  {
    $con =DbConnection::getInstance();
    if(!$con)
    {
      die('could not connect: ' . mysqli_error($con));
    }
      $sql="select * from usertype where Id=$Id";
      $UserTypedataset = mysqli_query($con,$sql);
      if($row = mysqli_fetch_array($UserTypedataset))
      {
        $this->Id=$row["Id"];
        $this->Name=$row["Name"];
      }
  }
   public function setName(string $Name)
  {
    $this->Name = $Name;
  }

   public function getName()
  {
    return $this->Name;
  }
   public function getId()
  {
    return $this->Id;
  }
}
?>