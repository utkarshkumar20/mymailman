<?php
session_start();
include('../includes/config.php');

$id = $_SESSION['id'];

if(isset($_POST['delete'])) 
$sql=mysqli_query($con,"SELECT * FROM email where reciever='$id'");
while($dd=mysqli_fetch_array($sql))
	{
	$rec=$dd['reciever'];
	$sen=$dd['sender'];
	$sub=$dd['sub'];
	$msg=$dd['msg'];
	$att=$dd['attachement'];
	//store into trash table
	// mysqli_query($con,"insert into trash values('','$rec','$sen','$sub','$msg',now())");
	
	//delete form inbox
	
// 	mysqli_query($con,"delete FROM usermail where rec_id='$id' and mail_id='$v'");

// 	}
	
// 	echo "<script>alert('msg deleted');window.location='dashboard.php'</script>";
// }
// }
	}
?>