<?php include("includes/header.php"); ?>
<?php

if(!isset($_GET['video_id'])){
header('?page=home');
return false;
}
$video_id = $_GET['video_id'];

$query = "SELECT * FROM videos WHERE video_id = $video_id";
$select_video = mysqli_query($connection,$query);
checkQuery($select_video);
while($row = mysqli_fetch_assoc($select_video)){
$video_title = $row['video_title'];
$thumbnail_id = $row['thumbnail_id'];
$public_id = $row['public_id'];
$usr_id = $row['usr_id'];
$access = $row['access'];

}




?>
<title>   
<?php echo $video_title  ?>
</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>

<div class="center_container">

<div class="specific_video_others">


<div class="specific_video_container">

<div class="container_title_video_player">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
    <li class="breadcrumb-item "><a href="?page=users_videos&user=<?php echo $usr_id; ?>">Clips</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $video_title; ?></li>
  </ol>
</nav>


<h3 class="mb-3"><?php echo $video_title ?></h3>     


<video
id="specific-video-player"
controls
class="cld-video-player cld-video-player-skin-dark"
>
</video>    



</div>

<div class="video_attributes">

<div class="attr_user_profile">

 <span class="attr_profile_icon"><i class="fas fa-user"></i></span>

 <div class="attr_user_details">
    <span class="attr_username">
    <?php echo $_SESSION['mail']; ?> 
    </span>
    <span class="attr_videos_total">
      <?php noOfUserVideos($usr_id); ?> videos    
    </span>
  
 </div>
</div>


 <div class="attr_analytics mx-3">
  <!-- #load analytic-->
 </div>

<div class="attr_analytics_cta">

  <form action="async/download_video_asset.php" method="post">
        <input type="hidden" class="download_url_input" name="video_url"  value="#">
        <input type="hidden" name="video_id" value="<?php echo $video_id; ?>">
        <button class="btn btn-primary download_asset_btn" type="submit" name="download" disabled><i class="fas fa-download"></i></button>
    </form>

 

  <a  class="share-link btn btn-secondary mx-2"> <i class="fas fa-share"></i></a>

</div>


</div>
  
<div>
<?php
$query = "SELECT * FROM videos WHERE video_id <> $video_id ORDER BY RAND()";
$select_users_videos = mysqli_query($connection,$query);
if(mysqli_num_rows($select_users_videos)!== 0){
while($row = mysqli_fetch_assoc($select_users_videos)){
$other_video_id = $row['video_id'];    
$other_video_title = $row['video_title'];
$other_thumbnail_id = $row['thumbnail_id'];

?>
<div class="card dashboard-video-card" video_id=<?php echo $other_video_id  ?> >
<a class="card-links" href="?page=specific_video&video_id=<?php echo $other_video_id ; ?>">
<img src="https://res.cloudinary.com/dx8t5kvns/image/upload/<?php echo $other_thumbnail_id ; ?>.jpg" class="card-img-top" alt="...">
<div class="card-body"> <p class="card-text text-truncate"><?php echo $other_video_title; ?></p>
</div>
</a>
</div>


<?php
}
}
?>
</div>



</div>

<div class="other_users_clips">
<?php
$query = "SELECT * FROM videos WHERE usr_id = $usr_id AND video_id <> $video_id  ORDER BY RAND()";
$select_users_videos = mysqli_query($connection,$query);
if(mysqli_num_rows($select_users_videos)!== 0){
while($row = mysqli_fetch_assoc($select_users_videos)){
$other_video_id = $row['video_id'];    
$other_video_title = $row['video_title'];
$other_thumbnail_id = $row['thumbnail_id'];

?>
<div class="card dashboard-video-card" video_id=<?php echo $other_video_id  ?> >
<a class="card-links" href="?page=specific_video&video_id=<?php echo $other_video_id ; ?>">
<img src="https://res.cloudinary.com/dx8t5kvns/image/upload/<?php echo $other_thumbnail_id ; ?>.jpg" class="card-img-top" alt="...">
<div class="card-body"> <p class="card-text text-truncate"><?php echo $other_video_title; ?></p>
</div>
</a>
</div>


<?php
}
}
?>
</div>


</div>



</div>
<!-- Button trigger modal -->
<button type="button"  class="btn btn-primary"  id="private-modal-btn" data-bs-toggle="modal" data-bs-target="#accessBackdrop">

</button>

<!-- Modal -->
<div class="modal fade" id="accessBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

 
     

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Access restriction</h1>
       
      </div>
      <div class="modal-body">
      <!-- Modal content -->
      <div class="load_access_restriction"></div>
  
     
      </div>
      <div class="modal-footer">
       <!-- <button type="submit" class="btn btn-primary">Proceed</button> -->
       <a href="?page=home" class="btn btn-primary">Close</a>
        <button style="display:none;" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Understood</button>
      </div>


    </div>
  </div>
