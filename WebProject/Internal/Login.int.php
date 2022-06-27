<?php
if(isset($_POST['Login']))
{
  $userEmail=$_POST['Email'];
  $userPassword=$_POST['Password'];

  require_once 'dbConn.int.php';
  require_once 'Functions.int.php';

  if(emptyLoginInput($userEmail,$userPassword) !==false)
  {
     header("location: ../Login.php?error=emptyFeild");
     exit();
  }

  LoginUser($conn,$userEmail,$userPassword);
}
else
{
    header("location: ../Login.php");
    exit();
}