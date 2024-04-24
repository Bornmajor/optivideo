<?php
include('functions.php');
use Cloudinary\Api\Upload\UploadApi;

$usr_id = $_SESSION['usr_id'];  

 //metadata

 $video_title = escapeString($_POST['video_title']);
 $public_id = escapeString($_POST['public_id']);
 if(isset($_POST['access'])){
  $access = escapeString($_POST['access']);   
 }else{
  $access = 'public';  
 }

if(!empty($_FILES['thumbnail']['name'])){
// Get uploaded file details
$uploadedFile = $_FILES['thumbnail'];

$allowedExtensions = ['jpeg', 'png', 'jpg','webp']; // Adjust as needed
$fileExtension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

//check for file support
if (!in_array($fileExtension, $allowedExtensions)) {
// http_response_code(415); 
// Unsupported media type
failMsg('Invalid file type');
    return false;
}


$pic_url = $_FILES['thumbnail']['name'];
$pic_tmp = $_FILES['thumbnail']['tmp_name'];  

//move file to temp to prepare upload to CDN
move_uploaded_file($pic_tmp,"../temp/$pic_url");

$thumbnail_id = generateThumbnail($usr_id);

//Upload to CDN using class UploadApi();
$uploadResponse = (new UploadApi())->upload('../temp/'.$pic_url,[
   'public_id' => $thumbnail_id,
   'resource_type' => 'image'
]);

 //delete thumbnail file
 unlink('../temp/'.$pic_url);

 //get month and year
 

 $query = "UPDATE videos SET video_title = '$video_title',access = '$access',thumbnail_id = '$thumbnail_id'  WHERE usr_id = '$usr_id' AND public_id = '$public_id'";

}else{
$query = "UPDATE videos SET video_title = '$video_title',access = '$access' WHERE usr_id = '$usr_id' AND public_id = '$public_id'";
}

//add owner to their access_list private
// if($access == 'private'){
//    $query = "INSERT INTO access_list(video_id,usr_id)VALUES($video_id,$usr_id)";
//    $add_owner_access_list = mysqli_query($connection,$query);
//    checkQuery($add_owner_access_list);
// }




 
 $update_metadata = mysqli_query($connection,$query);
 checkQuery($update_metadata);

 if($update_metadata){
   if(!empty($_FILES['thumbnail']['name'])){
      successMsg('Metadata updated successfully');
    
   }else{
      successMsg('Stream is ready');
   }
   
 }
 







?>
<script>
     function getUserDbVideosAssets(){
   
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
    getUserVideosAssets();
   loadRecentVideoSideBar();  
</script>