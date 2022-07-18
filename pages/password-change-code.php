 <?php
 session_start();
 // $con = mysqli_connect('Localhost', 'tse', 'bPmtHasjyTJ2SgZJ', 'utkarsh') or die("connection failed");
 // $con = new mysqli("localhost", "root", "hestabit", "mailman") or die("connection failed");
 include('../includes/config.php');
 
    if (isset($_POST['password_update'])) {
        print_r($_POST);   
        if (isset($_POST['submit'])) {
            echo $password = $_POST['password'];
            // echo "<br>";
            echo $conpassword = $_POST['conpassword'];
            // echo "<br>";
            echo $recemail = $_POST['RecEmail'];
            // echo "<br>";
            // echo $username = $_POST['username'];
            // // echo "<br>";
            echo $code = md5(rand());
            die(000);
            exit(0);

            if ($_POST["password"] == $_POST["conpassword"]) {
                $query = "UPDATE Signup_table  SET password = $password  WHERE Sec_email = '$recemail',code='$code' LIMIT 1";
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
    }

    //     $password = mysqli_real_escape_string($con, $_POST['password']);
    //     $conpassword = mysqli_real_escape_string($con, $_POST['conpassword']);
    //     $email = $_POST(['RecEmail']);
    //     if (count($_POST) > 0) {
    //         // die(" ffffffffffff");
    //         echo $result = mysqli_query($con, "SELECT * FROM  Signup_table WHERE Sec_email = $email");
    //         $row = mysqli_fetch_array($result);
    //         if ($_POST["password"] == $_POST["conpassword"]) {
    //             // echo "UPDATE signup_table SET password = $password  WHERE Username = $username "; die(" query ");

    //             mysqli_query($con, "UPDATE  Signup_table SET password = $password  WHERE Sec_email = $email ");
    //             echo '<script type="text/javascript">';
    //             echo 'alert("password successfully changed");';
    //             echo 'window.location.href = "index.php";';
    //             echo '</script>';
    //         } else {
    //             echo '<script type="text/javascript">';
    //             echo 'alert("Password is wrong");';
    //             echo 'window.location.href = "password-change.php";';
    //             echo '</script>';
    //         }
    //     }
    // }
    // $con= mysqli_connect('Localhost', 'tse', 'bPmtHasjyTJ2SgZJ','utkarsh') or die("connection failed");

    // // $con = new mysqli("localhost", "root", "hestabit", "mailman") or die("connection failed");
    // session_start();



    // $username = $_SESSION["Username"];/* userid of the user */
    // $con = mysqli_connect('localhost','root','hestabit','mailman') or die('Unable To connect');
    // if(count($_POST)>0) {
    //     $result = mysqli_query($con,"SELECT *from signup_table WHERE Username='" . $username . "'");
    //     $row=mysqli_fetch_array($result);
    //     if( $_POST["password"] == $row["conpassword"] ) {
    //         mysqli_query($con,"UPDATE signup_table set password='" . $_POST["password"] . "' WHERE Username='" . $username . "'");
    //         $message = "Password Changed Sucessfully";
    //         var_dump($message);
    //         die();
    // } else{
    //  $message = "Password is not correct";
    // }
    // }
    ?> 