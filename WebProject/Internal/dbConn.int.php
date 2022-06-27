<?php

$serverName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="webproject";

$conn=mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

if(!$conn)
{
    throw new Exception("Check The Connection");
}