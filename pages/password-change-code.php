 <?php
    include('../includes/config.php');
    session_start();

    if (isset($_POST['password_update'])) {
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
        $recemail = $_POST['RecEmail'];
        if ($_POST["password"] == $_POST["conpassword"]) {
            $query = "UPDATE Signup_table  SET password = '$password'  WHERE Username = '$recemail' ";
            $data = mysqli_query($con, $query);
            if ($data) {
                $_SESSION['status'] = "password successfully changed";
                $_SESSION['status_code'] = "success";
                header('Location:index.php');
                // echo '<script type="text/javascript">';
                // echo 'alert("password successfully changed");';
                // echo 'window.location.href = "index.php";';
                // echo '</script>';
            } else {
                $_SESSION['status'] = "Password is wrong or not matched";
                $_SESSION['status_code'] = "error";
                header('Location:password-change.php');
                // die("end here"); 
                // echo '<script type="text/javascript">';
                // echo 'alert("Password is wrong");';
                // echo 'window.location.href = "password-change.php";';
                // echo '</script>';
            }
        }
    }
    ?> 