<?php
// $con = new mysqli("localhost", "root", "hestabit", "mailman") or die("connection failed");
require('../includes/config.php');

session_start();
// print_r($_SESSION);

$user_id = $_SESSION['id'];
 $query = "SELECT * FROM signup_table where id = '$user_id'";
$result = mysqli_query($con, $query);
var_dump($result);
if (mysqli_num_rows($result) > 0) {
    $user_data = $result->fetch_assoc();
echo "<pre>";
print_r(($user_data));
die(" hh ");
}
die("this example");

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
    <title>profile!</title>
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
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <li><a class="dropdown-item" href="Editprofile.php">Edit profile</a></li> -->
                                <li><a class="dropdown-item" href="logout.php">logout</a></li>
                            </ul>
                        </li>
                        <a href="#"><img src="./photo/<?php echo $_SESSION["photo"]; ?>" alt="profile_photo" width="50px" style="border-radius:50%"></a>
                    </form>
                </div>
            </div>
    </nav>

    <!-- ******************************************************************************************************** -->
    <div class="container">
        <div class="row" id="box">
            <div class="col-md-3 col-sm-2 col-xs-12"></div>
            <div class="col-md-6 col-sm-5 col-xs-12" id="profile">
                <form action="#" onsubmit="" method="post" enctype="multipart/form-data">
                    <div class="row d-flex">
                        <div>
                            <h3 class="d-flex justify-content-center">Your profile</h3>
                        </div>
                        <div class="col-md-8 order-2 order-md-1">
                            <div>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="<?php echo $_SESSION['fname']; ?>" disabled autocomplete="off">
                                <span id="yourname" class="text-danger"></span>
                            </div>
                            <br>
                            <div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email(primary)" value="<?php echo $_SESSION['email']; ?>" disabled autocomplete="off">
                                <span id="emailid" class="text-danger"></span>
                            </div>
                            <br>
                            <div>
                                <input type="email" class="form-control" name="sec_email" id="sec_email" placeholder="Email(secondary)" value="<?php echo $_SESSION['secemail']; ?>" disabled autocomplete="off">
                                <span id="sec_emailid" class="text-danger"></span>
                            </div>
                            <br>
                            <div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" disabled autocomplete="off">
                                <span id="usernames" class="text-danger"></span>
                            </div>
                            <br>

                            <div class="col-12 gap-2 d-flex">
                                <a href="Editprofile.php" type="button" class="form-control btn btn-success">Edit profile</a>
                                <a href="password-change.php" type="button" class="form-control btn btn-primary">Change pasword</a>
                            </div>
                        </div>
                        <div class="col-md-4 order-1 order-md-2 ">
                            <img src="./photo/<?php echo $_SESSION["photo"]; ?>" alt="profile_photo" width="100%" style="border-radius:50%">

                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-3 col-sm-2 col-xs-12"></div>
        </div>
    </div>













    <!-- ******************************************************************************************************** -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>