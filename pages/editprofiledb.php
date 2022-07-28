<?php
session_start();
error_reporting(0);
ini_set('display_errors', '1');
include('../includes/config.php');

// echo " password ----".$dbPassword;
// die(" ttttttttttttttttttttttttt ");
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname =$_POST['lname'];
    // $email = $_POST['email'];
    $recemail = $_POST['sec_email'];
    // $username = $_POST['username'];
    $id = $_SESSION['id'];

    if (!empty($_FILES['uploadfile'])) { //User uploaded new image
        $name = $_FILES['uploadfile']['name'];
        $imgnewfile = time() . "-" . $name;
        if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], "./photo/" . $imgnewfile)) {
            $user_image = $imgnewfile;

            $update_product = "UPDATE Signup_table  SET First_name='$fname',Last_name='$lname',sec_email='$recemail',image='$user_image' where Id = '$id' ";
        } else { //User did not upload image
            $update_product = "UPDATE Signup_table  SET First_name='$fname',Last_name='$lname',sec_email='$recemail' where Id = '$id' ";
        }
    }


    $data = mysqli_query($con, $update_product);
    if ($data) {
        $_SESSION['status'] = "Record has been updated";
        $_SESSION['status_code'] = "success";
        header('Location:profile.php');
    } else {
        $_SESSION['status'] = "Record update failed";
        $_SESSION['status_code'] = "error";
        header('Location:Editprofile.php');
    }
}
