<?php include("includes/header.php"); ?>
<title>Login</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>

<?php

?>

<div class="auth-container">
    <!-- <div class="cover-image-section">
        <img src="assets/images/lock_2.png" alt="">
    </div> -->
    <div class="form-container-section">

    <span class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon my-3">
                <img src="assets/images/black_optivideo.png"  width="50px" alt="logo">
                </div>

                <div class="sidebar-brand-text"> 
                <span style="color:black;">Opti</span><span style="color:white;">Video</span>
                </div>
    </span>

       <div class="login_feeds">
        <form action="" method="post" class="support_form">

        <div class="support_form_feed"></div>

        <div class="form-floating my-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="xyz@example.com" name="mail"
        required>
        <label for="floatingInput">Your email address</label>
        </div>

        <div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="subject">
            <option selected>Select an option</option>
            <option value="Account problem">Account problem</option>
            <option value="Video Playback">Video Playback </option>
            <option value=" Video Upload Issues"> Video Upload Issues</option>
            <option value="Content Viewing Restrictions"> Content Viewing Restrictions</option>
            <option value="Other errors">Others</option>
        </select>
        <label for="floatingSelect">Type of assistance</label>
        </div>

        <div class="form-floating">
        <textarea class="form-control" placeholder="Explain the issue" id="floatingTextarea2" style="height: 150px" name="message"></textarea>
        <label for="floatingTextarea2">Additional information(describe issue)</label>
        </div>
         
        <div class="my-3">
       <button class="btn btn-secondary w-100" type="submit">Send message</button>     
        </div>

    
        
        </form>
      

    
    </div>   
    </div>

</div>

<script>
    
    $(document).ready(function(){
     $('.support_form').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post("async/send_support_mail.php",postData,function(data){
            $('.support_form_feed').html(data);
            $('.support_form')[0].reset();
            
        })
     })
   
    })
</script>



