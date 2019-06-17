<?php
session_start();
include ("../session.php");


?>


<div>
	<p style="letter-spacing: 8px;  border: 1px dotted #4EA24E;  border-radius:15px; font-size: 20px; font-style: italic;" class="text-center">PRIVATE MESSAGE</p><hr/>

<div class="container-fluid">



	<div class="col-md-3">

		<ul class="nav nav-stacked ">
		<br><br><br>

			<li >	<a  href="#" onclick="pmnew();" class="btn-lg btn-default" style="text-align: center">New <span class="glyphicon glyphicon-pencil"></span></a></li><hr>
			<li>	<a href="#" onclick="pminbox();"  class="btn-lg btn-default" style="text-align: center">Inbox <span class="glyphicon glyphicon-inbox"></span> <span id="pmnotify2" style="background-color:green" class="badge"></span></a></li><hr>
			<li>	<a href="#"  onclick="pmsent();" class="btn-lg btn-default" style="text-align: center">Sent <span class="glyphicon glyphicon-send"></span></a></li>
		</ul>					

	</div>			



	<div class="col-md-1"></div>




	<div  class=" col-md-8"><br>


			<div id="pmcontent" >
		
					<img class="text-center" src="../img/pm.png" style="width:500px; height: 250px" />

		



			</div>

	</div>



</div>


</div>

<script>


function pmnew(){
 var xmlrobot = new XMLHttpRequest();
 var url="../portal/pmnew.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){

			document.getElementById("pmcontent").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#pmcontent').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("pmcontent").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}

	
	function pminbox(){
 var xmlrobot = new XMLHttpRequest();
 var url="../portal/pminbox.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){

			document.getElementById("pmcontent").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#pmcontent').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("pmcontent").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}


function pmsent(){
 var xmlrobot = new XMLHttpRequest();
 var url="../portal/pmsent.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){

			document.getElementById("pmcontent").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#pmcontent').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("pmcontent").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}


</script>