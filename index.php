<?php
if(isset($_GET['page'])){
   $source = $_GET['page'];

}else{
    $source = '';
}

switch($source){
case 'home';
include('pages/home.php');
break;
case 'dashboard';
include('pages/dashboard.php');
break;
case 'videos';
include('pages/videos.php');
break;
case 'video_item';
include('pages/video_item.php');
break;
case 'users_videos';
include('pages/users_videos.php');
break;
case 'specific_video';
include('pages/specific_video.php');
break;
case 'demo';
include('pages/demo.php');
break;
case 'support';
include('pages/support.php');
break;
case 'reports';
include('pages/reports.php');
break;
case 'login';
include('pages/login.php');
break;
case 'registration';
include('pages/registration.php');
break;
case 'help_center';
include('pages/contact.php');
break;
case 'docs';
include('pages/docs.php');
break;
case 'logout';
include('pages/logout.php');
break;
default:
include('pages/login.php');
}

include('includes/modals.php');
include ('includes/footer.php')

  
?>