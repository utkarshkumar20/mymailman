<?php
error_reporting(0);
ini_set('display_errors', '1');
$con = mysqli_connect('Localhost', 'tse', 'bPmtHasjyTJ2SgZJ', 'utkarsh') or die("connection failed");

if (isset($_POST['signup'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $RecEmail = $_POST['RecEmail'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];

<<<<<<< HEAD
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "http://hestalabs.com/tse/mymailman/pages/photo/" . $filename;
    move_uploaded_file($tempname, $folder);
=======


    $imgfile = $_FILES["uploadfile"]["name"];
    $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    if (!in_array($extension, $allowed_extensions)) {
        header('location:signup.php?image_err=Invalid format. Only jpg / jpeg/ png /gif format allowed');
    } else {
        //rename the image file
        $imgnewfile = md5($imgfile) . $extension;
        move_uploaded_file($_FILES["uploadfile"]["tmp_name"], "photo/" . $imgnewfile);
    }
>>>>>>> 4f7559f1d49518e29ff31547feb13683e2d3627b

    if ($email == '' || $fname == '' || $lname == '' || $RecEmail == '' || $password == '') {
        echo '<script>alert("please fill all field");</script>';
    } else {

        $query = "SELECT * FROM Signup_table WHERE Email='$email' || Username='$username'";
        $run = mysqli_query($con, $query);
        $data = mysqli_fetch_array($run);
        if (mysqli_num_rows($run) > 0) {
            echo '<script>alert("You are Already Registerd");</script>';
        } else {

            $code = rand(999999, 111111);
            $query = "INSERT INTO Signup_table (First_name,Last_name,Username,image,Email,sec_email,password,status,role,code)";
            $query .= " VALUES ('$fname','$lname','$username','$folder','$email','$RecEmail','$password','NULL','signup_table','$code')";
            $run = mysqli_query($con, $query);
            if ($run) {
                echo '<script type="text/javascript">';
                echo 'alert("user_registered_successfully!");';
                echo 'window.location.href = "index.php";';
                echo '</script>';
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("some error occur please signup again!");';
                echo 'window.location.href = "signup.php";';
                echo '</script>';
            }
        }
    }
}
