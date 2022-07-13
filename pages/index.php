<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/2079f2e470.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>signin!</title>
</head>

<body>

    <!-- ************************************************header************************************************* -->
    <nav class="navbar navbar-success bg-primary">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="#">
                <img src="../image/logo1.png" alt="" width="100%" height="50" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
    <!-- *************************************************form******************************************************* -->
    <div class="container">
        <div class="row" id="box">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <img src="../image/default.png" class="mx-auto pt-0 d-block" alt="cover" width="50%">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="form-box-1">
                <form action="signindb.php" onsubmit="return validation()" method="post" enctype="multipart/form-data">
                    <h3 class="d-flex justify-content">Login to your account</h3>
                    <div>
                    </div>
                    <div class="mb-3">
                        <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                        <input autocomplete="off" type="email" class="form-control" id="email" name="email" placeholder="Email/Username" required />
                        <span id="Emailid" class="text-danger"></span>
                        <!-- <div id="emailHelp" class="text-dark">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
                        <input autocomplete="off" type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                        <span id="pass" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <a href="password-reset.php">Forget password?</a>
                        <span><input type="submit" name="sublogin" class="btn btn-success float-end" value="Login"></span>
                    </div>
                    <div>
                        <span>Don't have an account yet?</span>
                    </div>
                    <div class="col-3">
                        <a href="signup.php" style="text-decoration:none;" type="button" class="bg br-light">Signup</a>
                    </div>

                    <br>
                </form>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-12"></div>
        </div>
    </div> -->

    <!-- *************************************************validation************************************************* -->
    <!-- validation for empty field    -->
    <script>
        function validation() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            if (email.length == "" && password.length == "") {
                alert("User Name and Password fields are empty");
                return false;
            } else {
                if (email == "") {
                    document.getElementById('Emailid').innerHTML = " **please fill the Email field";
                    return false;
                } 
                if (email.indexOf('@') <= 0) {
                    document.getElementById('Emailid').innerHTML = " **@ invalid email name";
                    return false;
                } 
                if ((email.charAt(email.length - 4) != '.') && (email.charAt(email.length - 3) != '.')) {
                    document.getElementById('Emailid').innerHTML = " **please fill the Email field";
                    return false;
                }
                if (password == "") {
                    document.getElementById('pass').innerHTML = " **please fill the password field";
                    return false;
                }

            }

        }
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>