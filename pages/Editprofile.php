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

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/dasboard.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script src="https://kit.fontawesome.com/2079f2e470.js" crossorigin="anonymous"></script>
    <!-- <link href="navbar-top-fixed.css" rel="stylesheet"> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

    </style>
    <title>editprofile</title>
</head>

<body>
    <!-- ******************************************************************************************************** -->
    <!-- header -->
    <nav class="navbar navbar-expand-sm fixed-top bg-primary justify-content-around">
        <div class="container-fluid ">
            <div class="col-md-1 ">
                <a class="navbar-brand" href="dashboard.php"><img src="../image/logo1.png" alt="" width="100%" height="50"></a>
            </div>
            <div class="col-md-2 "></div>
            <div class="col-md-6">
                <form class="form-outline d-flex gap-1 d-md-flex">
                    <input class="form-control border border-primary rounded-pill" role="search" id="form1" type="search" placeholder="Search" aria-label="Search" />
                    <span class="input-group-text border-0 rounded-pill" id="search-addon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </form>
            </div>

            <nav class="navbar navbar-dark ">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <div class="collapse navbar-collapse justify-content-md-end" id="navbarCollapse">
                <div class="col-md-8 ">
                    <form class="d-flex d-grid gap-1 d-md-flex ">
                        <li type="button" class="nav-item dropdown btn btn-sm  ">
                            <a class="form-control nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $user_data['Username']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <li><a class="dropdown-item" href="Editprofile.php">Edit profile</a></li> -->
                                <li><a class="dropdown-item" href="logout.php">logout</a></li>
                            </ul>
                        </li>
                        <a href="#"><img src="./photo/<?php echo $user_data['image']; ?>" alt="profile_photo" width="50px" style="border-radius:50%"></a>
                        <span id="photos" class="text-danger"><?php echo $_GET['image_err']; ?></span>
                    </form>
                </div>
            </div>
    </nav>

    </nav>

    <!-- ******************************************************************************************************** -->
    <div class="container">
        <div class="row" id="box">
            <div class="col-md-2 col-sm-4 col-xs-12"></div>
            <div class="col-md-8 col-sm-4 col-xs-12" id="profile">
                <form action="editprofiledb.php" method="post" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-md-8 order-2 order-md-1">
                            <div>
                                <h3 class="d-flex justify-content">Profile</h3>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Your Name" value="<?php echo $user_data['First_name']; ?>" autocomplete="off">
                                <span id="yourname" class="text-danger"></span>
                            </div>
                            <br>
                            <div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email(primary)" value="<?php echo $user_data['Email']; ?>" autocomplete="off">
                                <span id="emailid" class="text-danger"></span>
                            </div>
                            <br>
                            <div>
                                <input type="email" class="form-control" name="sec_email" id="sec_email" placeholder="Email(secondary)" value="<?php echo $user_data['sec_email']; ?>" autocomplete="off">
                                <span id="secemail" class="text-danger"></span>
                            </div>
                            <br>
                            <div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $user_data['Username']; ?>" autocomplete="off">
                                <span id="usernames" class="text-danger"></span>
                            </div>
                            <br>
                            <!-- <input type="hidden" name="id" value="<?php ?>" /> -->
                            <div class="col-4 d-flex">
                                <input type="submit" name="submit" onclick="return validation();" class="btn btn-success" value="Edit-Profile">

                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2 order-1 order-md-2 ">
                            <div id="profile-container">
                                <div class="col-md-4 order-1 order-md-2 ">
                                    <img src="./photo/<?php echo $user_data['image']; ?>" alt="profile_photo" width="100%" style="border-radius:50%">
                                </div>
                            </div>
                            <br>
                            <label for="imageupload" class="btn btn-danger offset-4">Change picture</label> 
                            <input type="file" name="uploadfile" id="imageupload" capture />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-12"></div>
        </div>
    </div>

    <!-- *************************************************validation************************************************* -->
    <script>
        function validation() {
            // alert("uuuuu");
            var name = document.getElementById('fname').value;
            var email = document.getElementById('email').value;
            var sec_email = document.getElementById('sec_email').value;
            var username = document.getElementById('username').value;

            first_name = '';
            user_name = '';
            user_email = '';
            r_email = '';
            name_pattern = /^([a-zA-Z' ]+)$/

            if (name == "") {
                document.getElementById('yourname').innerHTML = " **please fill the Firstname field";
                first_name = false;
            } else if ((name.length <= 2) || (name.length >= 20)) {
                document.getElementById('yourname').innerHTML = " **firstname must be between 2 to 20";
                first_name = false;

            } else if (!name_pattern.test(name)) {
                document.getElementById('yourname').innerHTML = " **invalid First name Given";
                first_name = false;
            } else {
                document.getElementById('yourname').innerHTML = "";
                first_name = true;
            }

            // ***********************************************************************
            if (username == "") {
                document.getElementById('usernames').innerHTML = " **please fill the username field";
                user_name = false;
            } else if ((username.length <= 2) || (username.length >= 20)) {
                document.getElementById('usernames').innerHTML = " **username must be between 2 to 20";
                user_name = false;
            } else if (!name_pattern.test(username)) {
                document.getElementById('usernames').innerHTML = " **invalid user-name Given";
                user_name = false;

            } else {
                document.getElementById('usernames').innerHTML = "";
                user_name = true;
            }

            // ******************************************************************
            if (email == "") {
                document.getElementById('emailid').innerHTML = " **please fill the Email field";
                user_email = false;

                // return false;
            } else if ((email.length <= 2) || (email.length >= 40)) {
                document.getElementById('emailid').innerHTML = " **username must be between 2 to 40";
                user_email = false;

                // return false;
            } else if (email.indexOf('@') <= 0) {
                document.getElementById('emailid').innerHTML = " **@ invalid email id";
                user_email = false;

                // return false;
            } else {
                document.getElementById('emailid').innerHTML = "";
                user_email = true;
            }
            // ************************************************************************
            if (sec_email == "") {
                document.getElementById('secemail').innerHTML = " **please fill the secondary mail field";
                r_email = false;
            } else if (sec_email.indexOf('@') <= 0) {
                document.getElementById('secemail').innerHTML = " **@ invalid postion";
                r_email = false;

                // return false;
            } else if ((sec_email.charAt(sec_email.length - 4) != '.') && (sec_email.charAt(sec_email.length - 3) != '.')) {
                document.getElementById('secemail').innerHTML = " **please fill the Email field";
                r_email = false;

                // return false;
            } else {
                document.getElementById('secemail').innerHTML = "";
                r_email = true;
            }



            if (first_name != true || user_name != true || user_email != true || r_email != true) {
                // alert("some error occur! please retry!");
                return false;
            }


        }
    </script>

    <!-- ************************************************validation******************************************* -->
    <!-- 
    <script>
        function validation() {

            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var sec_email = document.getElementById('sec_email').value;
            var username = document.getElementById('username').value;

            if (name == "") {
                document.getElementById('yourname').innerHTML = " **please fill the name field";
                return false;
            } else if ((name.length <= 2) || (name.length >= 20)) {
                document.getElementById('yourname').innerHTML = " **name must be between 2 to 20";
                return false;
            } else if (!isNaN(name)) {
                document.getElementById('yourname').innerHTML = " **only character are allowed";
                return false;
            } else {
                document.getElementById('yourname').innerHTML = "";
            }
            // ************************************************************
            if (email == "") {
                document.getElementById('emailid').innerHTML = " **please fill the Email field";
                return false;
            } else if ((email.length <= 2) || (email.length >= 20)) {
                document.getElementById('emailid').innerHTML = " **username must be between 2 to 20";
                return false;
            } else if (email.indexOf('@') <= 0) {
                document.getElementById('emailid').innerHTML = " **@ invalid email name";
                return false;
            } else if ((email.charAt(email.length - 4) != '.') && (email.charAt(email.length - 3) != '.')) {
                document.getElementById('emailid').innerHTML = " **please fill the Email field";
                return false;
            } else {
                document.getElementById('emailid').innerHTML = "";

            }
            // ****************************************************************************************
            if (sec_email == "") {
                document.getElementById('sec_emailid').innerHTML = " **please fill the secondary Email field";
                return false;
            } else if ((sec_email.length <= 2) || (sec_email.length >= 20)) {
                document.getElementById('sec_emailid').innerHTML = " **username must be between 2 to 20";
                return false;
            } else if (sec_email.indexOf('@') <= 0) {
                document.getElementById('sec_emailid').innerHTML = " **@ invalid email name";
                return false;
            } else if ((sec_email.charAt(email.length - 4) != '.') && (email.charAt(email.length - 3) != '.')) {
                document.getElementById('sec_emailid').innerHTML = " **please fill the Email field";
                return false;
            } else {
                document.getElementById('sec_emailid').innerHTML = "";

            }
            // ****************************************************************************************
            if (username == "") {
                document.getElementById('usernames').innerHTML = " **please fill the username field";
                return false;
            } else if ((username.length <= 2) || (username.length >= 20)) {
                document.getElementById('usernames').innerHTML = " **username must be between 2 to 20";
                return false;
            } else {
                document.getElementById('usernames').innerHTML = "";

            }



        }
    </script> -->
    <!-- ******************************************************************************************************** -->

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