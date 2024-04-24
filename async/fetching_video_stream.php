<?php
// Assuming $dbConnection is your database connection object

// Function to get video stream URL based on video ID and network stability
function getVideoStreamById($videoId, $networkStability, $dbConnection) {
    $resolution = '';

    if ($networkStability === 'high') {
        $resolution = '720p';
    } else {
        $resolution = '360p';
    }

    $stmt = $dbConnection->prepare("SELECT url FROM video_streams WHERE id = ? AND resolution = ?");
    $stmt->bind_param("is", $videoId, $resolution);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['url'];
    } else {
        return ''; // Handle error or default URL
    }
}

// Example network stability detection (replace with actual logic using Network Information API)
$networkStability = 'high'; // Placeholder for network stability detection

// Example video ID (replace with the actual video ID you want to fetch)
$videoId = 1; 

// Get the appropriate video stream URL
$videoUrl = getVideoStreamById($videoId, $networkStability, $dbConnection);
?>

<script>
// Get the video element
let videoElement = document.getElementById('videoPlayer');

// Set the video source based on network stability
videoElement.src = "<?php echo $videoUrl; ?>";
</script>


?>