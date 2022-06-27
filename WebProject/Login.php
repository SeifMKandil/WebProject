<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trial</title>
     <link rel = "stylesheet" href = "Css/log1.css" >
     <div class="logo">
        <img src="Images/logo.png">
    </div>

</head>

<body> 
    
   
    <div class ="main";>
        <div class="login">

           <h1>LOG-IN </h1>
          
            <form  action="Internal/Login.int.php"  method="POST">
                

             

             <input type="text" name="Email" placeholder="Email">
                <br><br>

               
            <input type="password" name="Password"  placeholder="Password">
                <br>
                <br>

             <a href='ForgetPassword.html'>Forget Password</a>
             <br>
             <br>
             
             <button type="submit" name="Login">Login</button>
            <br><br>
            
              
            

            
            
   
            </form>
           
           </div>
       

    </div>
  
</body>
</html>