<?php include("includes/header.php"); ?>
<?php
if(isset($_GET['user'])){

$usr_id = $_GET['user']; 


}

$query = "SELECT * FROM videos WHERE usr_id = $usr_id";
$select_users_videos = mysqli_query($connection,$query);
checkQuery($select_users_videos);
while($row = mysqli_fetch_assoc($select_users_videos)){
$video_id = $row['video_id'];    
$video_title = $row['video_title'];
$thumbnail_id = $row['thumbnail_id'];
}
?>
<title><?php echo $_SESSION['mail']; ?> videos</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>



<div class="container_users_clips">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Clips</li>
  </ol>
</nav>

<div>
 

<div class="attr_user_profile">

 <span class="attr_profile_icon" style="background-color:#f1f1f1"><i class="fas fa-user"></i></span>

 <div class="attr_user_details my-3">
    <span class="attr_username">
   <?php  echo $_SESSION['mail']; ?> 
    </span>
    <span class="attr_videos_total">
      <?php echo noOfUserVideos($usr_id) ?> videos    
    </span>
  
 </div>
</div>




<?php
$query = "SELECT * FROM videos WHERE usr_id = $usr_id";
$select_users_videos = mysqli_query($connection,$query);
if(mysqli_num_rows($select_users_videos)!== 0){
while($row = mysqli_fetch_assoc($select_users_videos)){
$video_id = $row['video_id'];    
$video_title = $row['video_title'];
$thumbnail_id = $row['thumbnail_id'];

?>
<div class="card dashboard-video-card" video_id=<?php echo $video_id ?> >
<a class="card-links" href="?page=specific_video&video_id=<?php echo $video_id; ?>">
<img src="https://res.cloudinary.com/dx8t5kvns/image/upload/<?php echo $thumbnail_id; ?>.jpg" class="card-img-top" alt="...">
<div class="card-body">
<p class="card-text text-truncate"><?php echo $video_title; ?></p>

</div>
</a>
</div>


<?php
}
}else{
    echo "This user has no video";
}
?>



</div>
</div>

<?php include('components/sign_up_banner.php')?>

<?php include('components/footer_items.php'); ?>
