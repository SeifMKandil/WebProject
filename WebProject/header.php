<?php
session_start();

?>
<link rel = "stylesheet" href = "Css/style.css" >


  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>    

-->

<div class ="navbar" >

            <div class ="icon">
                <h2 class ="logo">ProRoz</h2> 
                <form method="POST" action="action.php">
                    <input type="submit" name="sumbitSearch" value="Search">
</form>
                </div>
                <div class ="menu">
                    <ul>
                        
                   
                         <div id="result"></div>
                        <li><a href="index.php">Home</a></li>
                        <li><a href='Courses.php'>Courses</a></li>;

                        
                         

                        <?php

                        if(isset($_SESSION['userId']))
                        {

                           echo "<li><a href='Profile.php'>ProfilePage</a></li>";
                           echo "<li><a href='cart.php'>Cart</a></li>";
                           echo "<li><a href='Wishlist.php'>WishList</a></li>";
                           echo "<li><a href='Internal\Logout.int.php'>Logout</a></li>";
                          
                        }
                        else
                        {
                       echo  "<li><a href='Login.php'>Login</a></li>";
                       echo  "<li><a href='Signup.php'>Register</a></li>";
                       
                        }
                       
                        

                        ?>
                         
                    </ul>
                  
                </div>

               
              
                
          
          
               

                   
                    
                        
                    
                
                </div>
                            
            </div>