<?php
abstract class usertype {

  protected $Id;
  protected $Name;

  function __construct($Id)
  {
      $con = mysqli_connect("localhost","root","","almasrya");
      if(!$con)
      {
        die('could not connect: ' . mysqli_error());
      }
      $sql="select * from usertype where Id=$Id";
      $UserTypedataset = mysqli_query($con,$sql);
      if($row = mysqli_fetch_array($UserTypedataset))
      {
        $this->Id=$row["Id"];
        $this->Name=$row["Name"];
      }
  }
  abstract public function setName(string $Name)
  {
    $this->Name = $Name;
  }

  abstract public function getName()
  {
    return $this->Name;
  }
  abstract public function getId()
  {
    return $this->Id;
  }
}
?>