<?php
include('../includes/config.php');

// $con= mysqli_connect('Localhost', 'tse', 'bPmtHasjyTJ2SgZJ','utkarsh') or die("connection failed");

// $con = new mysqli("localhost","root","hestabit","mailman") or die("connection failed");
 
session_destroy(); 

header("location:index.php"); 

?>