<?php
session_start();
include('../includes/config.php');
// ****************************************cmposemail************************************
// @$to = $_POST['TO'];
// @$sub = $_POST['Subject'];
// @$msg = $_POST['message'];
// $file = $_FILES['file']['name'];
// // $user_id = $_SESSION['id'];
// $id = $_SESSION['id'];

// if (@$_REQUEST['send']) {
//     if ($to == "" || $sub == "" || $msg == "") {
//         echo '<script>alert("please fill all field");</script>';
//     } else {
//         $query = "SELECT * FROM Signup_table WHERE Username = '$to'";
//         $run = mysqli_query($con, $query);
//         $data = mysqli_fetch_array($run);
//         if (mysqli_num_rows($run) > 0) {
//             mysqli_query("INSERT INTO usermail VALUES('','$to','$id','$sub','$msg','',sysdate())");
//             echo '<script>alert("message sent.....");</script>';
//         } else {
//             $sub = $sub . "--" . "msg failed";
//             mysqli_query("INSERT INTO usermail VALUES('','$id','$id','$sub','$msg','',sysdate())");
//             echo '<script>alert("message failed.....");</script>';
//         }
//     }
// }


// if (@$_REQUEST['save']) {
//     if ($sub == "" || $msg == "") {
//         $err = "<font color='red'>fill subject and msg first</font>";
//     } else {
//         $query = "INSERT INTO draft VALUES('','$id','$sub','$file','$msg',sysdate())";
//         mysqli_query($con, $query);
//         $err = "message saved...";
//     }
// }
// ****************************************composemail************************************

?>
