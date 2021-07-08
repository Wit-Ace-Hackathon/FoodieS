<?php
//development server 
//$servername = "localhost:3307";
//$username = "root";
//$password = "" ;
//$database = "foodwebsite";


//production server

$servername = "remotemysql.com";
$username = "6tuOj3AD92";
$password = "Itgspbw6uY" ;
$database = "6tuOj3AD92";
$conn = mysqli_connect($servername,$username,$password,$database);
//if($conn) {
//    echo "Connected";
//}
?>