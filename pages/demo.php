<?php include("includes/header.php"); ?>
<title>Demo player</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>


<div class="container_demo_players">

<div class="container_server_player">
<h4>HMTL5 web player</h4>
<video src="https://osbormaja.000webhostapp.com/external/trimmed_weeknd.mp4" id="server_player" controls>
    
</video>

<div class="demo_additional_info">
    <span class="mb-3"><i class="fas fa-server fa-lg"></i> https://www.000webhost.com/(standard server)</span>

    <span class="mb-3">
    <i class="fas fa-sync fa-spin fa-lg"></i> 
    <span class="standard-video-feed">Loading</span>
    </span>

    <span class="mb-3">
    <i class="fas fa-tape fa-lg"></i>
    <span>  35.7 MB (size)</span>
    </span>

 

  

</div>

</div>

<div class="container_cdn_player">
<h4><img src="assets/images/logo.png" width="50px" alt="">Spark web player</h4>
<video src=""  id="demo-one-player"controls oncontextmenu="return false;"></video>

<div class="demo_additional_info">
    <span  class="mb-3"><i class="fas fa-server fa-lg" style="color:#f4b519;"></i> Optivideo</span>

    <span class="mb-3">
    <i class="fas fa-sync fa-spin fa-lg" style="color:#f4b519;"></i> 
    <span class="cdn-vid-feed">Loading</span>
    </span>

    <span class="mb-3">
    <i class="fas fa-tape fa-lg"></i>
    <span>  35.7 MB (size)</span>
    </span>




  
        

</div>

</div>

</video>




</div>
<script>
let sourceTypes = 
{
sourceTypes: ['dash']
};    

// Variables to store load start time and load end time
let loadStartTime, loadEndTime;

//

 const player = cloudinary.videoPlayer('demo-one-player', {
cloudName: 'dx8t5kvns',
width: '480',//640
height: '280',//320
controls: true,
colors: {
    base: '#f6b417',
    accent: '#e5a309'
},
logoOnclickUrl:'https://res.cloudinary.com/dx8t5kvns/image/upload/v1710524612/y66ifb4hppkzcakrhsnu.png',
logoImageUrl: 'https://res.cloudinary.com/dx8t5kvns/image/upload/v1710524612/y66ifb4hppkzcakrhsnu.png'
});

player.source('rjqeyr81pfclum9po4rb',{
sourceTypes: ['dash']
}); 

//variable trace cdn player 
let cdn_vid_feed = $('.cdn-vid-feed');

player.on("play", function(event) {
   console.log("Video playback started!");
   cdn_vid_feed.text("Playing");
});

player.on("canplay", function(event) {
   console.log("Can play!");
   cdn_vid_feed.text("Ready to play");
   
});

player.on("waiting", function(event) {
   cdn_vid_feed.text("Buffering");
});

player.on("pause", function(event) {
   cdn_vid_feed.text("Pause");
});

//ended
player.on("ended", function(event) {
   cdn_vid_feed.text("Ended");
});




let stand_vid_feed = $('.standard-video-feed');

// Function to handle video buffering
function handleBuffering(event) {
    const videoId = event.target.id;
  if (event.type === 'waiting') {
    // console.log('Video is buffering...');
    stand_vid_feed.text("Buffering");
    // Execute actions when video is buffering
  } else if (event.type === 'playing') {
    // console.log('Buffering ended, video is playing.');
    stand_vid_feed.text("Playing");
    // Execute actions when buffering ends and video resumes playing
  }else if (event.type === 'pause') {
    // console.log('Video is paused.');
    // Execute actions when video is paused
    stand_vid_feed.text("Paused");
  } else if (event.type === 'ended') {
    // console.log('Video has stopped.');
    // Execute actions when video has stopped
    stand_vid_feed.text("Ended");
  } else if (event.type === 'error') {
    // console.log('Video failed to load:', event.target.error);
    stand_vid_feed.text("Failed network error");
    // Execute actions when video fails to load
  }else if (event.type === 'canplay') {
    // console.log('Video is ready to play.');
    // Execute actions when video is ready to play
    stand_vid_feed.text("Ready to play");
  }
}


// Function to handle loadedmetadata event
function handleMetadataLoaded() {
    
  // Record the time when metadata starts loading
  loadStartTime = performance.now();
}

// Function to handle canplay event
function handleCanPlay() {
    
  // Record the time when the video is ready to play
  loadEndTime = performance.now();
  
  // Calculate the time it took to load the video
  const loadTime = loadEndTime - loadStartTime;
  console.log('Time taken to load video initially (in milliseconds):', loadTime);
}


function handleMetadataLoadedCDN(){  
  // Record the time when metadata starts loading
  loadStart = performance.now();   
}

// Function to handle canplay event
function handleCanPlayCDN() {
    
    // Record the time when the video is ready to play
    loadEnd = performance.now();
    
    // Calculate the time it took to load the video
    const load = loadEnd -  loadStart;
    console.log('CDN Time taken to load video initially (in milliseconds):', load);

  }
  
// Get the video element standard server player
const video = document.getElementById('server_player');
//get player for cdn player
const cdn_video = document.getElementById('demo-one-player');
// Attach event listeners for buffering

// Attach event listeners for buffering
video.addEventListener('waiting', handleBuffering);
video.addEventListener('playing', handleBuffering);
video.addEventListener('pause', handleBuffering);
video.addEventListener('ended', handleBuffering);
video.addEventListener('error', handleBuffering);
video.addEventListener('canplay', handleBuffering);

// Attach event listener for loadedmetadata
video.addEventListener('loadedmetadata', handleMetadataLoaded);
// Attach event listener for canplay
video.addEventListener('canplay', handleCanPlay);

// Attach event listener for loadedmetadata
cdn_video.addEventListener('loadedmetadata',  handleMetadataLoadedCDN);
// Attach event listener for canplay
cdn_video.addEventListener('canplay', handleCanPlayCDN);





</script>
