<?php

include("dbconnect.php");

if(isset($_SESSION['force_id'])){
$force_id = $_SESSION['force_id'];
$sql = "SELECT * FROM ipo where force_id='$force_id'";
$query = mysqli_query($dbconnect,$sql);
while($row=mysqli_fetch_array($query)){

	$force_id= $row['force_id'];
	$pass = $row['password'];
	$level = $row['level'];
	$passport = $row['passport'];
	$fname = $row['fname'];
	$lname = $row['lname'];
	$email =$row['email'];
	$division =$row['division'];
	$section = $row['section'];
	$state = $row['state'];
	$mobile = $row['telephone'];
	
}
	
}else{

	header("Location: ../");
}



?>

