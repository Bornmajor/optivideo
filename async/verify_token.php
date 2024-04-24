<?php
include('functions.php');

if(isset($_POST['code_token']) || isset( $_POST['mail'])){
    
  $code_token = escapeString($_POST['code_token']);
  $mail = escapeString($_POST['mail']);


   //fetch code token
   $query = "SELECT code_token FROM opti_users WHERE mail = '$mail'";
   $select_db_code = mysqli_query($connection,$query);
   checkQuery($select_db_code);
   while($row = mysqli_fetch_assoc($select_db_code)){
   $db_token = $row['code_token'];
   }

   if($select_db_code){

     if($db_token == $code_token){

    //assign session variable
    setSession($mail);

    successMsg("Logging In!!");
    //redirecting after 2seconds
    echo "<script type='text/javascript'>
    window.setTimeout(function() {
        window.location = '?page=dashboard';
    }, 2000);
    </script>";


  }else{
    failMsg('Verification code incorrect');
  }
   }
 
 




  

}

?>