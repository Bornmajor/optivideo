<?php
include('functions.php');
use Cloudinary\Cloudinary;

$public_id = $_POST['video_public_id'];

$cloudinary = new Cloudinary([
'cloud_name' => 'dx8t5kvns',
'api_key' => '882463312224961',
'api_secret' => 'PQ_hYp8kQkpv2-j653EJBWKcyZQ',
]); 

$result = $cloudinary->searchApi()
->expression("resource_type:video AND public_id=$public_id")
->sortBy('public_id','desc')
->maxResults(1)
->execute();

// Access the secure_url value from the result
$secureUrl = $result['resources'][0]['secure_url'];
echo $secureUrl;
?>