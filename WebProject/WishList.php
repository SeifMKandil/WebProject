<?php
session_start();
require_once 'Internal/dbConn.int.php';
require_once 'Internal/Functions.int.php';





if (isset($_POST['removeItem']))
{
   if($_GET['action'] == 'removeItem')
   {
        foreach($_SESSION['save'] as $key => $value)
        {
            if($value["product_id"] == $_GET['id'])
            {
                unset($_SESSION['save'][$key]);
                echo "<script>alert('Product has been Removed From WIshList...!')</script>";
                echo "<script>window.location = 'Wishlist.php'</script>";
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



if(isset($_SESSION['save']))
{
   $product_id= array_column($_SESSION['save'], 'product_id');

   $sql = "SELECT * FROM courses";
   $result = $conn->query($sql);
   while ($row = mysqli_fetch_assoc($result))
   {
      foreach($product_id as $id)
      {
         if ($row['Course_Id'] == $id)
         {
            WishElement($row['Course_Image'], $row['Course_Name'],$row['Course_Price'], $row['Course_Id'],$row['Course_Offered_By']);
                                    
         }
      }
   }

}
else
{
    echo "<h5>Cart is Empty</h5>";
}

?>
