<?php
session_start();
require_once 'Internal/dbConn.int.php';
require_once 'Internal/Functions.int.php';


if(isset($_POST['Checkout']))
{
   
    $product_id= array_column($_SESSION['cart'], 'product_id');

    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result))
    {
       foreach($product_id as $id)
       {
          if ($row['Course_Id'] == $id)
          {
            addData($conn,$row['Course_Name'],$row['Course_Price'],$row['Course_Id'],$_SESSION['userId'],$_SESSION['userFn'],$_SESSION['userLn']);
                                 
          }
       }
    }
     

 
   }