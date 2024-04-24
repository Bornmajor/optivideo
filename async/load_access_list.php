<?php
include("functions.php");

$video_id = $_POST['video_id'];
$usr_id = $_SESSION['usr_id'];




?>

<div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Access list</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <!-- #form-->

       <form class="add_user_access_form">

       <div class="access_form_feed"></div>
                 
        <div class="mb-3 access-inline-form">
            <input type="hidden" name="video_id" value="<?php echo $video_id ?>">
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter valid email" name="mail" required>
        <button type="submit" class="btn btn-primary mx-1">Add</button>
        </div>
            
      

        </form>


        <div class="video_access_list">

        </div>

        
      </div>
  
      <script>
        function loadVideoAccessList(){

            let video_id = "<?php echo $video_id ?>";

            $.ajax({
            url: "async/specific_video_access_list.php",
            data:{video_id:video_id},
            type: "POST",
            success:function(data){
                if(!data.error){
                $('.video_access_list').html(data);
                }
      
          }
        })
        }
        loadVideoAccessList();
        $(".add_user_access_form").submit(function(e){
            e.preventDefault();

            let postData = $(this).serialize();

            $.post("async/add_user_access_list.php",postData,function(data){
                $(".access_form_feed").html(data);
                loadVideoAccessList();
            })

        })
      </script>