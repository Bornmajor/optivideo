<?php include("includes/header.php"); ?>
<title>Register</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>

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
        <div class="register_feeds">

        <?php
         //prevent user from creating account if active session exist
         if(!isset($_SESSION['usr_id'])){
            ?>
            <form action="" method="post" class='add_user_form'>

            <div class="form-floating my-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="xyz@example.com" name='mail'
            value="<?php
            if(isset($_POST['mail'])){
                echo $_POST['mail'];
            } 

            ?>"
            >
            <label for="floatingInput">Email address</label>
            </div>
            
            <div class="my-3">
            <button class="btn btn-secondary w-100 register_submit_btn" type="submit">Register</button>     
            </div>


            </form> 
            <?php


         }else{
         failMsg("You need to logout to create a new account");
         }
        ?>

        
        
        </div>
    

        
        <div class="my-3 alternative-link">
            Having an account? <a href="?page=login">Login</a>
        </div>

    </div>

</div>



