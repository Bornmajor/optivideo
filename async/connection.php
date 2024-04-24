<?php
$connection = mysqli_connect("localhost","root","","optivideo");
if ($connection == false){
    die("Db connection failed".mysqli_connect_error($connection));
}
ob_start(); 
if(session_status() !== PHP_SESSION_ACTIVE){
     session_start();
}


?>