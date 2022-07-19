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
                echo '<script type="text/javasczript">';
                echo 'alert("password successfully changed");';
                die("end here"); 
                // echo 'window.location.href = "index.php";';
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