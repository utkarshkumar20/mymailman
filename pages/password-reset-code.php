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

  $code = mysqli_real_escape_string($con, $_POST['password_code']);


  if (!empty($code)) {
    if (!empty($password) && !empty($conpassword)) {
      $check_code = "SELECT code FROM Signup_table WHERE code='$code' LIMIT 1";
      $check_code_run = mysqli_query($con, $check_code);

      if (mysqli_num_rows($check_code_run) > 0) {
        if ($password == $conpassword) {
          $update_password = "UPDATE Signup_table SET password='$password' WHERE code='$code' LIMIT 1";
          $update_password_run = mysqli_query($con, $update_password);
          if ($update_password_run) {
            $_SESSION['status'] = "NEw password successfully update.!";
            header("location:password-change.php?code=$code");
            exit(0);
          } else {
            $_SESSION['status'] = "Did not Update Password,something went wrong.!";
            header("location:password-change.php?code=$code");
            exit(0);
          }
        } else {
          $_SESSION['status'] = "password and confirm password does not match";
          header("location:password-change.php?code=$code");
          exit(0);
        }
      } else {
        $_SESSION['status'] = " invalid code";
        header("location:password-change.php?code=$code");
        exit(0);
      }
    } else {
      $_SESSION['status'] = " all field are mendtory";
      header("location:password-change.php?code=$code");
      exit(0);
    }
  } else {
    $_SESSION['status'] = " No code Avilable";
    header("location:password-reset.php");
    exit(0);
  }
}
