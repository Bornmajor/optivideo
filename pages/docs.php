<?php include("includes/header.php"); ?>

<title>Docs</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>



<div class="container_users_clips">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Docs</li>
  </ol>
</nav>

<div>
 

 <!-- #docs-->

 <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Creating an account
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <!-- <strong>This is the first item's accordion body.</strong>  -->
        <ol>
            <img src="assets/images/tutorial_login.png" width="250px" alt="" srcset="">
            <li>Go to login page found in app bar. <a href="?page=login" class="app-link"> Get started</a></li>
            <li>Select need an account (Create account) just below the form or you can go directly through.<a href="?page=registration" class="app-link">Create account</a></li>
            <li>Enter a valid email address.</li>
            <li>You will receive 6 digit code to verify your account.</li>
            <li>Done!!</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      Account login
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <ol>
            <img src="assets/images/tutorial_login.png" width="250px" alt="" srcset="">
            <li>Go to login page found in app bar. <a href="?page=login" class="app-link"> Get started</a></li>
            <li>Enter a valid email address.</li>
            <li>You will receive 6 digit code as access point your account.</li>
            <li>Done!!</li>
        </ol>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Upload a video
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <img src="assets/images/tutorial_upload_vid.png" width="250px" alt="" srcset="">
      <ol>
            <li>For you to upload your first video you're required to login to your account.(for info about login to login account tutorial).</li>
            <li>After login in your will be automatically redirected to dashboard.If not you can navigate to <a href="?page=dashboard" class="app-link"> Get started</a> </li>
            <li>On side bar you will see video dropdown click on it and select <b>Upload</b>.</li>
            <li>You can upload your video through drag and drop from your local device</li>
            <li>Video is first upload and under goes encoding.You will be required to enter other video attribute like title</li>
            <li>Done!!</li>
        </ol>

      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading4">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
        Deleting uploads
      </button>
    </h2>
    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <img src="assets/images/tutorial_delete.png" width="250px" alt="" srcset="">
      <ol>
            <li>For you to upload your delete video you're required to login to your account.(for info about login to login account tutorial).</li>
            <li>After login in your will be automatically redirected to dashboard.If not you can navigate to <a href="?page=dashboard" class="app-link"> Get started</a> </li>
            <li>On side bar you will see video dropdown click on it and select <b>View</b>.</li>
            <li>Delete video you click on 3-dots on that particular video </li>
            <li>You will see delete option on dropdown,click to delete</li>
            <li>Done!!</li>
        </ol>

      </div>
    </div>
  </div>


</div>

</div>


</div>

<?php include('components/sign_up_banner.php')?>

<?php include('components/footer_items.php'); ?>
