<?php
include('functions.php');

if(isset($_POST['video_id'])){

$video_id = escapeString($_POST['video_id']);

$query = "SELECT * FROM videos WHERE video_id = $video_id";
$select_video = mysqli_query($connection,$query);
checkQuery($select_video);
while($row = mysqli_fetch_assoc($select_video)){
    $video_title = $row['video_title'];
    $access = $row['access'];
    $public_id= $row['public_id'];
}

}

?>

<div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <?php echo $video_id ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- #region -->

     
      <form action="" method="post" class="my-4 mx-3 update_video_metadata" enctype="multipart/form-data">

      <div class="edit_video_metadata_feeds"></div>
      
      <input type="hidden" name="public_id"  value="<?php echo $public_id ?>" required>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Video title" name="video_title" value="<?php echo $video_title; ?>" required>
        <label for="floatingInput">Title</label>
      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">Thumbnail</label>
        <input class="form-control" type="file" id="formFile" name='thumbnail' >
      </div>

      <div class="form-check form-switch " style="margin:22px;">
      <?php
       if($access == 'private'){
        ?>
          <input class="form-check-input private-switch" type="checkbox" role="switch" id="flexSwitchCheckDefault"
        name="access" value="private" checked>
      <label class="form-check-label" for="flexSwitchCheckDefault">Private</label>
        <?php
       }else{
        ?>
          <input class="form-check-input private-switch" type="checkbox" role="switch" id="flexSwitchCheckDefault"
      name="access" value="private" >
      <label class="form-check-label" for="flexSwitchCheckDefault">Private</label>

        <?php
       }
      ?>
    

      </div>


      <button class="btn btn-primary w-100 update_metadata_btn" type="submit">Update</button>

      </form>


   
     

      <div class="modal-footer">
       
      </div>
      </form>
      
      <script>
            $('.update_video_metadata').submit(function(e){
                e.preventDefault();

                $('.update_metadata_btn').html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                $('.update_metadata_btn').attr("disabled",true);


                
                $.ajax({
                        url: "async/add_video_metadata.php",
                        type:"POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success:function(data){
                        if(!data.error){
                        $('.edit_video_metadata_feeds').html(data);    
                        
                        $('.update_metadata_btn').html('Update');
                        $('.update_metadata_btn').attr("disabled",false);

                   //redirect after edit on same page (on same page redirect for update)
                    window.setTimeout(function() {
                        window.location = '?page=video_item&video_id=<?php echo $video_id; ?>';
                    }, 3000);
       


                        }
                        
                        }
                    });
            })
      </script>