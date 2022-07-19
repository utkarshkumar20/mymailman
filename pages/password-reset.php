<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Recovery mail</title>
</head>

<body>
    <!-- ******************************************************************************************************** -->
    <nav class="navbar navbar-success bg-success">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="#">
                <img src="../image/logo1.png" alt="" width="100%" height="50" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <!-- ******************************************************************************************************** -->
    <!-- onsubmit="return validation()"  -->
    <div class="container">
        <div class="row" id="box">
            <div class="col-md-1 col-sm-1 col-xs-12"></div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="form-box-1">
                <form action="password-reset-code.php" method="post" name="reset" autocomplete="off">
                    <div>
                        <h4 class="d-flex justify-content">Enter your register E-mail/username</h4>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" name="username" value="<?php echo $_SESSION["username"]; ?>">
                        <input type="text" class="form-control" placeholder="abc@xyz.com" id="RecEmail" name="RecEmail">
                        <span id="Emailid" class="text-danger"></span>
                    </div>
                    <br>
                    <!-- ***************************email-id recovery message******************************* -->
                    <div>
                        <a href="index.php" style="text-decoration:none;">Back to Login</a>
                        <span>
                            <input type="submit" name="password_reset_link" onclick="return validation();" class="btn btn-success float-end" style="text-decoration:none" value="Reset Password" />
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <img src="../image/default.png" class="mx-auto pt-0 d-block" alt="cover" width="50%">
            </div>
        </div>
    </div>

    <!-- ******************************************************************************************************************** -->
    <!-- validation for empty field    -->


    <script>
        function validation() {
            // console.log('hello', e);
            var email = document.getElementById('RecEmail').value;


            if (email == "") {
                document.getElementById('Emailid').innerHTML = " **please fill the Email field";
                // return false;
            } else if ((email.charAt(email.length - 4) != '.') && (email.charAt(email.length - 3) != '.')) {
                document.getElementById('Emailid').innerHTML = " **please fill the Email field";
                // return false;
            } else {
                document.getElementById('Emailid').innerHTML = " ";

            }

        }
    </script>


</body>

</html>