<?php
include('../includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/2079f2e470.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- <script>swal("Good job!", "user_registered_successfully!", "success");</script>'; -->

    <!-- ******************************************************************************************************** -->
    <nav class="navbar navbar-success bg-primary">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="signup.php">
                <img src="../image/logo1.png" alt="" width="100%" height="50" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
    <!-- ******************************************************************************************************** -->


    <!-- ******************************************************************************************************** -->

    <div class="container">
        <div class="row" id="box">
            <div class="col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="form-box">
                <form action="signupdb.php" method="post" enctype="multipart/form-data">
                    <h3 class="d-flex justify-content">Create your account</h3>
                    <!-- <span class="error">* Required field </span> -->
                    <div class="row">
                        <div class="col-md-8 order-2 order-md-1">
                            <div>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" autocomplete="off" required />
                                <span id="firstname" class="text-danger"></span>
                            </div>
                            <br>
                            <div>
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Last name" autocomplete="off" required />
                                <span id="lastname" class="text-danger"></span>

                            </div>
                            <br>
                            <div>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Select Username" autocomplete="off" required />
                                <span id="usernames" class="text-danger"></span>

                                <small id="username" class="text-dark float-end">Availability<span style="color:red;"></span> </small>
                            </div>
                        </div>
                        <div class="col-md-4 order-1 order-md-2">
                            <div id="profile-container">
                                <image for="uploadfile" src="../image/profile.png">
                            </div>
                            <input type="file" name="uploadfile" id="imageupload" required />
                            <!-- <Label for="filechooser" class="btn btn-primary" >Upload picture</Label> -->
                            <!-- <input type="file" placeholder="Upload picture" name="uploadfile" id="fileChooser" onchange="return ValidateFileUpload()" required /> -->
                            <span id="photos" class="text-danger"><?php echo $_GET['image_err']; ?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class=" input-group col-md-2">
                            <input type="email" class="form-control" name="email" placeholder="Enter your Email" aria-label="Recipient's username" aria-describedby="basic-addon2" id="email" autocomplete="off" required />
                            <span class="input-group-text" id="basic-addon2">@Mailman.com</span>
                        </div>
                        <span id="EmailAdd" class="text-danger"></span>
                    </div>
                    <br>
                    <div class="form-group col-md-12">
                        <input type="email" class="form-control" name="RecEmail" id="RecEmail" placeholder="Enter your Recovery-email" autocomplete="off" required />
                        <span id="secemail" class="text-danger"></span>
                    </div>
                    <br>
                    <div class="form-group col-md-12">
                        <div class="d-flex">
                            <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelpInline" placeholder="Enter the new password" autocomplete="new-password" required />
                            <!-- <span><a href="#"><i class="far fa-question-circle offset-12"></i></a> </span>  -->
                        </div>
                        <span id="pass" class="text-danger"></span>
                    </div>
                    <br>
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm" aria-describedby="passwordHelpInline" placeholder="Confirm-Password" autocomplete="off" required />
                        <span id="conpass" class="text-danger"></span>
                    </div>
                    <br>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" name="agree">
                            <label class="form-check-label" for="gridCheck">
                                I Agree of terms and condition of mailman
                            </label>
                        </div>
                        <div class="col-12">
                            <input type="submit" onclick="return validation();" class="btn btn-success" name="signup" value="signup">

                            <button type="button" class="btn btn-primary">
                                <a href="index.php" style="text-decoration:none; color:whitesmoke;">Sign-in Instead</a></button>
                        </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
            </div>
        </div>
    </div>


    <!-- *************************************************validation************************************************* -->
    <script>
        function validation() {
            // alert("uuuuu");

            var fname = document.getElementById('fname').value;
            var lname = document.getElementById('lname').value;
            var username = document.getElementById('username').value;
            var Email = document.getElementById('email').value;
            var RecEmail = document.getElementById('RecEmail').value;
            var password = document.getElementById('password').value;
            var confirmpassword = document.getElementById('passwordconfirm').value;

            first_name = '';
            last_name = '';
            user_name = '';
            user_email = '';
            r_email = '';
            user_pass = '';
            user_cpass = '';
            name_pattern = /^([a-zA-Z' ]+)$/

            if (fname == "") {
                document.getElementById('firstname').innerHTML = " **please fill the Firstname field";
                first_name = false;
            } else if ((fname.length <= 2) || (fname.length >= 20)) {
                document.getElementById('firstname').innerHTML = " **firstname must be between 2 to 20";
                first_name = false;

            } else if (!name_pattern.test(fname)) {
                document.getElementById('firstname').innerHTML = " **invalid First name Given";
                first_name = false;
            } else {
                document.getElementById('firstname').innerHTML = "";
                first_name = true;
            }

            // ***********************************************************************
            if (lname == "") {
                document.getElementById('lastname').innerHTML = " **please fill the lastname field";
                last_name = false;
            } else if ((lname.length <= 2) || (lname.length >= 20)) {
                document.getElementById('lastname').innerHTML = " **Lastname must be between 2 to 20";
                last_name = false;
            } else if (!name_pattern.test(lname)) {
                document.getElementById('lastname').innerHTML = " **invalid Last name Given";
                last_name = false;
            } else {
                document.getElementById('lastname').innerHTML = "";
                last_name = true;
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
            if (Email == "") {
                document.getElementById('EmailAdd').innerHTML = " **please fill the Email field";
                user_email = false;

                // return false;
            } else if ((Email.length <= 2) || (Email.length >= 40)) {
                document.getElementById('EmailAdd').innerHTML = " **username must be between 2 to 40";
                user_email = false;

                // return false;
            } else if (Email.indexOf('@') <= 0) {
                document.getElementById('EmailAdd').innerHTML = " **@ invalid email id";
                user_email = false;

                // return false;
            } else {
                document.getElementById('EmailAdd').innerHTML = "";
                user_email = true;
            }
            // ************************************************************************
            if (RecEmail == "") {
                document.getElementById('secemail').innerHTML = " **please fill the secondary mail field";
                r_email = false;

                // return false;
            } else if (RecEmail.indexOf('@') <= 0) {
                document.getElementById('secemail').innerHTML = " **@ invalid postion";
                r_email = false;

                // return false;
            } else if ((RecEmail.charAt(RecEmail.length - 4) != '.') && (RecEmail.charAt(RecEmail.length - 3) != '.')) {
                document.getElementById('secemail').innerHTML = " **please fill the Email field";
                r_email = false;

                // return false;
            } else {
                document.getElementById('secemail').innerHTML = "";
                r_email = true;
            }

            // *****************************************************************************
            if (password == "") {
                document.getElementById('pass').innerHTML = " **please fill the password field";
                user_pass = false;

                // return false;
            } else if ((password.length <= 5) || (password.length >= 20)) {
                document.getElementById('pass').innerHTML = " **password must be between 5 to 20";
                user_pass = false;

                // return false;
            } else if (password != confirmpassword) {
                document.getElementById('pass').innerHTML = " **password are not matching ";
                user_pass = false;

                // return false;
            } else {
                document.getElementById('pass').innerHTML = "";
                user_pass = true;
            }

            if (confirmpassword == "") {
                document.getElementById('conpass').innerHTML = " **please fill the confirm-password field";
                user_cpass = false;

            } else {
                document.getElementById('conpass').innerHTML = "";
                user_cpass = true;

            }

            if (first_name != true || last_name != true || user_name != true || user_email != true || r_email != true || user_pass != true || user_cpass != true) {
                // alert("some error occur! please retry!");
                return false;
            }


        }
    </script>

    <!-- *********************profile image************************************************* -->
    <!-- <script>
        $("#imageupload").click(function(e) {
            $("#imageUpload").click();
        });

        function fasterPreview(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#imageupload').attr('src',
                    window.URL.createObjectURL(uploader.files[0]));
            }
        }

        $("#imageUpload").change(function() {
            fasterPreview(this);
        });
    </script> -->
    <!-- ********************************************************************************************************** -->
  
    <?php include('footer.php') ?>