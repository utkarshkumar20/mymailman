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
                <form action="password-reset-code.php" method="POST" autocomplete="off">
                    <!-- <input type="hidden" name="password_code"> -->


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
                    <input type="submit" onclick="return validation();" name="password_update" value="Change" class="btn btn-primary">
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
            } else if ((password.length <= 5) || (password.length >= 20)) {
                document.getElementById('pass').innerHTML = " **password must be between 5 to 20";
            } else if (password == "") {
                document.getElementById('pass').innerHTML = " **please fill the password field";
            } else {
                document.getElementById('pass').innerHTML = "";
                return false;

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