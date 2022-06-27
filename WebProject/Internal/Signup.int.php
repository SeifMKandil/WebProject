<?php
if(isset($_POST['Sign-up']))
{
 

   $FirstName=$_POST['Fname'];
   $LastName=$_POST['Lname'];
   $UserEmail=$_POST['Email'];
   $UserKind=$_POST['Learner'];
   $Password=$_POST['Password'];
   $PasswordCon=$_POST['PassConfirm'];

   require_once 'dbConn.int.php';
   require_once 'Functions.int.php';

  if(emptySignupInput($FirstName,$LastName,$UserEmail,$Password,$PasswordCon) !==false)
  {
    header("location: ../Signup.php?error=emptyinput");
    exit();
  }

  if(passwordCheck($Password,$PasswordCon) !==false)
  {
    header("location: ../Signup.php?error=passworddontmatch");
    exit();
  }

  if(emailExists($conn,$UserEmail) !==false)
  {
    header("location: ../Signup.php?error=Emailalreadyexists");
    exit();
  }
   


  createUser($conn,$FirstName,$LastName,$UserKind,$UserEmail,$Password);

  



  

  
}
else 
{
header("location: ../Signup.php");
exit();
}


  

   


