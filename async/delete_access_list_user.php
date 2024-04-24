<?php
include("functions.php");

if(isset($_POST['access_list_id'])){
    $access_list_id = escapeString($_POST['access_list_id']);


    $query = "DELETE FROM access_list WHERE access_list_id = $access_list_id";
    $delete_access = mysqli_query($connection,$query);
    checkQuery($delete_access);

}


?>