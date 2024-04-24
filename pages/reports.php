<?php include("includes/header.php"); ?>
<title>Your videos</title>
</head>
<?php include('includes/sidebar.php') ;?>


                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">My reports</h1>
                        <a  class="report-load-btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                          <i class="fas fa-redo fa-sm text-white-50"></i> Update charts</a> 
                     

                                
                    </div>

                    <!-- Content Row -->
                    <div class="container-dashboard">


                    <?php
                    //check if user has any video inorder to show reports
                    $usr_id = $_SESSION['usr_id'];
                    $query = "SELECT * FROM videos WHERE usr_id = $usr_id";
                    $check_user_videos = mysqli_query($connection,$query);
                    checkQuery($check_user_videos);
                    if(mysqli_num_rows($check_user_videos) !== 0){
                       
                    ?>
                    <div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-warning">Uploads</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-warning">Engagements</h6>
      
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
            <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Views
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Plays
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> Downloads
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-warning"></i> Shares
                </span>
            </div>
        </div>
    </div>
</div>
                    </div>

                    <div class="async_charts_data">
                    </div>
                    <?php

                    }else{
                        ?>
                       <div class="d-flex align-items-center justify-content-center flex-column">
                    <img src="assets/images/stats-bro.png" width="400px;" alt="">
                        <span class="my-2">No analysis available</span>
                        <a  class="btn btn-secondary my-3"  data-bs-toggle="modal" data-bs-target="#uploadModal">Upload a video</a>
                    </div>
                        <?php
                    }

                    ?>
                  

                     
                  
  

                     


                    </div>
                    
              
                    <!-- Content Row -->


                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

  


