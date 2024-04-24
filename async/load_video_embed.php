
<?php
include('functions.php');

 use Cloudinary\Cloudinary;
 $cloudinary = new Cloudinary([
     'cloud_name' => 'dx8t5kvns',
     'api_key' => '882463312224961',
     'api_secret' => 'PQ_hYp8kQkpv2-j653EJBWKcyZQ',
   ]); 

$video_id = escapeString($_POST['video_id']);

if(!isset($_POST['video_public_id']) || !isset($_POST['thumbnail_id'])){
    $video_public_id = 'kmvjczwjzijspgonlty3';
    $thumbnail_id = 'zdnusdavtjzjg8zxvuwy';
}

$video_public_id = $_POST['video_public_id'];
$thumbnail_id = $_POST['thumbnail_id'];

$result = $cloudinary->searchApi()
->expression("resource_type:image AND public_id=$thumbnail_id")
->sortBy('public_id','desc')
->maxResults(1)
->execute();

// Access the secure_url value from the result
$secureUrl = $result['resources'][0]['secure_url'];
?>

<script>
const player = cloudinary.videoPlayer('player', {
cloudName: 'dx8t5kvns',
width: '640',//640 //480
height: '420',//320 //280
controls: true,
colors: {
    base: '#f6b417',
    accent: '#e5a309'
},
logoImageUrl: 'https://res.cloudinary.com/dx8t5kvns/image/upload/v1710524612/y66ifb4hppkzcakrhsnu.png'
});

player.source('<?php echo $video_public_id ?>', {
poster: 'https://res.cloudinary.com/dx8t5kvns/image/upload/<?php echo $thumbnail_id; ?>.jpg',
sourceTypes: ['dash']
});
</script>
  

<script>
        player.on("play", function(event) {
                let video_id = "<?php echo $video_id ; ?>";
            console.log("Video playback started!");
            
            let analytic_type = 'plays';
            
            $.post("async/capture_analytic.php",{analytic_type:analytic_type,video_id:video_id},function(data){
                loadAdminAnalytics();
            });
            });

            player.on("waiting", function(event) {
                let video_id = "<?php echo $video_id ; ?>";
            console.log("Video is buffering...");
            let analytic_type = 'buffers';
            $.post("async/capture_analytic.php",{analytic_type:analytic_type,video_id:video_id},function(data){
                loadAdminAnalytics();
            });
            });
</script>