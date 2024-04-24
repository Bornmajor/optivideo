<?php
include('functions.php');

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

$mail= $_POST['mail'];


$mail = escapeString($mail);


//check if pwd and mail are not empty
if(!empty($mail)){
$query = "SELECT * FROM opti_users WHERE mail = '$mail'";
$select_user = mysqli_query($connection,$query);
checkQuery($select_user);

if(mysqli_num_rows($select_user) == 0){
failMsg('You do not have an account'.'<a href="?page=registration" class="alert-link"> register instead</a>');
return false;
}

//send new code token to mail and database
$new_code = generateVerificationCode(6);

//send mail code using mailersend api
$message = 'Here your verification code <b>'.$new_code.'</b>';
$html_content = templateBody($message,'OptiVideo company');

$mailersend = new MailerSend(['api_key' => 'mlsn.2c7028ba09be6907b5bfb8a33fe5acad0e441fcd7f7cab5847583d75bff9643a']);

$recipients = [
    new Recipient($mail, 'Your Client'),
];

$emailParams = (new EmailParams())
    ->setFrom('MS_3i2RY9@trial-x2p0347yzpy4zdrn.mlsender.net')
    ->setFromName('Optivideo app')
    ->setRecipients($recipients)
    ->setSubject('Subject')
    ->setHtml($html_content)
    ->setText('This is the text content')
    ->setReplyTo('MS_3i2RY9@trial-x2p0347yzpy4zdrn.mlsender.net')
    ->setReplyToName('reply to name');

$mailersend->email->send($emailParams);

$query = "UPDATE opti_users SET code_token = '$new_code' WHERE mail = '$mail'";
$update_token = mysqli_query($connection,$query);

//send new code to mail
if($update_token){
include('../includes/verify_token_form.php');     
}


}



?>