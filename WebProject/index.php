
<?php
require_once 'header.php';
require_once 'Internal/Functions.int.php';
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <title>Webpage Design </title>
     <link rel = "stylesheet" href = "Css/style.css" >

</head>
<body>
    <div class ="main";>
         
            <div class ="content">
            <h1><br><br> <br>the power</br>of knowledge<br></h1>  
            <p class = "par">Learn, Grow, accomplish your goals. Leaders in learning & where <br> students improve. We are more than a class. People teach. </p><br>
                 <?php
                 if(isset($_SESSION['userId']))
                 {
                     ?>
             <button class = "cn"><a href = "Courses.php">Purchase your course now</a></button>
             <?php
                 }
           ?>
             <hr>
             <hr>
             <div class ="content">
                <h1><br><br><br><br>Recognize your <br>value and </br>potential<br></h1>  
                <p class = "par">Stay ahead with guided, 24/7 expert support and tools  <br> customized to each of your courses. </p><br>
                     
                 <button class = "cn"><a href = "#">About Us</a></button>
                </div>
            </div>
            <div class = "image" >
                <img src = "Images/image1.jpg" class = "img1">

                
     
                </div>
               
       
     </div>
    </div>
    
     
</body>
</html>

