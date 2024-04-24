<?php
include('functions.php');
use Cloudinary\Api\Admin\AdminApi; 


if(!isset($_POST['video_id'])){
return false;
}

$video_id = escapeString($_POST['video_id']);

$query = "SELECT * FROM videos WHERE video_id = $video_id";
$select_metadata = mysqli_query($connection,$query);
checkQuery($select_metadata);
while($row = mysqli_fetch_assoc($select_metadata)){
$public_id = $row['public_id'];
$thumbnail_id = $row['thumbnail_id'];

}
//delete assets from cdn



//delete video from  cdn
$delete_video_id = (new AdminApi())->deleteAssets($public_id,
    ["resource_type" => "video", "type" => "upload"]
);


//correct thumbnail delete
//delete thumnail from cdn
$delete_public_id = (new AdminApi())->deleteAssets($thumbnail_id,
    ["resource_type" => "image", "type" => "upload"]
);

//delete items from database
$query = "DELETE FROM videos WHERE video_id =  $video_id";
$delete_video = mysqli_query($connection,$query);
checkQuery($delete_video);

?>