<?php

session_start();
include ("../session.php");

$id= $_GET['id'];
$sql= "SELECT * FROM ipo WHERE force_id='$id'";
$query = mysqli_query($dbconnect,$sql);
$row = mysqli_fetch_array($query);
if(mysqli_num_rows($query)==1){

		if($row['force_id']==$force_id){

			echo 1;
		}else{
			echo 0 ;
		}
	
}else{

	echo 2;
}

?>