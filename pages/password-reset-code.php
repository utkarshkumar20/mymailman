<?php

// error_reporting(ALL);
// ini_set('display_errors', '1');
session_start();

$con = new mysqli("localhost", "root", "hestabit", "mailman") or die("connection failed");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Load Composer's autoloader
$link = "<a href='http://localhost/project3/pages/password-change.php?code=$code'>Click To Reset password</a>";

function send_password_reset($get_name,$get_email,$code)
{
  require 'vendor/autoload.php';

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'utkarsh20.hestabit@gmail.com';
  $mail->Password   = 'iyljrtbgxtmadbkl';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port       = 465; 
   
  
  
  $mail->setFrom('utkarsh20.hestabit@gmail.com', "$get_name");
  
  $mail->addAddress($get_email,'otp verfication');

  
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = "Reset Password Notification";
  $email_template="
  <h2>Hello</h2>
  <h3>You are receving email Becouse we Received a password Reset Request fir your account.</h3>
  <br/><br/>
  <a href='http://localhost/project3/pages/password-change.php?code=$code'>Click me</a> ";
  $mail->Body=$email_template;
}
if(isset($_POST['password_reset_link']))
{
  // print_r($_POST);
  $email=mysqli_real_escape_string($con,$_post['RecEmail']);
  $code=md5(rand());
  $check_email = $_POST['RecEmail'];
  
  $check_mail="SELECT sec_email,Username FROM Signup_table where sec_email='$check_email' LIMIT 1";
  $check_email_run=mysqli_query($con,$check_mail);
  
  
  if(mysqli_num_rows($check_email_run)>0)
  {
    $row=mysqli_fetch_array($check_email_run);
    $get_name=$row['Username'];
    $get_email=$row['sec_email'];
    
    $update_code="UPDATE Signup_table SET code = '$code' WHERE sec_email='$get_email' LIMIT 1" ;
    $update_code_run=mysqli_query($con,$update_code);
    
    if($update_code_run)
    {
      send_password_reset($get_name,$get_email,$code);
      $_SESSION['status']="we Emailed you a password reset link";
      header("location:password-reset.php");
      exit(0);
      
    }
  }
  else{
    $_SESSION['status']="something went wrong #1";
    header("location:password-reset.php");
    exit(0);
  }
  
} 
else
{
  $_SESSION['status']='no Email found';
  header("location:password-reset.php");
  exit(0);
}
// die(" ffffffffffff");
// *****************************************password-change*****************************************************
if(isset($_POST['password_update'])){
  $password=mysqli_real_escape_string($con,$_POST['password']);
  $conpassword=mysqli_real_escape_string($con,$_POST ['conpassword']);
  
  $code=mysqli_real_escape_string($con,$_POST['password_code']);
  

  if(!empty($code))
  {
    if(!empty($password) && !empty($conpassword))
    {
      $check_code="SELECT code FROM Signup_table WHERE code='$code' LIMIT 1";
      $check_code_run=mysqli_query($con,$check_code);

      if(mysqli_num_rows($check_code_run)>0)
      {
        if($password==$conpassword)
        {
          $update_password="UPDATE Signup_table SET password='$password' WHERE code='$code' LIMIT 1";
          $update_password_run=mysqli_query($con,$update_password);
          if($update_password_run)
          {
            $_SESSION['status']= "NEw password successfully update.!";
            header("location:password-change.php?code=$code");
            exit(0);
      
          }else
          {
            $_SESSION['status']= "Did not Update Password,something went wrong.!";
            header("location:password-change.php?code=$code");
            exit(0);
      
            
          }
        }
        else
      {
      $_SESSION['status']= "password and confirm password does not match";
      header("location:password-change.php?code=$code");
      exit(0);
      }

      }
      else
      {
      $_SESSION['status']= " invalid code";
      header("location:password-change.php?code=$code");
      exit(0);
      }

    }
    else
    {
      $_SESSION['status']= " all field are mendtory";
      header("location:password-change.php?code=$code");
      exit(0);
    }
  }
  else
  {
    $_SESSION['status']= " No code Avilable";
    header("location:password-reset.php");
    exit(0);
  }
}








// $email = $_POST['RecEmail'];
// $sql ="select * from Signup_table where sec_email = '$email'";

// $result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
// if (mysqli_num_rows($result) > 0)
// {
    
//   echo "message pass";


// }else{
    
//     echo "message does not send";
//     header("location:password-reset.php");
//     exit(0);
// }
?>