<?php
include('functions.php');

$video_id = $_POST['video_id'];

$query = "SELECT * FROM access_list WHERE video_id = $video_id";
$select_access_list = mysqli_query($connection,$query);
checkQuery($select_access_list);
if(mysqli_num_rows($select_access_list) !== 0){
while($row = mysqli_fetch_assoc($select_access_list)){
$usr_id = $row['usr_id'];
$access_list_id = $row['access_list_id'];

?>
<div class="user_access_card my-1">
    
    <img src="assets/images/user_placeholder.jpg" class="mx-2" alt="">
    <span class="user_title mx-2"><?php echo getMailByUserId($usr_id); ?></span>

    <span class="delete_access_user mx-2" access-list-id="<?php echo $access_list_id ?>"  style="cursor:pointer;"><i class="fas fa-times-circle fa-lg"></i></span>
</div>
<?php


}    
}else{
?>
<div class="d-flex align-items-center justify-content-center flex-column">
  <img src="assets/images/question_bro.png" width="200px;" alt="">
    <span class="my-2">No users </span>
</div>
<?php
}

?>

<script>
    $(".delete_access_user").click(function(e){
    let access_list_id =  $(this).attr("access-list-id");

    $.post("async/delete_access_list_user.php",{access_list_id:access_list_id},function(data){
      
        loadVideoAccessList();
    })


    })
</script>

