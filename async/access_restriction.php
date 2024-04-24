<?php
include('functions.php');

$video_id = escapeString($_POST['video_id']);

//check if  private 
$query = "SELECT * FROM videos WHERE video_id = $video_id";
$check_access = mysqli_query($connection,$query);
checkQuery($check_access);
while($row = mysqli_fetch_assoc($check_access)){
$access = $row['access'];
$the_video_usr_id = $row['usr_id'];
}



if($access == 'private'){

if(isset($_SESSION['usr_id'])){
//check if the owner is the one login
$sess_usr_id =  $_SESSION['usr_id'];
if($the_video_usr_id !== $sess_usr_id){

//check if login user is in ACL list
$query = "SELECT * FROM access_list WHERE video_id = $video_id AND usr_id = $sess_usr_id ";
$check_user_access = mysqli_query($connection,$query);
checkQuery($check_user_access);
if(mysqli_num_rows($check_user_access) == 0){
?>
<script>
//display access restriction
setTimeout(function() {private_modal.click(); }, 500); 
</script>
<?php
//user is not in the list prevent access
failMsg("The owner of the video has restricted this content.Contact the owner to get access.");    
}

}



}else{
failMsg("This is a restricted content you need to login to identify yourself");
?>
<script>

//display access restriction
setTimeout(function() {private_modal.click(); }, 500); 

</script>
<?php
}
}
?>


