<?php
abstract class UserType {

  protected $Id;
  protected $nameType;

  function __construct($id)
  {
      $con = mysqli_connect("localhost","root","","elmasrya");
      if(!$con)
      {
        die('could not connect: ' . mysqli_error());
      }
      $sql="select * from UserType where id=$Id";
      $UserTypedataset = mysqli_query($con,$sql);
      if($row = mysqli_fetch_array($UserTypedataset))
      {
        $this->Id=$row["Id"];
        $this->Name=$row["Name"];
      }
  }
  abstract public function setnameType(string $nameType)
  {
    $this->username = $username;
  }
}
?>