<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../includes/config.php');

if (isset($_POST['signup'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $RecEmail = $_POST['RecEmail'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];

    $imgfile = $_FILES["uploadfile"]["name"];
    $extension = pathinfo($imgfile, PATHINFO_EXTENSION);
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($extension, $allowed_extensions)) {
        header('location:signup.php?image_err=Invalid format. Only jpg / jpeg/ png /gif format allowed');
    } else {
        //rename the image file
        $imgnewfile = time() . "-" . $imgfile;
        if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], "./photo/" . $imgnewfile)) {
            $user_image = $imgnewfile;
            echo "";
        } else {
            echo "not uploaded";
        }
    }

    if ($email == '' || $fname == '' || $lname == '' || $RecEmail == '' || $password == '') {
        echo '<script>alert("please fill all field");</script>';
    } else {
        $query = "SELECT * FROM Signup_table WHERE Email='$email' || Username='$username'";
        $run = mysqli_query($con, $query);
        $data = mysqli_fetch_array($run);
        if (mysqli_num_rows($run) > 0) {
            $_SESSION['status'] = "You are Already Registerd";
            $_SESSION['status_code'] = "error";
            header('Location:signup.php');
        } else {
            $code = rand(999999, 111111);
            $query = "INSERT INTO Signup_table (First_name,Last_name,Username,image,Email,sec_email,password,status,role,code)";
            $query .= " VALUES ('$fname','$lname','$username','$user_image','$email','$RecEmail','$password','NULL','signup_table','$code')";
            $run = mysqli_query($con, $query);
            if ($run) {
                $_SESSION['status'] = "user_registered_successfully";
                $_SESSION['status_code'] = "success";
                header('Location:index.php');
            } else {
                $_SESSION['status'] = "some error occur please signup again!";
                $_SESSION['status_code'] = "error";
                header('Location:signup.php');
            }
        }
    }
}

?>