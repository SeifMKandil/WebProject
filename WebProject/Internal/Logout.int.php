<?php

session_start();
unset($_SESSION["userId"]);
unset($_SESSION["userEm"]);   
unset($_SESSION["userKind"]);         
unset($_SESSION["userFn"]);   
unset($_SESSION["userLn"]);   

header("location: ../index.php");
exit();