<?php
include('functions.php');
use Cloudinary\Api\Upload\UploadApi;

if(isset($_FILES['file'])){

  $usr_id = $_SESSION['usr_id'];
  


  // Get uploaded file details
  $uploadedFile = $_FILES['file'];

  $allowedExtensions = ['mp4', 'avi', 'mov']; // Adjust as needed
  $fileExtension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

  //check for file support
  if (!in_array($fileExtension, $allowedExtensions)) {
    // http_response_code(415); 
    // Unsupported media type
    failMsg('Invalid file type');
     return false;
  }

  $video_url = $_FILES['file']['name'];
  $vid_tmp = $_FILES['file']['tmp_name'];

  $public_id = generateVideoId($_SESSION['usr_id']);

  move_uploaded_file($vid_tmp,"../temp/$video_url");

   try{
    $uploadResponse = (new UploadApi())->upload('../temp/'.$video_url, [
    'public_id' =>    $public_id,
    'resource_type' => 'video',
    ]); 
   } catch (\Exception $e) {
    // Handle the error
    failMsg("Upload process failed!!Check your network stability!!");
 
   }
    
    //delete video file
    unlink('../temp/'.$video_url);
    //store video in user database

    //get upload month and year
    $upload_month = date('M');
    $upload_year = date('Y');
    $query = "INSERT INTO videos(usr_id,public_id,upload_month,upload_year)VALUES('$usr_id','$public_id','$upload_month','$upload_year')";
    $store_video_id = mysqli_query($connection,$query);
    checkQuery($store_video_id);

    //get secure url after upload
    // $secureUrl = $uploadResponse->secure_url;
   

}

?>

<form action="" method="post" class="video_metadata_form" enctype="multipart/form-data">

<div class="video_metadata_feeds"></div>

<input type="hidden" name="public_id"  value="<?php echo $public_id ?>" required>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Video title" name="video_title" required>
  <label for="floatingInput">Title</label>
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">Thumbnail</label>
  <input class="form-control" type="file" id="formFile" name='thumbnail' required>
</div>

<div class="form-check form-switch " style="margin:20px;">
<input class="form-check-input private-switch" type="checkbox" role="switch" id="flexSwitchCheckDefault"
name="access" value="private" >
<label class="form-check-label" for="flexSwitchCheckDefault">Private</label>
</div>

<button class="btn btn-primary w-100 upload_metadata_btn" type="submit">Proceed</button>

</form>

<script>
    $('.video_metadata_form').submit(function(e){
    e.preventDefault();

    
    $('.upload_metadata_btn').html('<i class="fas fa-spinner fa-spin"></i> Uploading...');
     $('.upload_metadata_btn').attr("disabled",true);


    
    $.ajax({
            url: "async/add_video_metadata.php",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(data){
            if(!data.error){
            $('.video_metadata_form').html(data);       

            }
              
            }
          });
  })
</script>