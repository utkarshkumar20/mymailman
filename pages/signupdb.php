<?php
error_reporting(0);
ini_set('display_errors', '1');
$con = mysqli_connect('Localhost', 'tse', 'bPmtHasjyTJ2SgZJ', 'utkarsh') or die("connection failed");

if (isset($_POST['signup'])) {
    $fname = $_POST['fname'];
    //    echo "<br>";
    $lname = $_POST['lname'];
    //    echo "<br>";
    $username = $_POST['username'];
    //    echo "<br>";
    $email = $_POST['email'];
    //    echo "<br>"; 
    $RecEmail = $_POST['RecEmail'];
    // echo "<br>";
    $password = $_POST['password'];
    //    echo "<br>";
    // $token=$_POST['verify_token'];
    // $status=$_POST['status'];
    $passwordconfirm = $_POST['passwordconfirm'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "photo/" . $filename;
    move_uploaded_file($tempname, $folder);

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
