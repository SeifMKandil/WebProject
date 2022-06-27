<?php 

  session_start();

  require_once 'Internal\dbConn.int.php';
  require_once 'Internal\Functions.int.php';

  
  if(isset($_SESSION['userId'])) 
  {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Profile - Student Information System</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

  < <link rel = "stylesheet" href = "Css/bootstrap.min.css" >

<link rel = "stylesheet" href = "Css/main.css" >

    
</head>
<body>

  <?php include_once 'header.php'; ?>

  
  <section>




  
    <div class="container">
      <strong class="title">My Profile</strong>
    </div>
    
    
    <div class="profile-box box-left">

      <?php
                  

             
      


        $query = "SELECT * FROM users WHERE userEm = '".$_SESSION['userEm']."'";

        

        if($result = mysqli_query($conn, $query))
         {

          $row = mysqli_fetch_assoc($result);

          
          echo "<div class='info'><strong>Student Name:</strong> <span>".$row['userLn'].", ".$row['userFn']."</span></div>";
          echo "<div class='info'><strong>Email:</strong> <span>".$row['userEm']."</span></div>";
          

         // $query_date = "SELECT DATE_FORMAT(date_joined, '%m/%d/%Y') FROM users WHERE userId = '".$_SESSION['userId']."'";
          //$result = mysqli_query($conn, $query_date);

          //$row = mysqli_fetch_row($result);

          //cho "<div class='info'><strong>Date Joined:</strong> <span>".$row[0]."</span></div>";

        } else {

          die("Error with the query in the database");

        }
       
      ?>
      
      <Form method='POST' >
      <a href="editprofile.php"><button type="Button" name="update">UpdateProfile</button></a>
      <button type="submit" name="changePass">Change Password</button>
      <input type="text" name='upload'>
      <div class="col-md-3 col-sm-6 my-3 my-md-0"> 
            
                  <div class="card shadow">
                      <div>

                      </div>
                     
                         
                          
                          
                      </div>
                  </div>
      
      
      </Form>
      
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
  
</body>
</html>

<?php


  } else {
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($conn);

?>
