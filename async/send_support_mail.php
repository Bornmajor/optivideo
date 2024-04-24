<?php
include('functions.php');


use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

$mail = $_POST['mail'];
$subject = $_POST['subject'];
$message = $_POST['message'];

;

//send mail code using mailersend api
$html_content = templateBody($message,$mail);
$mailersend = new MailerSend(['api_key' => 'mlsn.2c7028ba09be6907b5bfb8a33fe5acad0e441fcd7f7cab5847583d75bff9643a']);

$recipients = [
    //it goes
    new Recipient('osbornmaja@gmail.com', 'Your Client'),
];

$emailParams = (new EmailParams())
    ->setFrom('MS_3i2RY9@trial-x2p0347yzpy4zdrn.mlsender.net')
    ->setFromName('Optivideos support')
    ->setRecipients($recipients)
    ->setSubject($subject)
    ->setHtml($html_content)
    ->setText('This is the text content')
    ->setReplyTo('MS_3i2RY9@trial-x2p0347yzpy4zdrn.mlsender.net')
    ->setReplyToName('reply to name');

    

$mailersend->email->send($emailParams);

successMsg("Thank you for contacting support! We have received your request and will respond within 24 business hours.");

?>