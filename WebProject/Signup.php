<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Sign up</title>
     <link rel = "stylesheet" href = "Css/signup1.css" >

  

</head>
<body> 
    <div class ="main">

 

        <div class="signup">



        

            <form action="Internal/Signup.int.php"  method="POST">

                <h1>SIGN-UP </h1>
                 
             <input type="text" name="Fname" placeholder="First name">
                <br><br>

                
            <input type="text" name="Lname"  placeholder="Last name">
                <br>
                <br>

                
                <input type="email" name="Email" placeholder="Enter Email">
                <br>
                <br>

                
                <input type="password" name="Password" placeholder="Password">
                    <br>
                    <br>
                
              
                <input type="password" name="PassConfirm" placeholder="Write your password again">
                <br><br><br>

                <input type="radio" name="Learner" value="Learner">Learner
               
                <input type="radio" name="Learner" value="Tutor">Tutor

                
           <button type="submit" name="Sign-up">Signup</button>
        
   
            </form>
           </div>
       

    </div>
    <?php
if(isset($_GET["error"]))
{
    if($_GET["error"]=="emptyinput")
    {
 echo "<script>alert('EMPTY INPUT...!')</script>";
    }

    if($_GET["error"]=="passworddontmatch")
    {
echo "<p> Passwords dont Match </p>";
    }

    if($_GET["error"]=="Emailalreadyexists")
    {
echo "<p> Choose another Email </p>";
    }
    

}

    ?>
    
</body>
</html>
