<?php
$con = new mysqli("localhost", "root", "hestabit", "mailman") or die("connection failed");
session_start();



























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