</div>


<script>
const private_modal = document.getElementById("private-modal-btn");

// Set up click event listener
private_modal.addEventListener("click", function() {
  console.log("Button clicked!");
});

function checkAccessRestriction(){
  let video_id = "<?php echo $video_id; ?>";
  $.ajax({
            url: "async/access_restriction.php",
            type:"POST",
            data:{video_id:video_id},
            success:function(data){
            if(!data.error){
                $(".load_access_restriction").html(data);      
            }
              
            }
          }); 
}

checkAccessRestriction();

function adjustPlayerDimensions(){
var screenWidth = window.innerWidth;    
if (screenWidth <   961) {

}
}

const player = cloudinary.videoPlayer('specific-video-player', {
cloudName: 'dx8t5kvns',
width: '840',//640
height: '460',//360
controls: true,
colors: {
    base: '#f6b417',
    accent: '#e5a309'
},
logoOnclickUrl:'https://res.cloudinary.com/dx8t5kvns/image/upload/v1710524612/y66ifb4hppkzcakrhsnu.png',
logoImageUrl: 'https://res.cloudinary.com/dx8t5kvns/image/upload/v1710524612/y66ifb4hppkzcakrhsnu.png'
});

player.source('<?php echo $public_id ?>', {
poster: 'https://res.cloudinary.com/dx8t5kvns/image/upload/<?php echo $thumbnail_id; ?>.jpg',
sourceTypes: ['dash']
});

let video_id = "<?php echo $video_id ?>";

player.on("error", function(error) {
  let analytic_type = 'error';
  console.error("Video playback error:", error);
  // Handle the error here (e.g., display an error message, retry loading)
  $.post("async/capture_analytic.php",{analytic_type:analytic_type,video_id:video_id},function(data){
    loadPlayerAnalytics();
  });
});


player.on("loadedmetadata", function(event) {
  if (isNaN(player.getDuration())) {
    console.log("Video metadata not yet available, processing might be ongoing.");
    // You can display a message to the user indicating that the video is loading
  } else {
    // Video metadata is available, proceed with playback
  }
});


player.on("play", function(event) {
   console.log("Video playback started!");
   
  let analytic_type = 'plays';
  
  $.post("async/capture_analytic.php",{analytic_type:analytic_type,video_id:video_id},function(data){
    loadPlayerAnalytics();
  });
});

player.on("waiting", function(event) {
  console.log("Video is buffering...");
  let analytic_type = 'buffers';
  $.post("async/capture_analytic.php",{analytic_type:analytic_type,video_id:video_id},function(data){
    loadPlayerAnalytics();
  });
});

function loadAssetDownloadLink(){

  
  let video_public_id = "<?php echo $public_id ?>" ;

  $.post("async/load_video_asset_link.php",{video_public_id:video_public_id},function(data){
    $('.download_url_input').attr("value",data);
    $('.download_asset_btn').attr("disabled",false);
  })  
}
loadAssetDownloadLink();

$('.download-video-link').click(function(e){
  // e.preventDefault();

  let analytic_type = 'downloads';

  $.post("async/capture_analytic.php",{analytic_type:analytic_type,video_id:video_id},function(data){
 
    loadPlayerAnalytics();

  });


});

$('.share-link').click(function(e){
        let video_title = '<?php echo $video_title ?>';

        let analytic_type = 'shares';

        var downloadUrl = $('.download-video-link').attr('href');

        if (navigator.canShare) {
        const shareData = {
            title: video_title,
            text: "Check out this interesting video: "+video_title,
            url: downloadUrl // Replace with your actual link
        };

        navigator.share(shareData)
            .then(() => {

              console.log('Content shared successfully');
              $.post("async/capture_analytic.php",{analytic_type:analytic_type,video_id:video_id},function(data){  
              loadPlayerAnalytics();
              });
            })
            .catch(error => {
            console.error('Sharing failed:', error);
            // Optionally display an error message to the user
            });
        } else {
        console.log("Web Share API not supported");
        // Consider using a fallback sharing method for unsupported browsers
        }

  })

function loadPlayerAnalytics(){
   
    $.ajax({
            url: "async/client_player_video_analytics.php",
            type:"POST",
            data:{video_id:video_id},
            success:function(data){
            if(!data.error){
                $(".attr_analytics").html(data);      
            }
              
            }
          });  
}

loadPlayerAnalytics();

function capturePageImpression(){
    let analytic_type = 'views';
        $.ajax({
        url: "async/capture_analytic.php",
        data:{analytic_type:analytic_type,video_id:video_id},
        type:"POST",
        success:function(data){
        if(!data.error){
            //load player to update
            loadPlayerAnalytics();   
        }
            
        }
        });    
}

capturePageImpression();
</script>