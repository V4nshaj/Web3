<!-- automatically send a mail for eg when a user submits a form -->
<?php
$emailTo = "barnwalaryan33@gmail.com";
$subject = "I hope it works!";
$body = "I think you are great!";
$header = "admin@vanshajbarnwal.com";

if(mail($emailTo, $subject, $body, $header)){
    echo "The email has been successfully sent";
}
else{
    echo "The email could not be sent";
}