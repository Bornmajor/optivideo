<?php
include('functions.php');

//  use Cloudinary\Cloudinary;
//   $cloudinary = new Cloudinary([
//       'cloud_name' => 'dx8t5kvns',
//       'api_key' => '882463312224961',
//       'api_secret' => 'PQ_hYp8kQkpv2-j653EJBWKcyZQ',
//     ]); 

$usr_id = $_SESSION['usr_id'];


$query = "SELECT * FROM videos WHERE usr_id = '$usr_id' ";
$select_users_videos = mysqli_query($connection,$query);
checkQuery($select_users_videos);

if(mysqli_num_rows($select_users_videos) !== 0){
    while($row = mysqli_fetch_assoc($select_users_videos)){
    $video_id = $row['video_id'];
    $video_title = $row['video_title'];
    $thumbnail_id = $row['thumbnail_id'];
    


    // $result = $cloudinary->searchApi()
    // ->expression("resource_type:image AND public_id=$thumbnail_id")
    // ->sortBy('public_id','desc')
    // ->maxResults(1)
    // ->execute();

    // // Access the secure_url value from the result
    // $secureUrl = $result['resources'][0]['secure_url'];

    // Output the secure_url value
    // echo $secureUrl;

     
  


   
?>
  <div class="card dashboard-video-card" video_id=<?php echo $video_id ?> >
  <!-- <button type="button" class="btn btn-secondary dropdown-toggle" ></button> -->
   <span class="dropup" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></span>
  
  <ul class="dropdown-menu">
    <!-- Dropdown menu links -->
    <li><a class="dropdown-item" href="?page=video_item&video_id=<?php echo $video_id; ?>">Expand</a></li>
    <li><a video-id="<?php echo $video_id ?>" class="dropdown-item delete_video_item" >Delete</a></li>
  </ul>
  <a class="card-links" href="?page=video_item&video_id=<?php echo $video_id; ?>">
    <img src="https://res.cloudinary.com/dx8t5kvns/image/upload/<?php echo $thumbnail_id; ?>.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text text-truncate"><?php echo $video_title; ?></p>
       


    </div>
    </a>
    </div>

 

<?php
 }
}else{
?>
<div class="d-flex align-items-center justify-content-center flex-column">
  <img src="assets/images/no_video_1.png" width="600px;" alt="">
    <span class="my-2">You have no videos</span>
    <a  class="btn btn-secondary my-3"  data-bs-toggle="modal" data-bs-target="#uploadModal">Upload a video</a>
</div>
<?php

}


?>
<script>
    $(".delete_video_item").click(function(){
     let video_id = $(this).attr("video-id");
     var confirmation = confirm("Are you sure you want to proceed?");
        if(confirmation){
            // Proceed with your script here

            $.post("async/delete_video.php",{video_id:video_id},function(data){
              if(!data.error){
              
              getUserVideosAssets();
              loadRecentVideoSideBar();  
              }
              
            })

        
        }
  });
  function getUserVideosAssets(){
   
   $.ajax({
           url: "async/users_video_assets.php",
           type:"POST",
           success:function(data){
           if(!data.error){
           $('.load_users_video_assets').html(data);       

           }
             
           }
         });  
    }
    
  function loadRecentVideoSideBar(){
    $.ajax({
            url: "async/recent_video_sidebar.php",
            type:"POST",
            success:function(data){
            if(!data.error){
            $('.load_video_side_links').html(data);       

            }
              
            }
          });  
  }
</script>