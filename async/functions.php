<?php
include('connection.php');
// Set the maximum execution time to 300 seconds (5 minutes)
set_time_limit(300);

require __DIR__ . '/../vendor/autoload.php';


// Use the Configuration class 
use Cloudinary\Configuration\Configuration;

// Configure an instance of your Cloudinary cloud
Configuration::instance('cloudinary://882463312224961:PQ_hYp8kQkpv2-j653EJBWKcyZQ@dx8t5kvns');



//correcting time
date_default_timezone_set('UTC');

 //success msg
 function successMsg($msg){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  //fail msg
  function failMsg($msg){
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  //warning msg
  function warnMsg($msg){
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  

function escapeString($string){
global $connection;

return $string = mysqli_real_escape_string($connection,$string);

}

function checkQuery($result){
    global $connection;
    if($result){
    
    }else{
        die("Query failed".mysqli_error($connection));
    
    }  
    }
    


function generateUserId(){
    global $connection;
      // String of all alphanumeric character
  $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
  // of specified length
  $gen_usr_id = "U-". substr(str_shuffle($str_result),
                      0, 50);
    
 return $gen_usr_id;

}

function generateVideoId($usr_id){

  $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
  // of specified length
  $gen_usr_id = "V".$usr_id."-". substr(str_shuffle($str_result),
                      0, 15);
    
 return $gen_usr_id;  
}

function generateThumbnail($usr_id){
  $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
  // of specified length
  $gen_usr_id = "TH".$usr_id."-". substr(str_shuffle($str_result),
                      0, 15);
    
 return $gen_usr_id;  

}
function generateUserToken(){
    global $connection;
    // String of all alphanumeric character
$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
// of specified length
$gen_token_id = "UTK". substr(str_shuffle($str_result),
                    0, 40);
  
return $gen_token_id;
 
}

function generateUsername($string){

    $character = "@";
    
    $position = strpos($string, $character);
    if ($position !== false) {
      $newString = substr($string, 0, $position);
      return $newString; // result: username
    }
}

function getUserIdFromToken($usr_token){
    global $connection;
    if(!checkAuthorization()){
        return false;
    };



    $query = "SELECT usr_id FROM bloghub_users WHERE usr_token = '$usr_token'";
    $select_user = mysqli_query($connection,$query);
    checkQuery($select_user);
    if(mysqli_num_rows($select_user) == 0){
     return false;
    }
    while($row = mysqli_fetch_assoc($select_user)){
    $usr_id =  $row['usr_id'];
    }

    return $usr_id;

}

function generateVerificationCode($numDigits){
      // Validate input
  if ($numDigits <= 0) {
    throw new InvalidArgumentException('Number of digits must be positive.');
  }

  // Initialize empty string for the random digits
  $randomDigits = '';

  // Loop to generate random digits
  for ($i = 0; $i < $numDigits; $i++) {
    // Generate a random digit between 0 and 9 (inclusive)
    $randomDigit = rand(0, 9);
    // Append the digit to the string
    $randomDigits .= (string) $randomDigit;
  }

  return $randomDigits;
}


function setSession($mail){
    global $connection;
  
    $mail = escapeString($mail);
  
    $query = "SELECT * FROM opti_users WHERE mail = '$mail'";
    $select_users = mysqli_query($connection,$query);
    checkQuery($select_users);
  
    while($row = mysqli_fetch_assoc($select_users)){
    $_SESSION['usr_id'] = $row['usr_id'];
    $db_mail = $row['mail'];
  
    }
    //trim content after @
    $parts = explode('@',$db_mail);
    $_SESSION['mail'] = $parts[0];
     
    //assigning session variable
  
  
  }


  function templateBody($message, $sender_mail) {
    $htmlContent = '
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>OptiVideo</title>
      <style>
      .container{
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          
      }
      .content_card{
          border: 2px solid #f1f1f1;
          border-radius:20px;
          width: 100%;
          max-width: 400px;
      }
      .brand_logo{
          font-size: 20px;
          text-align: center;
          font-weight: 600;
      }
      .send_content{
      margin:20px 0;
      }
      .content_message{
          margin:20px 20px;
      }
      .footer_content{
          margin:30px 20px;
          font-weight: 600;
          text-align: end;
      }
      body{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      
      }
      </style>
    </head>
    <body>
    <div class="container">
    
    <div class="content_card">
    
    
    <div class="brand_logo">
    
        <img src="https://res.cloudinary.com/dx8t5kvns/image/upload/v1710412047/tgeducsbdk3reuzt7m1x.png" 
         width="150px"
        alt="">
        <div><span style="color:black;">Opti</span><span style="color:#f6b417;">Video</span></div>
        
    </div>
    
    <div class="content_message">
    
    <div class="send_content">
        Sender: <b>'.$sender_mail.'</b>
    </div>
    
    <div class="other_content">'.$message.'</div>
    
    
    <div class="footer_content">
        This message is sent to you by OptiVideo best video optimization application in world
    </div>
    
    </div>
    
    
    </div>
    
    </div>
    
        
    </body>
    </html>';
  
    // Replace placeholders with dynamic content
   
    return $htmlContent;
  }

  function getUserIdFromVideoId($video_id){
    global $connection;

    $query = "SELECT * FROM videos WHERE video_id = $video_id";
    $select_usr_id = mysqli_query($connection,$query);
    checkQuery($select_usr_id);
    while($row = mysqli_fetch_assoc($select_usr_id)){
    $usr_id =  $row['usr_id'];
    }

    return $usr_id;
  }
  
  function noOfUserVideos($usr_id){
    global $connection;

    $query = "SELECT * FROM videos WHERE usr_id = $usr_id";
    $select_user_videos = mysqli_query($connection,$query);
    checkQuery($select_user_videos);
    echo mysqli_num_rows($select_user_videos);

  }

  function getMailByUserId($usr_id){
    global $connection;

    $query = "SELECT * FROM opti_users WHERE usr_id = $usr_id";
    $select_mail = mysqli_query($connection,$query);
    checkQuery($select_mail);
    while($row = mysqli_fetch_assoc($select_mail)){
     $mail = $row['mail'];
    }

    return $mail;
  }
?>