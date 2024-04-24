<?php
include("functions.php");

if(isset($_POST['mail'])){

$mail = escapeString($_POST['mail']);
$video_id = escapeString($_POST['video_id']);
//CHECK if email exist

$query = "SELECT * FROM opti_users WHERE mail = '$mail'";
$check_mail = mysqli_query($connection,$query);
checkQuery($check_mail);
if(mysqli_num_rows($check_mail) !== 0){
while($row = mysqli_fetch_assoc($check_mail)){
$usr_id = $row['usr_id'];
}
$query = "INSERT INTO access_list(video_id,usr_id)VALUES($video_id,$usr_id)";   
$insert_user_acl = mysqli_query($connection,$query);

}else{
    failMsg("Email unavailable");
}



}

?>