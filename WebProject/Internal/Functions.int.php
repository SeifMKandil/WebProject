<?php
//Function to Check whether all inputs are not empty
function emptySignupInput($FirstName,$Lastname,$UserEmail,$Password,$PasswordCon)
{
    $Bug;
    if(empty($FirstName) || empty($Lastname) || empty($UserEmail) || empty($Password) || empty($PasswordCon))
    {
        $Bug=TRUE;
    }
    else
    {
    $Bug=FALSE;
    }
    return $Bug;
}

//Function to Check whether the Email given by the user is in a correct form

/*function invalidEmail($UserEmail)
{
    $Bug;
  if(!filter_var($UserEmail,FILTER_VALIDATE_EMAIL)
  {
    $Bug=true;
  }
  else
  {
    $Bug=FALSE;
  }
  return $Bug;
}*/

//Function to Check whether the password and the password confirmation are the same

function passwordCheck($Password,$PasswordCon)
{
  $Bug;
  if($Password !== $PasswordCon)
  {
     $Bug=True;
  }
  else
  {
      $Bug=FALSE;
  }
  return $Bug;
}

// Function to Check whether the Email given by the user already exist
function emailExists($conn,$UserEmail)
{
   $sql="SELECT * FROM users WHERE userEm= ?;";
   $stmt=mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql))
   {
    throw new Exception("Check The Connection");
    header("location: ../Signup.php?error=stmtfailed");
    exit();
   }
   mysqli_stmt_bind_param($stmt,"s",$UserEmail);
   mysqli_stmt_execute($stmt);

   $resultData=mysqli_stmt_get_result($stmt);

   if($row=mysqli_fetch_assoc($resultData))
   {
    return $row;
   }
   else 
   {
       $result=false;
       return $result;
   }
    mysqli_stmt_close();
}

function createUser($conn,$FirstName,$Lastname,$UserKind,$UserEmail,$Password)
{
  $sql="INSERT INTO users (userFn,userLn,userEm,userKind,userPassword) VALUES (?,?,?,?,?);";
  $stmt=mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql))
  {
    throw new Exeption("Stmt Failed");
    header("location: ../Signup.php?error=stmtfailed");
    exit();
  }
  try
  {
    
  $hashedPass=password_hash($Password,PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt,"sssss",$FirstName,$Lastname,$UserEmail,$UserKind,$hashedPass);
  mysqli_stmt_execute($stmt);

  mysqli_stmt_close($stmt);

  header("location: ../Login.php?error=noerror");
  exit();

  }
  catch (Exeption $e){
    echo 'Message: '.$e->getMessage();
  }
}

function emptyLoginInput($userEmail,$userPassword)
{
    $Bug;
    if(empty($userEmail) || empty($userPassword))
    {
        $Bug=TRUE;
    }
    else
    {
    $Bug=FALSE;
    }
    return $Bug;
}
function loginUser($conn,$UserEmail,$userPassword)
{

  $userExist=emailExists($conn,$UserEmail);

  if($userExist ===false)
  {
    header("location: ../Login.php?error=InvalidLogin");
    exit();
  }

  $pwdHashed= $userExist["userPassword"];
  $checkpwd= password_verify($userPassword, $pwdHashed);

  if($checkpwd === false)
  {
    header("location: ../Login.php?error=WrongPass");
    exit();
  }
  else if ($checkpwd === true)
  {
    session_start();
    $_SESSION["userId"] = $userExist["userId"];
    $_SESSION["userEm"] =$userExist["userEm"];
    $_SESSION["userKind"] =$userExist["userKind"];
    $_SESSION["userFn"] =$userExist["userFn"];
    $_SESSION["userLn"] =$userExist["userLn"];

    if(isset($_SESSION['userKind']))
    {
        if($_SESSION['userKind']=="Admin")
        {
          header("location: ../Admin/admin.html");
        }else
        {
          header("location: ../index.php");
        }

    }
  

  }

}
function component($productname, $productprice, $productimg, $productid){
  $element = "
  
  <div class=\"col-md-3 col-sm-6 my-3 my-md-0\"> 
              <form action=\"Courses.php\" method=\"POST\">
                  <div class=\"card shadow\">
                      <div>
                          <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                      </div>
                      <div class=\"card-body\">
                          <h5 class=\"card-title\">$productname</h5>
                          <h6>
                              <i class=\"fas fa-star\"></i>
                              <i class=\"fas fa-star\"></i>
                              <i class=\"fas fa-star\"></i>
                              <i class=\"far fa-star\"></i>
                              <i class=\"far fa-star\"></i>
                          </h6>
                         
                          <h5>
                              <small><s class=\"text-secondary\">$519</s></small>
                              <span class=\"price\">$$productprice</span>
                          </h5>
                          <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"Buy\"> Buy <i class=\"fas fa-shopping-cart\"></i></button>
                          <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"SaveForLater\"> Save For Later <i class=\"fas fa-shopping-cart\"></i></button>
                           <input type='hidden' name='product_id' value='$productid'>
                      </div>
                  </div>
              </form>
          </div>
  ";
  echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid,$offerby){
  $element = "
  
  <form action=\"Cart.php?action=remove&id=$productid\" method=\"Post\" class=\"cart-items\">
                  <div class=\"border rounded\">
                      <div class=\"row bg-white\">
                          <div class=\"col-md-3 pl-0\">
                              <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                          </div>
                          <div class=\"col-md-6\">
                              <h5 class=\"pt-2\">$productname</h5>
                              <small class=\"text-secondary\">$offerby</small>
                              <h5 class=\"pt-2\">$$productprice</h5>
                              
                              <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                          </div>
                          



                          <div class=\"col-md-3 py-5\">
                              <div>
                                 
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
  
  ";
  echo  $element;
}

function WishElement($productimg, $productname, $productprice, $productid,$offerby){
  $element = "
  
  <form action=\"Wishlist.php?action=removeItem&id=$productid\" method=\"Post\" class=\"cart-items\">
                  <div class=\"border rounded\">
                      <div class=\"row bg-white\">
                          <div class=\"col-md-3 pl-0\">
                              <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                          </div>
                          <div class=\"col-md-6\">
                              <h5 class=\"pt-2\">$productname</h5>
                              <small class=\"text-secondary\">$offerby</small>
                              <h5 class=\"pt-2\">$$productprice</h5>
                              
                              <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"removeItem\">Remove</button>

                              </div>

                          
                              <div>
                                  <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                  <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                  <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>         
  
  ";
  echo  $element;
}
function addData($conn,$productname, $productprice, $productid,$userId,$BuyerFname,$BuyerLname)
{
   $sql="INSERT INTO orders (Product_Id,Product_Name,Product_Price,U_ID,Buyer_FName,Buyer_LName)
   VALUES ('$productid','$productname','$productprice','$userId','$BuyerFname','$BuyerLname')";
   $result = $conn->query($sql);



}
