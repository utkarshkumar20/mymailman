<?php
session_start();
error_reporting(0);
ini_set('display_errors', '1');
include('../includes/config.php');

// $con= mysqli_connect('Localhost', 'tse', 'bPmtHasjyTJ2SgZJ','utkarsh') or die("connection failed");

// $con = new mysqli("localhost", "root", "hestabit", "mailman") or die("cnnection failed");
// $id=$_GET['Id'];

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $recemail = $_POST['sec_email'];
    $username = $_POST['username'];
    $id = $_SESSION['id'];
    echo $con;
    echo $query = "UPDATE Signup_table  SET First_name='$fname',Email='$email',sec_email='$recemail',Username='$username' where Id = '$id' ";
    die(00);
    $data = mysqli_query($con, $query);
    if ($data) {
        echo '<script type="text/javascript">';
        echo 'alert("Record update");';
        echo 'window.location.href = "profile.php";';
        echo '</script>';
        // die(000);
        // exit(0);
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Record update failed");';
        echo 'window.location.href = "Editprofile.php";';
        echo '</script>';
        // echo "failed";
    }
}
