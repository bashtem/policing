<?php
session_start();
include ("../session.php");

$sql ="SELECT * FROM log_in where force_id='$force_id' order by id desc";
$sqlout ="SELECT * FROM log_out where force_id='$force_id' order by id desc";
$query = mysqli_query($dbconnect, $sql);
$queryout = mysqli_query($dbconnect, $sqlout);

$rowout = mysqli_fetch_array($queryout);
$rowin = mysqli_fetch_array($query);
?>

<p style="color:#880000 ; font-size:20px; text-align: center; letter-spacing: 10px; "><i>Activity Logs </i></p> <hr/>

<div class="row">
	
			<div class="col-md-6">
					<div class="form-group text-center">
								  <div class="col-md-6">
								                         
								                  <a  id="log_in" href="#" class="form-control btn btn-default "> Login History </a>
								  </div>
								  <div class="col-md-6" >
								                         
								                <a  id="log_out" href="#" class="form-control btn btn-default
								                "> Logout History </a>
								  </div>
					</div>		  
		    </div>

		    <div class="col-md-12">
					
								  <hr>
								  
		    </div>

	<div id="log_body">
		    <div class="col-md-12">
					<div class="form-group text-center" >
								  <div class="col-md-4">
								                         
								                   <label style="text-align: justify;"></label>
								  </div>
								  <div class="col-md-4" style="text-align: left">
								                         
								                    <h5>Last Login</h5>
								  </div>
								  <div class="col-md-4" style="text-align: left">
								                         
								                   

								  </div>
					</div>			  
		    </div>
		    
		    <div class="col-md-12">
					<div class="form-group text-center" >
								  <div class="col-md-6">
								                         
								                   <label style="text-align: justify;">Date :</label>
								  </div>
								  <div class="col-md-6" style="text-align: left">
								                         
								                    <?php echo $rowin['login_date'] ?>
								  </div>
								  
					</div>			  
		    </div>
		    <div class="col-md-12">
					<div class="form-group text-center" >
								  <div class="col-md-6">
								                         
								                   <label style="text-align: justify;">Time :</label>
								  </div>
								  <div class="col-md-6" style="text-align: left">
								                         
								                    <?php echo $rowin['login_time'] ?>
								  </div>
								  
					</div>			  
		    </div>
		    <div class="col-md-12">
					<div class="form-group text-center" >
								  <hr>
								  
					</div>			  
		    </div>
		    <div class="col-md-12">
					<div class="form-group text-center" >
								  <div class="col-md-4">
								                         
								                   <label style="text-align: justify;"></label>
								  </div>
								  <div class="col-md-4" style="text-align: left">
								                         
								                    <h5>Last Logout</h5>
								  </div>
								  <div class="col-md-4" style="text-align: left">
								                         
								                   

								  </div>
					</div>			  
		    </div>
		    <div class="col-md-12">
					<div class="form-group text-center" >
								  <div class="col-md-6">
								                         
								                   <label style="text-align: justify;">Date :</label>
								  </div>
								  <div class="col-md-6" style="text-align: left">
								                         
								                    <?php echo $rowout['logout_date'] ?>
								  </div>
								  
					</div>			  
		    </div>
		    <div class="col-md-12">
					<div class="form-group text-center" >
								  <div class="col-md-6">
								                         
								                   <label style="text-align: justify;">Time :</label>
								  </div>
								  <div class="col-md-6" style="text-align: left">
								                         
								                    <?php echo $rowout['logout_time']?>
								  </div>
								  
					</div>			  
		    </div>


	</div>

</div>



<script type="text/javascript">

var login = document.getElementById('log_in');
var logout = document.getElementById('log_out');

login.onclick = function(){

var xmlrobot = new XMLHttpRequest();
 var url="../portal/login_history.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){
			document.getElementById("log_body").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#log_body').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("log_body").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);



}

logout.onclick = function(){

var xmlrobot = new XMLHttpRequest();
 var url="../portal/logout_history.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){
			//document.getElementById('passport');
			document.getElementById("log_body").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#log_body').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("log_body").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);



}

</script>