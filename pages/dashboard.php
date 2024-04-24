<?php include("includes/header.php"); ?>
<title>Dashboard</title>
</head>
<?php include('includes/sidebar.php') ;?>
<?php
//CHECK If user login
if(!isset($_SESSION['usr_id'])){
    //redirect login
    header("location: ?page=login");


}
?>


                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                     

                                
                    </div>

                    <!-- Content Row -->
                    <div class="container-video-flex">

                    <div class="dashboard_stats">
                        <h3>Overview</h3>
                        <span class="load_overview">
                            <div class="loader"></div>
                        </span>
                    </div>

                  
                    <div class="load_users_video_assets">
                    </div>
                    




                    </div>
                    
              
                    <!-- Content Row -->


                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

  <script>
    //call video assets on dashboard
//    getUserVideosAssets();
   
  </script>


