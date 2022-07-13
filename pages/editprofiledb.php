<?php
error_reporting(0);
ini_set('display_errors', '1');

$con = new mysqli("localhost", "root", "hestabit", "mailman") or die("connection failed");
// $id=$_GET['Id'];

if (isset($_POST['submit'])) {
    echo $fname = $_POST['fname'];
    // echo "<br>";
    echo $email = $_POST['email'];
    // echo "<br>";
    echo $recemail = $_POST['sec_email'];
    // echo "<br>";
    echo $username = $_POST['username'];
    // echo "<br>";
    echo $code = md5(rand());

    $query = "UPDATE Signup_table  SET First_name='$fname',Email='$email',sec_email='$recemail',Username='$username' where code='$code' LIMIT 1";
    $data = mysqli_query($con, $query);
    if ($data) {
        echo "alert('Record update')";
        header("location:profile.php");
        die(000);
        exit(0);
    } else {
        echo "failed";
    }
}
