

<!-- Modal upload video -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload video</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body feedback_upload_form"> 

      <form id="upload-form" enctype="multipart/form-data" onsubmit="handleFormSubmit(event)">
      <div id="drop-area" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event)" >
        <p>Drag &amp; Drop files here or click to upload</p>
        <input type="file" id="fileInput" name="files" style="display: none;" >
       </div>
        
       <!-- <button type="button" class="btn btn-primary" id="uploadVideoButton"><i class="fas fa-upload"></i> Upload file</button> -->
      </div>

        <?php

      
         ?>

      <div class="modal-footer">
       
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal edit video -->
<div class="modal fade" id="editVideoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content load_edit_modal">

  
    </div>
  </div>
</div>

<!-- Modal profile -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="" method="post" class="update_user_data_form">
        <?php
        if(isset($_SESSION['usr_id'])){
          $sess_usr_id = $_SESSION['usr_id'];

        $query = "SELECT * FROM opti_users WHERE usr_id = $sess_usr_id";
        $select_user_data = mysqli_query($connection,$query);
        checkQuery($select_user_data);
        while($row = mysqli_fetch_assoc($select_user_data)){
        $mail = $row['mail'];
        }  
        }
        
        ?>
      
      <div class="update_profile_feed"></div>

     <div class="form-floating mb-3">
      <input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com" value="<?php echo $mail; ?>">
      <label for="floatingEmptyPlaintextInput">email(readonly)</label>
    </div>


</form>

        
      </div>
      <div class="modal-footer">
   
      </div>
    </div>
  </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="accessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content load_access_list">
   
    </div>
  </div>
</div>