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
<!-- <head>
	<style>
	input[type=text]
	{
	width:200px;
	height:35px;
	}
	</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<table width="506" border="1">

  <tr>
    <th width="213" height="35" scope="row">To</th>
    <td width="277">
	<input type="text" name="to" />	</td>
  </tr>
  <tr>
    <th height="36" scope="row">Cc</th>
    <td><input type="text" name="cc"/></td>
  </tr>
  <tr>
    <th height="36" scope="row">Subject</th>
    <td><input type="text" name="sub" /></td>
  </tr>
  <tr>
    <th height="36" scope="row">upload your file</th>
    <td><input type="file" name="file" id="file"/></td>
  </tr>
  <tr>
    <th height="52" scope="row">Msg</th>
    <td><textarea rows="8" cols="40" name="msg"></textarea></td>
  </tr>
  <tr>
    <th height="35" colspan="2" scope="row">
	<input type="submit" name="send" value="Send"/>
	<input type="submit" name="save" value="Save"/>
	<input type="reset" value="Cancel"/>	</th>
  </tr>
</table>

</body>
</form>
</html> -->