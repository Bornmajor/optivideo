<?php
include('functions.php');
if (isset($_POST['video_url'])) {
    $video_id = $_POST['video_id'];
    $externalVideoUrl = $_POST['video_url'];

    if(isset($_POST['video_id'])){
        $video_id = $_POST['video_id'];
    }else{
        $video_id = 10000;
    }

$remote_address = $_SERVER['REMOTE_ADDR'];
     
$query = "INSERT INTO opti_video_analytics(analytic_type,ip_address,video_id)VALUES('downloads','$remote_address',$video_id)";
$create_analytic = mysqli_query($connection,$query);
checkQuery($create_analytic);

    // Redirect the user to the external URL for download
     // Set headers for download
     header('Content-Type: application/octet-stream');
     header('Content-Disposition: attachment; filename="video.mp4"');
 
     // Read the file and output it to the browser
     readfile($externalVideoUrl);
     exit;
} else {
    echo 'Error: Download button not clicked.';
}
?>
