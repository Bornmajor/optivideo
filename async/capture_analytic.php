<?php
include('functions.php');



$analytic_type = $_POST['analytic_type'];
$video_id = $_POST['video_id'];
$remote_address = $_SERVER['REMOTE_ADDR'];

//get user id
$usr_id = getUserIdFromVideoId($video_id);


$query = "INSERT INTO opti_video_analytics(analytic_type,ip_address,video_id,usr_id)VALUES('$analytic_type','$remote_address',$video_id,$usr_id)";
$create_analytic = mysqli_query($connection,$query);
checkQuery($create_analytic);

?>