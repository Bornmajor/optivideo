<nav class="navbar sticky-top navbar-expand-lg" style="" >
  <div  class="container-fluid">

<a class="navbar-brand" href="?page=home">
<img src="assets/images/logo.png"  width="75px" alt="logo">

<span class="logo-title">
<span style="font-weight:900;">Opti</span><span style="color:#e5a309;">Video</span>  
</span>

</a>




<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>



<div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
<ul  class="navbar-nav me-5  mb-2 mb-lg-0">


<?php
if(isset($_SESSION['usr_id'])){
?>
<li class="nav-item">
  <a class="nav-link register" href="?page=dashboard">Dashboard</a>
</li>
<?php
}
?>


<li class="nav-item">
  <a class="nav-link register" href="?page=demo">Demo</a>
</li>

<li class="nav-item">
  <a class="nav-link register" href="?page=support">Support</a>
</li>

<li class="nav-item">
  <a class="nav-link " href="?page=docs">Docs</a>
</li>

<?php
if(isset($_SESSION['usr_id'])){
?>
<li class="nav-item">
  <a href="?page=users_videos&user=<?php echo $_SESSION['usr_id'] ?>" class="nav-link register" href="?page=help_center">My clips</a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?page=logout">Logout</a>
</li>
<?php
}else{
 ?>
 <li class="nav-item">
  <a class="nav-link" href="?page=login">Login</a>
</li>
 <?php
}
?>






 <!-- #display when not logged in -->
<!-- <li class="nav-item">
  <a class="nav-link login"  href='?page=login'>Login</a>
</li>
<a href="?page=registration"  class="btn btn-primary mx-2" id="cta-navbar">REGISTER NOW</a> -->
  <!-- #display when not logged in -->











      
</ul>


    </div>

  </div>
</nav>





