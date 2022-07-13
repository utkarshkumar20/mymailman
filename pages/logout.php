<?php

$con = new mysqli("localhost","root","hestabit","mailman") or die("connection failed");
 
session_destroy(); 

header("location:index.php"); 

?>