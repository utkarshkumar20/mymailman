<?php

// error_reporting(ALL);
// ini_set('display_errors', '1');
session_start();
// $con = mysqli_connect('Localhost', 'tse', 'bPmtHasjyTJ2SgZJ', 'utkarsh') or die("connection failed");
// $con = new mysqli("localhost", "root", "hestabit", "mailman") or die("connection failed");
include('../includes/config.php');



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['password_reset_link'])) {

  $email = $_POST['RecEmail'];
  $username=$_POST['username'];
  $mail = new PHPMailer(true);

  $sql = "SELECT * FROM Signup_table WHERE Username  = '$email' OR Email = '$email'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['sec_email'];
    $username = $row['Username'];
    $output = '<p>Dear user,</p>';
    $output .= '<p>Please click on the following link to reset your password.</p>';
    $output .= '<p>-------------------------------------------------------------</p>';
    $output .= '<p><a href="http://hestalabs.com/tse/mymailman/pages/password-change.php?RecEmail=' . base64_encode($username) . '&action=reset "target="_blank">Reset Link</a></p>';
    $output .= '<p>-------------------------------------------------------------</p>';
    $output .= '<p>Please be sure to copy the entire link into your browser.The link will expire after 1 day for security reason.</p>';
    $output .= '<p>If you did not request this forgotten password email, no action is needed, your password will not be reset. However, you may want to log into your account and change your security password as someone may have guessed it.</p>';
    $output .= '<p>Thanks,</p>';
    $output .= '<p>please support</p>';
    $body = $output;
    // $subject = "Password Recovery - AllPHPTricks.com";
    // try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'utkarsh20.hestabit@gmail.com';
    $mail->Password   = 'phkyovmcfekrehfu';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;


    $mail->setFrom('utkarsh20.hestabit@gmail.com', 'verification code from mailman');

    $mail->addAddress($email, 'otp verfication');
    // http://hestalabs.com/tse/mymailman/pages/password-change.php



    $mail->isHTML(true);
    $mail->Subject = 'password verification code' . time();
    $mail->Body = $body;

    // $mail->AltBody = '';

    $mail->send();
    $_SESSION['status'] = "Message has been sent to the users!";
    $_SESSION['status_code'] = "success";
    header('Location:index.php');
  
  } else {
    $_SESSION['status'] = "Email Not Found! please try again";
    $_SESSION['status_code'] = "error";
    header('Location:password-reset.php');
      
  }
  // catch (Exception $e) {
}

?>