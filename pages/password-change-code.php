 <?php
    session_start();
    include('../includes/config.php');

    if (isset($_POST['password_update'])) {
        // echo "<pre>";
        //         print_r($_POST);
             $password = $_POST['password'];
            // echo "<br>";
             $conpassword = $_POST['conpassword'];
            // echo "<br>";
             $recemail = $_POST['RecEmail'];
            // echo "<br>";
             $code = md5(rand());
            
            if ($_POST["password"] == $_POST["conpassword"]) {
                 $query = "UPDATE Signup_table  SET password = $password  WHERE sec_email = '$recemail',code='$code' LIMIT 1";
                // die("end here");
                $data = mysqli_query($con, $query);
                if ($data) {
                    echo '<script type="text/javascript">';
                    echo 'alert("password successfully changed");';
                    echo 'window.location.href = "index.php";';
                    echo '</script>';
                    // echo "alert('Record update')";
                    // header("location:profile.php");
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Password is wrong");';
                    echo 'window.location.href = "password-change.php";';
                    echo '</script>';
                }
            }
        }
    


    ?> 