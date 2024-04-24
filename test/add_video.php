<?php

// Error handling (optional): 
// - Check if the request method is POST
// - Check if the file is uploaded successfully using `move_uploaded_file` return value

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_FILES['file'])) {
  http_response_code(400); // Bad request
  exit('Invalid request');
}

// Get uploaded file details
$uploadedFile = $_FILES['file'];

// Validation (optional):
// - Check allowed file types
// - Check file size limits

$allowedExtensions = ['mp4', 'avi', 'mov']; // Adjust as needed
$fileExtension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

if (!in_array($fileExtension, $allowedExtensions)) {
  http_response_code(415); // Unsupported media type
  exit('Invalid file type');
}

// Target directory for uploads (adjust as needed)
$targetDir = 'uploads/';

// Create target directory if it doesn't exist
if (!is_dir($targetDir)) {
  mkdir($targetDir, 0777, true);
}

// Generate a unique filename (optional)
$fileName = uniqid('', true) . '.' . $fileExtension;
$targetFilePath = $targetDir . $fileName;

// Move the uploaded file to the target location
if (move_uploaded_file($uploadedFile['tmp_name'], $targetFilePath)) {
  http_response_code(200); // Success
  echo 'File uploaded successfully!';
} else {
  http_response_code(500); // Internal server error
  echo 'File upload failed.';
}



?>

<script>
  function uploadFile(file) {
  const formData = new FormData();
  formData.append('file', file);

  $.ajax({
    url: "async/add_video.php",
    type: "POST",
    data: formData,
    contentType: false, // Set to avoid automatic content type setting
    processData: false, // Prevent data converting by jQuery
    success: function(data) {
      if (!data.error) { // Assuming "error" property in response
        $('.feedback_upload_form').html(data); // Update feedback element
      } else {
        console.error('Upload failed:', data.error); // Handle error message
        // Display error message to user (e.g., using an alert or updating UI)
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.error('Upload error:', textStatus, errorThrown);
      // Handle general upload errors (e.g., network issues)
      // Display error message to user
    }
  });
}


// async function uploadFile(file) {
//   const formData = new FormData();
//   formData.append('file', file);

//   try {
//     const response = await fetch('async/add_video.php', {
//       method: 'POST',
//       body: formData
//     });

//     if (response.ok) {
//       console.log('File uploaded successfully!');
//       // Handle successful upload (e.g., display success message)
//     } else {
//       console.error('Upload failed:', response.statusText);
//       // Handle upload failure (e.g., display error message)
//     }
//   } catch (error) {
//     console.error('Upload error:', error);
//     // Handle general upload errors
//   }
// }
</script>