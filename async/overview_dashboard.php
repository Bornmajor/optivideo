<?php
include('functions.php');

?>

<div class="stats-item">
   <span>Uploads</span> 
   
   (<?php 
   $usr_id = $_SESSION['usr_id'];
   $query = "SELECT * FROM videos WHERE usr_id = $usr_id";
   $select_videos = mysqli_query($connection,$query);
   checkQuery($select_videos);
   echo mysqli_num_rows($select_videos);
   ?>)  
</div>
<br>
<div class="stats-item">Engagements (
  <?php
    $query = "SELECT * FROM opti_video_analytics WHERE analytic_type = 'plays' AND  usr_id = $usr_id";
     $select_engagements = mysqli_query($connection,$query);
     checkQuery($select_engagements);
   if(mysqli_num_rows($select_engagements) !== 0){

     echo mysqli_num_rows($select_engagements)/100 .'%';
   }else{
     echo "0%";
   }
  ?>)</div>

<div class="stats-item">Latency rate(
 <?php
 
   $query = "SELECT * FROM opti_video_analytics WHERE analytic_type = 'buffers' AND usr_id = $usr_id";
   $select_buffers = mysqli_query($connection,$query);
   checkQuery($select_buffers);
 if(mysqli_num_rows($select_buffers) !== 0){

   echo mysqli_num_rows($select_buffers)/100 .'%';
 }else{
   echo "0%";
 }
 ?>)</div>
<div class="stats-item">Views (
<?php
  $query = "SELECT * FROM opti_video_analytics WHERE analytic_type = 'views' AND usr_id = $usr_id";
    $select_views = mysqli_query($connection,$query);
    checkQuery($select_views); 
  if(mysqli_num_rows($select_views) !== 0){

    echo mysqli_num_rows($select_views);
  }else{
    echo "0";
  }

?>)
</div>
<br>
<div class="stats-item">Downloads (
<?php
  $query = "SELECT * FROM opti_video_analytics WHERE analytic_type = 'downloads' AND usr_id = $usr_id";
    $select_downloads = mysqli_query($connection,$query);
    checkQuery($select_downloads );
  if(mysqli_num_rows($select_downloads) !== 0){

    echo mysqli_num_rows($select_downloads);
  }else{
    echo "0";
  }
?>
)</div>
<div class="stats-item">Shares (
<?php
   $query = "SELECT * FROM opti_video_analytics WHERE analytic_type = 'shares' AND usr_id = $usr_id";
    $select_shares = mysqli_query($connection,$query);
    checkQuery($select_shares);
  if(mysqli_num_rows($select_shares) !== 0){

    echo mysqli_num_rows($select_shares);
  }else{
    echo "0";
  }
?>
)</div>