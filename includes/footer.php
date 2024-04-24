 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> 

<!-- Bootstrap core JavaScript-->
<script>
function handleDragOver(event) {
  event.preventDefault();
  event.dataTransfer.dropEffect = 'copy';
  event.target.classList.add('hover');
  console.log('Drag Over');
  $('#upload-form').addClass('upload-form-drag-over');
  $('#uploadVideoButton').slideUp();

}

function handleDragLeave(event) {
  event.target.classList.remove('hover');
  $('#upload-form').removeClass('upload-form-drag-over');
  $('#uploadVideoButton').slideDown();
}

function handleDrop(event) {
  event.preventDefault();
  event.target.classList.remove('hover');

  const files = event.dataTransfer.files;
  handleFiles(files);
}

function handleFiles(files) {
  // Error handling for no file selection
  if (files.length === 0) {
    alert('Please select a file to upload.');
    return;
  }

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    console.log('File:', file.name);

    // Upload Logic using Fetch API
    uploadFile(file);
    $('#upload-form').removeClass('upload-form-drag-over');
    $('#upload-form').html('<div><i class="fas fa-fan fa-spin"></i> Uploading...</div>');
    $('#uploadVideoButton').slideUp();
  }
}

function uploadFile(file) {
  const formData = new FormData();
  //post['file']
  formData.append('file', file);

  $.ajax({
    url: "async/add_video.php",
    type: "POST",
    data: formData,
    contentType: false, // Set to avoid automatic content type setting
    processData: false, // Prevent data converting by jQuery
    success: function(data) {
      if (!data.error) { // Assuming "error" property in response
        $('.feedback_upload_form').html(data); // Update feedback element
      } else {
        console.error('Upload failed:', data.error); // Handle error message
        // Display error message to user (e.g., using an alert or updating UI)
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.error('Upload error:', textStatus, errorThrown);
      // Handle general upload errors (e.g., network issues)
      // Display error message to user
    }
  });
}


function handleFormSubmit(event) {
  event.preventDefault();
  const files = document.getElementById('fileInput').files;
  handleFiles(files);
}

function triggerFileInput() {
  document.getElementById('fileInput').click();
}

$(document).ready(function() {



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

  loadRecentVideoSideBar();

  $(".edit_video_modal").click(function(e){
    let video_id = $(this).attr("video-id");

    $.post("async/edit_metadata_modal.php",{video_id:video_id},function(data){
      $(".load_edit_modal").html(data);
    })
  })

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
     getUserVideosAssets();

  $('.video_metadata_form').submit(function(e){
    e.preventDefault();

    
    $.ajax({
            url: "async/add_video_metadata.php",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(data){
            if(!data.error){
            $('.video_metadata_feeds').html(data);  

            getUserVideosAssets();
            loadRecentVideoSideBar();     

            }
              
            }
          });
  })


  $('.verify_token_form').submit(function(e){
    e.preventDefault(); 
    let postData =  $(this).serialize();

  $.post("async/verify_token.php",postData,function(data){
    $('.code_form_feeds').html(data);
  })
  })


    $('.login_user_form').submit(function(e){
    e.preventDefault();

    $('.submit_login_btn').html('<i class="fas fa-spinner fa-spin"></i> Processing...');
     $('.submit_login_btn').attr("disabled",true);

    let postData =  $(this).serialize();

    $.post("async/login_user.php",postData,function(data){
    $('.login_feeds').html(data);
    })
    })

    $('.add_user_form').submit(function(e){
    e.preventDefault();

   
    $('.register_submit_btn').html('<i class="fas fa-spinner fa-spin"></i> Processing...');
     $('.register_submit_btn').attr("disabled",true);

    let postData =  $(this).serialize();

    $.post("async/add_user.php",postData,function(data){

    $('.register_feeds').html(data);
    })
    })

    

  $("#uploadButton").click(function() {
    triggerFileInput();
  });

});

function loadOverViewStats(){
  $.ajax({
            url: "async/overview_dashboard.php",
            type:"POST",
            success:function(data){
            if(!data.error){
            $('.load_overview').html(data);       

            }
              
            }
          });  
}
loadOverViewStats();

function loadChartsData(){
      $.ajax({
          url: "async/charts_data.php",
          type: "POST",
          success:function(data){
            if(!data.error){
              $('.async_charts_data').html(data);
            }
      
          }
        })

    }
     //loading charts data
    loadChartsData();
       //async_charts_data
       $('.report-load-btn').click(function(e){
        //loading charts data
    loadChartsData();
     })
</script>


<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>  

<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/all.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/myscript.js"></script>
<script src="assets/js/sb-admin-2.min.js"></script>   

</body>
</html>