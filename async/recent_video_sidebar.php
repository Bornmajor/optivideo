<?php
include('functions.php');

$usr_id = $_SESSION['usr_id'];
$query = "SELECT * FROM videos WHERE usr_id = $usr_id  ORDER BY video_id DESC LIMIT 3";
$select_recents_videos = mysqli_query($connection,$query);
checkQuery($select_recents_videos);
if(mysqli_num_rows($select_recents_videos)){
    while($row = mysqli_fetch_assoc($select_recents_videos)){
    $video_id =  $row['video_id'];
    $video_title = $row['video_title'];
    ?>

<li class="nav-item">
    <a class="nav-link" href="?page=video_item&video_id=<?php echo $video_id ?>">
   <div class="truncate" style="font-size:14px;"><i class="fab fa-youtube"></i> <?php echo $video_title ?></div></a>
</li>
    <?php
    }
}
?>