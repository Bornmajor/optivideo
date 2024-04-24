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
        <?php
          if(!isset($_SESSION['usr_id'])){
            ?>
            <form action="" method="post" class="login_user_form">


            <div class="form-floating my-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="xyz@example.com" name="mail"

            required>
            <label for="floatingInput">Email address</label>
            </div>
            
            <div class="my-3">
            <button class="btn btn-secondary w-100 submit_login_btn" type="submit">Login</button>     
            </div>



            </form>

            <?php
          }else{
            failMsg("You need to logout to login to another account");
          }
        ?>
 
       <div class="my-3 alternative-link">
            Need an account? <a href="?page=registration">Create account</a>
        </div>

    
    </div>   
    </div>

</div>

<script>
    
    $(document).ready(function(){
    
   
    })
</script>



