<?php 

  session_start();

  require_once 'Internal\dbConn.int.php';
  require_once 'Internal\Functions.int.php';
  require_once 'Photo.php';
  ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">
<?php

  if(isset($_POST['Submitedit']))
   {

    $fname = $_POST['userFirst'];
    $lname = $_POST['userLast'];
    $Image=$_POST['image'];
   

    $query = "UPDATE users SET userFn = '$fname', userLn = '$lname', profile_image='$Image'
    WHERE userEm='".$_SESSION['userEm']."'";

    if($result = mysqli_query($conn, $query)) 
    {

      $_SESSION['prompt'] = "Profile Updated";
      header("location:profile.php");
      exit;

    } else {

      die("Error with the query");

    }

  }

  if(isset($_SESSION['userEm']))
   {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Edit Profile - Student Information System</title>
  <link rel = "stylesheet" href = "Css/bootstrap.min.css" >

<link rel = "stylesheet" href = "Css/main.css" >
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

  <?php include_once 'header.php'; ?>

  <section>
    
    <div class="container">
      <strong class="title">Edit Profile</strong>
    </div>
    

    <div class="edit-form box-left clearfix">
      <form  method="POST">

       
          
          <?php 
            $query = "SELECT userEm FROM users WHERE userEm = '".$_SESSION['userEm']."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_row($result);

            echo "<p>".$row[0]."</p>";
          ?>

        </div>


        <div class="form-group">
          <label for="userFn">First Name</label>
          <input type="text" class="form-control" name="userFirst" placeholder="First Name" required>

        
                    
        </div>


        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" name="userLast" placeholder="Last Name" required>
         <input type="file" name="image" >
        </div>


    

        </div>
        
        <div class="form-footer">
          <a href="Profile.php">Go back</a>
          
          <input class="btn btn-primary" type="submit" name="Submitedit" value="Submit">
          <br>
          
          <div class="col-md-2 col-sm-6 my-7 my-md-1 col-md-offset-6">
         
              
              <div class="card shadow\">
                  <div>
                  <img src="Images/<?php   echo $Image['profile_image']?> "alt="..." class="img-rounded">
                  </div>
    </div>
        
        

      </form>
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>

<?php 

  } else {
    header("location:Login.php");
  }

  mysqli_close($conn);

?>



</form>