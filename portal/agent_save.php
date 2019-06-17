<?php
session_start();
include("../session.php");

$agentforce = $_POST['agentforce'];
$agentpass = $_POST['agentpass'];



$sql = "SELECT * FROM ipo WHERE force_id = '$agentforce' ";


$queryipo = mysqli_query($dbconnect, $sql );

	if(mysqli_num_rows($queryipo)==1){

					echo "<script>
					alert('Profile already exist!');
								window.location.assign('./');
								
					</script>";
					exit();

	}elseif(mysqli_num_rows($queryipo)!=1){

		if(!(isset($_POST['agentactive']))){

					$agentactive=0;
					$sql = "INSERT INTO ipo(force_id,password,active) values('$agentforce','$agentpass','$agentactive')";
				
									if($agentinsert =mysqli_query($dbconnect,$sql)) {
											echo "<script> alert('Profile Created') </script>"; 

									}else{
											echo "<script>alert('Profile Creation Failed!')</script>"; 

									}

			}else{

					$agentactive=1;
					$sql = "INSERT INTO ipo(force_id,password,active) values('$agentforce','$agentpass','$agentactive')";

									if($agentinsert =mysqli_query($dbconnect,$sql)){
											echo "<script>alert('Profile Created and Activated!')</script>"; 
			

									}else{
											echo "<script>alert('Profile Creation Failed!')</script>"; 

									}

							}
		}else{

				echo "<script>alert('DB connection Failed!')</script>";	
								}

?>