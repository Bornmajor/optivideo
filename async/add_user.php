<?php
include('functions.php');

$mail= $_POST['mail'];
$mail = escapeString($mail);

$query = "SELECT mail FROM opti_users WHERE mail = '$mail'";
$select_user = mysqli_query($connection,$query);
checkQuery($select_user);
if(mysqli_num_rows($select_user) !== 0){
    //if user has an account
    failMsg('It seems your account already exist'.'<a href="?page=login" class="alert-link"> login instead</a>');
    return false;
}


//else no account register user

//send verification token to email and database
$send_token = generateVerificationCode(6);
//send email


$query = "INSERT INTO opti_users(mail,code_token)VALUES('$mail','$send_token')";
$create_user = mysqli_query($connection,$query);
checkQuery($create_user);
if($create_user){
include('../includes/verify_token_form.php');    
}



?>
