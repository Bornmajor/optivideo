<?php include("includes/header.php"); ?>
<title>Your videos</title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cloudinary/1.0.30/cloudinary.min.js"></script>

</head>
<?php include('includes/sidebar.php') ;?>
<?php
if(!isset($_SESSION['usr_id'])){
    //redirect login
    header("location: ?page=login");



//redirect if video_id is not set
if(!isset($_GET['video_id'])){
?>
 <script>window.history.back();</script>
<?php

}
}
$the_video_id = $_GET['video_id'];

$query = "SELECT * FROM videos WHERE video_id = $the_video_id";
$select_video = mysqli_query($connection,$query);
checkQuery($select_video);
while($row = mysqli_fetch_assoc($select_video)){
    $video_title =  $row['video_title'];
    $access = $row['access'];
    
}


?>


                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $video_title ?></h1>

                       <a video-id="<?php echo $the_video_id;  ?>"  data-bs-toggle="modal" data-bs-target="#editVideoModal" class="edit_video_modal d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-edit fa-sm text-white-50"></i>
                                 Edit video
                       </a>

                                
                    </div>

                    <!-- Content Row -->
                    <div class="container-dashboard">
                    <!-- #player embed -->
                     
                    <div class="video-section-video-details">

                        <div class="video-section">
                      <div class="video-container-embed">

                     <video
                    id="player"
                    controls
                    muted
                    class="cld-video-player cld-video-player-skin-dark"
                    >
                     </video>  
                       

                    </div>
                   
                     
                    </div>


                    <div class="video-additionals">

                    <!-- <div class="video_action_btns">
                    
                    </div> -->

                    <div class="video-analytics">
                       <!-- <h4 class="title"> Analytics</h4> -->
                       <div class="video_access_level">
                      <i class="fas fa-lock"></i> <span><?php echo $access ?></span>
                     </div>

                       <div class="admin_load_video_analytics"></div>

                       <div id="analytics-container"class="mt-3">

                       <div>
                          <form action="async/download_video_asset.php" method="post" class="download-form">
                            <input type="hidden" class="download_url_input" name="video_url" value="#">
                            <input type="hidden" name="video_id" value="<?php echo $the_video_id; ?>">  
                        </form>

                       <a download-url="#"  class="download-video-link action_circle_btn"><i class=" fas fa-download fa-lg"></i></a>
                        <a class="share-link action_circle_btn"><i class="fas fa-share fa-lg"></i></a> 
                       </div>

                    
                       <?php
                       if($access == 'private'){
                        ?>
                          <a href="#" video-id="<?php echo $the_video_id; ?>" class="btn btn-secondary view_access_list"  data-bs-toggle="modal" data-bs-target="#accessModal">Access list</a>
                        <?php
                       }
                       ?>

                      

                       </div>

                    </div>

                    </div>   

                    </div>
                   
                
                   

                    

                    



                    </div>
                    
              
                    <!-- Content Row -->


                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
          <!-- Cloudinary Video Player Dependencies -->
          <div class="injected_video_script"></div>

      
   

          <?php
          $video_id = $_GET['video_id'];
          $query = "SELECT * FROM videos WHERE video_id = $video_id";
          $select_video_metadata = mysqli_query($connection,$query);
          checkQuery($select_video_metadata);
          while($row = mysqli_fetch_assoc($select_video_metadata)){
          $video_public_id =  $row['public_id'];
          $thumbnail_id = $row['thumbnail_id'];

          }
          ?>
          <script>

            function loadAdminAnalytics(){
            let video_id = "<?php echo $the_video_id ?>";
            $.ajax({
            url: "async/admin_player_video_analytics.php",
            data:{video_id:video_id},
            type:"POST",
            success:function(data){
            if(!data.error){
            $('.admin_load_video_analytics').html(data);       
            }
              
            }
            });      

            }

            loadAdminAnalytics();

            function loadVideosScript(){

                // $("#player").css('display', 'none');  
             let video_public_id = '<?php echo $video_public_id ?>';
            let thumbnail_id = '<?php echo $thumbnail_id; ?>';
            let video_id = '<?php echo $the_video_id ?>'

            $.post("async/load_video_embed.php",{video_public_id:video_public_id,thumbnail_id:thumbnail_id,video_id:video_id},function(data){
              $('.injected_video_script').html(data);  


            });    


            } 
           loadVideosScript();


           function fetchDownloadLink(){
            let video_public_id = '<?php echo $video_public_id ?>';

            $.post("async/load_video_asset_link.php",{video_public_id:video_public_id},function(data){
                // $('.download-video-link').attr('download-url',data);
                $('.download_url_input').attr("value",data);
            })
           }

           //update download link
           fetchDownloadLink();

           $('.download-video-link').click(function(e){
            console.log('Downloading...');

            $(".download-form").submit();
    

           });

           $('.share-link').click(function(e){
            let video_title = '<?php echo $video_title ?>';

            var downloadUrl = $(this).attr('download-url');

            if (navigator.canShare) {
            const shareData = {
                title: video_title,
                text: "Check out this interesting video: "+video_title,
                url: downloadUrl // Replace with your actual link
            };
            
            player.on("error", function(error) {
            let analytic_type = 'error';
            let video_id = "<?php echo $the_video_id; ?>";
            console.error("Video playback error:", error);

            // Handle the error here (e.g., display an error message, retry loading)
            $.post("async/capture_analytic.php",{analytic_type:analytic_type,video_id:video_id},function(data){
                loadAdminAnalytics();
            });
            });

            player.on("canplay", function(event) {
            console.log("Can play!");
            cdn_vid_feed.text("Ready to play");
            
            });

        

            navigator.share(shareData)
                .then(() => console.log('Content shared successfully'))
                .catch(error => {
                console.error('Sharing failed:', error);
                // Optionally display an error message to the user
                });
            } else {
            console.log("Web Share API not supported");
            // Consider using a fallback sharing method for unsupported browsers
            }

           })

           function capturePageImpression(){
            let analytic_type = 'views';
            let video_id= "<?php echo $the_video_id; ?>"
            $.ajax({
            url: "async/capture_analytic.php",
            data:{analytic_type:analytic_type,video_id:video_id},
            type:"POST",
            success:function(data){
            if(!data.error){
            //load player to update
            loadAdminAnalytics();  
            }

            }
            });    
            }

            capturePageImpression();

           $(".view_access_list").click(function(e){

            let video_id =  $(this).attr("video-id");

            $.post("async/load_access_list.php",{video_id:video_id},function(data){
                $(".load_access_list").html(data);
            })
           })
          </script>
      
     

  


