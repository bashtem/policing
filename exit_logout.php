<?php
		session_start();		
		include("dbconnect.php");
		$force_id = $_SESSION['force_id'];
		$time = date("h:i:s");
		$date = date("Y/M/D")." ".date("y/m/d");
		$sql ="INSERT INTO log_out(logout_date,logout_time,force_id) VALUES('$date','$time','$force_id')";
		$query = mysqli_query($dbconnect, $sql);
		if($query){
			session_unset();
			session_destroy();
			//exit();
	}else{
		echo'
		<script type="text/javascript">
			alert("DB Error");
			window.location.assign("portal/");
		</script>';

	}
		
	header('Location: ./');
	?>
	<!-- <script>
		window.location.assign('./')
	</script> -->