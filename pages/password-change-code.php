 <?php
    session_start();
    include('../includes/config.php');

    if (isset($_POST['password_update'])) {
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
        $recemail = $_POST['RecEmail'];
        if ($_POST["password"] == $_POST["conpassword"]) {
            $query = "UPDATE Signup_table  SET password = '$password'  WHERE Username = '$recemail'";
            die("end here");
            $data = mysqli_query($con, $query);
            if ($data) {
                echo '<script type="text/javasczript">';
                echo 'alert("password successfully changed");';
                echo 'window.location.href = "index.php";';
                echo '</script>';
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Password is wrong");';
                echo 'window.location.href = "password-change.php";';
                echo '</script>';
            }
        }
    }



    ?> 