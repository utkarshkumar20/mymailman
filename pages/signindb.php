<?php
session_start();
// error_reporting(0);
// ini_set('display_errors', '1');
$con = new mysqli("localhost", "root", "hestabit", "mailman") or die("connection failed");
include('../includes/config.php');
$email = $_POST['email'];
$username=$_POST['username'];
$password = $_POST['password'];

if (isset($_POST['sublogin'])) {
    // echo "okkk";
     $sql = "SELECT * FROM Signup_table WHERE Email = '$email'  AND password ='$password' ";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = $result->fetch_assoc();
        // echo "<pre>";
        // print_r(($user)); 
        // die("ghhg");
        $_SESSION["id"] = $user['Id'];
        $_SESSION["username"] = $user['Username'];
        $_SESSION["email"] = $user['Email'];
        $_SESSION["secemail"] = $user['sec_email'];
        $_SESSION["fname"] = $user['First_name'];
        $_SESSION["photo"]=$user['image'];


        // $_SESSION["Username"] = $username;
        // $_SESSION["Email"] = $email;
        header("Location:dashboard.php");
    } else {
        echo '<script>alert("failed");</script>';
    }
}
?>