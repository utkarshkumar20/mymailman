 
<!-- databasse connection -->
<?php
session_start();
$dbHost = 'localhost';
$dbName = 'mailman';
$dbUsername = 'root';
$dbPassword = 'hestabit';
$con= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 


?>

