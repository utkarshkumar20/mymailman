<?php
session_start();
error_reporting(0);
ini_set('display_errors', '1');
include('../includes/config.php');

// $con= mysqli_connect('Localhost', 'tse', 'bPmtHasjyTJ2SgZJ','utkarsh') or die("connection failed");

// $con = new mysqli("localhost", "root", "hestabit", "mailman") or die("connection failed");
// $id=$_GET['Id'];

if (isset($_POST['submit'])) {
    echo '<pre>';
    print_r($_POST);
    echo $fname = $_POST['fname'];
    echo $email = $_POST['email'];
    echo $recemail = $_POST['sec_email'];
    echo $username = $_POST['username'];
    echo $id=$_POST['id'];
    die();
    echo $query = "UPDATE Signup_table  SET First_name='$fname',Email='$email',sec_email='$recemail',Username='$username' where Id = '$id' ";
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
