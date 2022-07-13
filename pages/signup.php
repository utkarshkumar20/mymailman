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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
    <body>
        <!-- ************************************************************************************ -->

        <!-- ************************************************************************************************ -->
        <nav class="navbar navbar-success bg-success">
            <div class="container-fluid mx-5">
                <a class="navbar-brand" href="#">
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
                    <form action="signupdb.php" method="post" onsubmit="return validation()" enctype="multipart/form-data">
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
                                    <image for="imageupload" src="../image/profile.png">
                                </div>
                                <input type="file" name="uploadfile" id="imageupload" capture />
                                <!-- <label for="imageUpload" class="profile text-success " required></label> -->
                                <!-- <input id="imageUpload" type="file" name="uploadfile" placeholder="upload-picture"  capture /> -->
                                <!-- <span id="photos" class="text-danger"></span> -->
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
                                <input type="submit" class="btn btn-success" name="signup" value="signup">

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

        <!-- validation for empty field    -->
        <script>
            function validation() {
                // console.log('hello', e);

                var fname = document.getElementById('fname').value;
                var lname = document.getElementById('lname').value;
                var username = document.getElementById('username').value;
                // var photo = document.getElementById('imageUpload').value;
                var Email = document.getElementById('email').value;
                var RecEmail = document.getElementById('RecEmail').value;
                var password = document.getElementById('password').value;
                var confirmpassword = document.getElementById('passwordconfirm').value;

                if (fname == "") {
                    document.getElementById('Firstname').innerHTML = " **please fill the Firstname field";
                    return false;
                }
                if ((fname.length <= 2) || (fname.length >= 20)) {
                    document.getElementById('Firstname').innerHTML = " **firstname must be between 2 to 20";
                    return false;
                }
                if (!isNaN(fname)) {
                    document.getElementById('Firstname').innerHTML = " **only character are allowed";
                    return false;
                }
                if (!preg_match("/^([a-zA-Z' ]+)$/", "Given_Name")) {
                    document.getElementById('Firstname').innerHTML = " **invalid First name Given";
                    return false;
                }

                // ***********************************************************************
                if (lname == "") {
                    document.getElementById('Lastname').innerHTML = " **please fill the lastname field";
                    return false;
                }
                if ((lname.length <= 2) || (lname.length >= 20)) {
                    document.getElementById('Lastname').innerHTML = " **Lastname must be between 2 to 20";
                    return false;
                }
                if (!isNaN(lname)) {
                    document.getElementById('Lastname').innerHTML = " **only character are allowed";
                    return false;
                }
                if (!preg_match("/^([a-zA-Z' ]+)$/", "Given_Name")) {
                    document.getElementById('Lastname').innerHTML = " **invalid Last name Given";
                    return false;
                }
                // ***********************************************************************
                if (username == "") {
                    document.getElementById('usernames').innerHTML = " **please fill the username field";
                    return false;
                }
                if ((username.length <= 2) || (username.length >= 20)) {
                    document.getElementById('usernames').innerHTML = " **username must be between 2 to 20";
                    return false;
                }
                if (!preg_match('#^[a-zA-Z][a-zA-Z0-9@.+-_]{2,100}$#')) {
                    document.getElementById('usernames').innerHTML = " **invalid  username Given";
                    return false;
                }
                // else {
                // document.getElementById('usernames').innerHTML = "";
                // }

                // if (photo == "") {
                //     document.getElementById('photos').innerHTML = " **please attach photo";
                //     return false;
                // }
                // ******************************************************************
                if (Email == "") {
                    document.getElementById('EmailAdd').innerHTML = " **please fill the Email field";
                    return false;
                }
                if ((Email.length <= 2) || (Email.length >= 20)) {
                    document.getElementById('EmailAdd').innerHTML = " **username must be between 2 to 20";
                    return false;
                }
                if (Email.indexOf('@') <= 0) {
                    document.getElementById('EmailAdd').innerHTML = " **@ invalid email name";
                    return false;
                }
                if ((Email.charAt(Email.length - 4) != '.') && (Email.charAt(Email.length - 3) != '.')) {
                    document.getElementById('EmailAdd').innerHTML = " **please fill the Email field";
                    return false;
                }
                // else {
                //     document.getElementById('EmailAdd').innerHTML = "";

                // }

                // ************************************************************************
                if (RecEmail == "") {
                    document.getElementById('secemail').innerHTML = " **please fill the secondary mail field";
                    return false;
                }
                if ((RecEmail.length <= 2) || (RecEmail.length >= 20)) {
                    document.getElementById('secemail').innerHTML = " **Email must be between 2 to 20";
                    return false;
                }
                if (RecEmail.indexOf('@') <= 0) {
                    document.getElementById('secemail').innerHTML = " **@ invalid postion";
                    return false;
                }
                if ((RecEmail.charAt(RecEmail.length - 4) != '.') && (RecEmail.charAt(RecEmail.length - 3) != '.')) {
                    document.getElementById('secemail').innerHTML = " **please fill the Email field";
                    return false;
                }

                // *****************************************************************************
                if (password == "") {
                    document.getElementById('pass').innerHTML = " **please fill the password field";
                    return false;
                }
                if ((password.length <= 5) || (password.length >= 20)) {
                    document.getElementById('pass').innerHTML = " **password must be between 5 to 20";
                    return false;
                }

                if (confirmpassword == "") {
                    document.getElementById('conpass').innerHTML = " **please fill the confirm-password field";
                    return false;
                }
                if (password != confirmpassword) {
                    document.getElementById('pass').innerHTML = " **password are not matching ";
                    return false;
                }


            }
        </script>
        <!-- *********************profile image************************************************* -->
      
            <script>
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
            </script>
            <!-- ********************************************************************************************************** -->
            <!-- <script>
        function validateEmail($email) {
            // Etc, just an array of the blacklisted domains
            $blacklistDomains = ['gmail.com', 'yahoo.com', 'hotmail.com', 'googlemail.com'];
            // Check if the email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }

            // Split the email after the '@' to get the domain
            $emailParts = explode('@', $email());

            if (in_array(end($emailParts), $blacklistDomains)) {
                return false;
            }

            return true;
        }
    </script> -->
            <!-- ********************************************************************************************************** -->
















            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>

    </html>