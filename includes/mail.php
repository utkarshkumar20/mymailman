<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);

try {
 
                  
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'utkarsh20.hestabit@gmail.com';                    
    $mail->Password   = 'iyljrtbgxtmadbkl';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

  
    $mail->setFrom('utkarsh20.hestabit@gmail.com', 'utkarsh Youtube');

    $mail->addAddress('utkarsh201994@gmail.com');             


    $mail->isHTML(true);                                 
    $mail->Subject = 'Here is the subject'.time();
    $mail->Body    = 'This is the HTML message body <b>in bold! hello uttkarsh welcome</b> <br> <h1><a href="forget.php" style="text-decoration:none ;">please reset your password</a></h1>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}