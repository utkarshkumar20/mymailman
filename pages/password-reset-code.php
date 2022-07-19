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

  $sql = "SELECT * FROM Signup_table WHERE sec_email = '$email',Username='$username'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {


    $output = '<p>Dear user,</p>';
    $output .= '<p>Please click on the following link to reset your password.</p>';
    $output .= '<p>-------------------------------------------------------------</p>';
    $output .= '<p><a href="http://hestalabs.com/tse/mymailman/pages/password-change.php?RecEmail=' . base64_encode($email) . '&action=reset "target="_blank">Reset Link</a></p>';
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

    echo '<script type="text/javascript">';
    echo 'alert("message has been sent to the users!");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
    // echo '<script>alert("message has been sent to the users")</script>';
    // header("location:index.php");
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Email Not Found! please try again");';
    echo 'window.location.href = "password-reset.php";';
    echo '</script>';
    // echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")</script>';
    // header("location:password-reset.php");
  }
  // catch (Exception $e) {
}
// }

// 
// *****************************************password-change*****************************************************
// if (isset($_POST['password_update'])) {
//   // print_r($_POST);   
//   $password = mysqli_real_escape_string($con, $_POST['password']);
//   $conpassword = mysqli_real_escape_string($con, $_POST['conpassword']);
//   // $username = $_SESSION["username"];/* userid of the user */
//   $email = $_POST(['RecEmail']);
//   if (count($_POST) > 0) {
//     echo $result = mysqli_query($con, "SELECT * FROM signup_table WHERE Sec_email = $email ");
//     $row = mysqli_fetch_array($result);
//     if ($_POST["password"] == $_POST["conpassword"]) {
//       echo "UPDATE signup_table SET password = $password  WHERE Username = $username "; die(" query ");
//       die(" ffffffffffff");
      
//       mysqli_query($con, "UPDATE signup_table SET password = $password  WHERE Sec_email = $email ");
//       echo '<script type="text/javascript">';
//       echo 'alert("password successfully changed");';
//       echo 'window.location.href = "index.php";';
//       echo '</script>';
//       // $message = "Password Changed Sucessfully";
//       // var_dump($message);
//       // die();
//     } else {
//       echo '<script type="text/javascript">';
//       echo 'alert("Password is wrong");';
//       echo 'window.location.href = "password-change.php";';
//       echo '</script>';
//     }
//   }
// }
?>