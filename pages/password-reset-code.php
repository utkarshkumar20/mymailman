<?php

// error_reporting(ALL);
// ini_set('display_errors', '1');
session_start();
$con = mysqli_connect('Localhost', 'tse', 'bPmtHasjyTJ2SgZJ', 'utkarsh') or die("connection failed");

// $con = new mysqli("localhost", "root", "hestabit", "mailman") or die("connection failed");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['password_reset_link'])) {
  $email = $_POST['RecEmail'];
  $mail = new PHPMailer(true);

  $sql = "SELECT * FROM Signup_table WHERE sec_email = '$email'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) > 0) {
    // $user = $result->fetch_assoc();
    // echo "<pre>";
    // print_r(($user)); 
    // die("ghhg");
    // $_SESSION[""] = $user['Id'];

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


    $mail->isHTML(true);
    $mail->Subject = 'password verification code' . time();
    $mail->Body    = '<b> hello utkarsh welcome, please click on this message</b><a href="http://hestalabs.com/tse/mymailman/pages/password-change.php">reset password</a>';
    // $mail->AltBody = '';

    $mail->send();

    echo '<script>alert("message has been sent to the users")</script>';
    header("location:index.php");
  } else {
    echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")</script>';
    header("location:password-reset.php");
  }
  // catch (Exception $e) {
}
// }

// die(" ffffffffffff");
// *****************************************password-change*****************************************************
if (isset($_POST['password_update'])) {
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $conpassword = mysqli_real_escape_string($con, $_POST['conpassword']);
  $username = $_SESSION["Username"];/* userid of the user */
  if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT * from signup_table WHERE Username = $username ");
    $row = mysqli_fetch_array($result);
    if ($_POST["password"] == $_POST["conpassword"]) {
      mysqli_query($con, "UPDATE signup_table set password = $password  WHERE Username = $username ");
      echo '<script type="text/javascript">';
      echo 'alert("password successfully changed");';
      echo 'window.location.href = "index.php";';
      echo '</script>';
      // $message = "Password Changed Sucessfully";
      // var_dump($message);
      // die();
    } else {
      echo '<script>alert("Password is not correct")</script>';
    }
  }
}



?>