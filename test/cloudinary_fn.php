<?php
//uploading
$result = (new UploadApi())->upload('y2mate.com - The Weeknd  Blinding Lights Unofficial Music Video BMW M4 CS_1080p.mp4', [
    'folder' => '',
    'resource_type' => 'video']);
echo json_encode($result, JSON_PRETTY_PRINT);


//delete
$public_ids = ['uypydyato1cclw8t4ovg'];
$result = (new AdminApi())->deleteAssets($public_ids, 
    ["resource_type" => "video", "type" => "upload"]);
echo json_encode($result, JSON_PRETTY_PRINT);
?>