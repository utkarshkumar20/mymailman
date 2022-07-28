<?php
session_start();

include('../includes/config.php');

// if (isset($_GET["id"])) {
//     $id = base64_decode($_GET["id"]);
//     $query = mysqli_query($con, "SELECT * FROM Signup_table WHERE Id='" . $id . "';");
// }

$user_id = $_SESSION['id'];
$query = "SELECT * FROM Signup_table where id = '$user_id'";
$result = mysqli_query($con, $query);
// var_dump($result);
if (mysqli_num_rows($result) > 0) {
    $user_data = $result->fetch_assoc();
}
if (!isset($_SESSION['id'])) {
    header("location:editpassword.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/2079f2e470.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>forget!</title>
</head>

<body>
    <!-- ******************************************************************************************************** -->
    <nav class="navbar navbar-success bg-primary">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="#">
                <img src="../image/logo1.png" alt="" width="100%" height="50" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <!-- ******************************************************************************************************** -->
    <!-- onsubmit="return validation()" -->
    <div class="container">
        <div class="row" id="box">
            <div class="col-md-1 col-sm-1 col-xs-12"></div>
            <div class="col-md-5 col-sm-5 col-xs-12" id="form-box-1">
                <form action="editpassworddb.php" method="POST" autocomplete="off">
                    <!-- <input type="hidden" name="password_code"> -->
                    <!-- <input type="hidden" name="action" value="update" /> -->

                    <h3 class="d-flex justify-content">Change password</h3>

                    <div class="col-md-11 d-flex">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter the new password" autocomplete="off" required />
                        <span>
                            <!-- <i class="far fa-question-circle offset-11"></i></span> -->
                    </div>
                    <span id="pass" class="text-danger"></span>
                    <br>
                    <div class="col-md-11">

                        <input type="password" class="form-control" name="conpassword" id="conpassword" placeholder="Confirm-Password" autocomplete="off" required />
                        <span id="conpass" class="text-danger"></span>
                    </div>
                    <br>
                    <input type="hidden" name="username" value="<?php echo $user_data['Username'];  ?>" />
                    <input type="submit" onclick="return validation();" name="password_update" value="Reset Password" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <img src="../image/password.gif" class="mx-auto pt-0 d-block " alt="cover" width="100%">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-12"></div>
        </div>

    </div>


    <!-- ******************************************************************************************************************************* -->

    <script>
        function validation() {

            var password = document.getElementById('password').value;
            var conpassword = document.getElementById('conpassword').value;

            if (password != conpassword) {
                document.getElementById('pass').innerHTML = " ** password not match"
                return false;
            } else if ((password.length <= 5) || (password.length >= 20)) {
                document.getElementById('pass').innerHTML = " **password must be between 5 to 20";
                return false;
            } else if (password == "") {
                document.getElementById('pass').innerHTML = " **please fill the password field";
                return false;
            }


        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/sweetalert.js"></script>

    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "ok",
            });
        </script>
    <?php  }
    unset($_SESSION['status']);
    ?>



</body>

</html>