<?php
session_start();

require_once 'Internal/dbConn.int.php';
require_once 'Internal/Functions.int.php';





if (isset($_POST['remove']))
{
    
   if($_GET['action'] == 'remove')
   {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value["product_id"] == $_GET['id'])
            {
                unset($_SESSION['cart'][$key]);
                
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
   }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

<?php
    require_once ('header.php');
?>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>
<?php

$totalPrice=0;

if(isset($_SESSION['cart']))
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
            cartElement($row['Course_Image'], $row['Course_Name'],$row['Course_Price'], $row['Course_Id'],$row['Course_Offered_By']);
                                    $totalPrice = $totalPrice + (int)$row['Course_Price'];
         }
      }
   }

}


?>

</div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

        <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">

                    <?php
                     if (isset($_SESSION['cart'])){
                        $count  = count($_SESSION['cart']);
                        echo "<h6>Price ($count items)</h6>";
                    }else{
                        echo "<h6>Price (0 items)</h6>";
                    }
                ?>
                <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                        <hr>
                        <hr>
                        <form method = 'POST' action="Checkout.php">
                       
                        <button type="submit" class="btn btn-danger mx-2\" name="Checkout">Checkout</button>
                       
                
                </form>
                       

                    </div>

                    <div class="col-md-6">
                        <h6>$<?php echo $totalPrice; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php
                            echo $totalPrice;
                            ?></h6> 


                    </div>
                    
                    
               
                </div>

            </div>

        </div>

    </div>
    
                


</div>
