<?php
include('functions.php');

$video_id = escapeString($_POST['video_id']);


?>

<div class="analytic_item">
    <span class="attr_analytic_title">Impression</span>
    <span class="attr_analytic_value">
        <?php
        $query_views = "SELECT * FROM opti_video_analytics WHERE video_id = $video_id AND analytic_type = 'views'";
        $video_views = mysqli_query($connection,$query_views);
        checkQuery($video_views);
        echo mysqli_num_rows($video_views);
        ?>
    </span>
 </div>

 <div class="analytic_item">
    <span class="attr_analytic_title">Plays</span>
    <span class="attr_analytic_value">
        <?php
            $query_views = "SELECT * FROM opti_video_analytics WHERE video_id = $video_id AND analytic_type = 'plays'";
            $video_plays = mysqli_query($connection,$query_views);
            checkQuery($video_plays);
            echo mysqli_num_rows($video_plays);
        ?>
    </span>
 </div>

 <div class="analytic_item">
    <span class="attr_analytic_title">Buffers</span>
    <span class="attr_analytic_value">
        <?php
            $query_views = "SELECT * FROM opti_video_analytics WHERE video_id = $video_id AND analytic_type = 'buffers'";
            $video_buffers = mysqli_query($connection,$query_views);
            checkQuery($video_buffers);
            echo mysqli_num_rows($video_buffers);
        ?>
    </span>
 </div>

 <br>
 <div class="analytic_item">
    <span class="attr_analytic_title">Downloads</span>
    <span class="attr_analytic_value">
       <?php
         $query_views = "SELECT * FROM opti_video_analytics WHERE video_id = $video_id AND analytic_type = 'downloads'";
         $video_downloads = mysqli_query($connection,$query_views);
         checkQuery($video_downloads);
         echo mysqli_num_rows($video_downloads);
       ?>
    </span>
 </div>

 <div class="analytic_item">
    <span class="attr_analytic_title">Shares</span>
    <span class="attr_analytic_value">
       <?php
         $query_views = "SELECT * FROM opti_video_analytics WHERE video_id = $video_id AND analytic_type = 'shares'";
         $video_shares = mysqli_query($connection,$query_views);
         checkQuery($video_shares);
         echo mysqli_num_rows($video_shares);
       ?>
    </span>
 </div>