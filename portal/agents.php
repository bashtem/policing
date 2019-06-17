<?php
session_start();
include ("../session.php");


?>

<div>
<p style="color:#880000 ; font-size:20px; text-align: center; letter-spacing: 10px; float: left">AGENTS</p>
 	<div style="margin-left:600px">

 			<span><input style="width:80%; border-radius: 8px" tabindex="201" class="form-control-static" name="search_ipo" id="search_ipo" type="number" placeholder="  search force id"><a href="#" onclick="page('search_agent.php','search_force_id','bodyagent','search_ipo')" style=" padding-left: 10px; display: inline-block;" href=""><span class="glyphicon glyphicon-search"></span></a></span>
 			
	 </div><br>
	 <div class="col-md-4">
	 <select name="section" id="agent" required class="form-control">
                                          <option >-Crime Section-</option>
                                          <option value="Anti Robbery">Anti Robbery</option>
                                          <option value="Anti Crime Patrol">Anti Crime Patrol</option>
                                          <option value="D.C.B">D.C.B</option>
                                          <option value="Homicide">Homicide</option>
                                          <option value="Human Right">Human Right</option>
                                          <option value="J.W.C">J.W.C</option>
                                          <option value="Respond Monitor">Respond Monitor</option>
                                          <option value="Surveillance">Surveillance</option>
                                          
                                       </select><br>
                                     
	</div> 
	<div div class="col-md-4">
				<a id="agentbutton" href="#" class="form-control btn btn-info"  >Add I.P.O</a>
	</div>
	<div div class="col-md-4">
				<a id="agentdisabled" href="#" class="form-control btn btn-danger"  >Disabled I.P.O</a>
	</div>
	<hr/>


	<div id="bodyagent" >
	<p id="result"></p>
		<p ><img src="../img/police-badge.jpg" class="text-center" style="margin-top:60px ;width:200px; height: 250px"></p>

		
	</div>



<script type="text/javascript">

var genpass = document.getElementById('genpass');

genpass.onclick = function(){
var d = new Date();
	document.getElementById('agentpass').value = d.getTime().toString().slice(6,13);
}

var agentbutton = document.getElementById('agentbutton');
var agentmodal = document.getElementById('agentmodal');
var agentclose = document.getElementById('agentclose');


agentbutton.onclick = function(){

		document.getElementById('agentpass').value ="";
		document.getElementById('agentforce').value ="";
		agentmodal.style.display="block";
}


agentclose.onclick = function(){
			var confirmagent = confirm("Do you want to close?")
			if(confirmagent)
		agentmodal.style.display="none";
}






var agent = document.getElementById('agent');

agent.onchange = function(){
 var section = document.getElementById('agent').value;
 var xmlrobot = new XMLHttpRequest();
 var url="../portal/agents_panel.php?section="+section;
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){
			//document.getElementById('passport');
			document.getElementById("bodyagent").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#bodyagent').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("bodyagent").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);



}



var agentdisabled = document.getElementById('agentdisabled');

agentdisabled.onclick = function(){

var xmlrobot = new XMLHttpRequest();
 var url="../portal/disabled_ipo.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){
			//document.getElementById('passport');
			document.getElementById("bodyagent").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#bodyagent').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("profilechange").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);



}

//var saveagent = document.getElementById('saveagent');

/*saveagent.onclick = function(){

	var agentforce = document.getElementById('agentforce').value;
	var agentpass = document.getElementById('agentpass').value;
	var agentactive = document.getElementById('agentactive').checked;

		if((agentpass=="")|| (agentforce=="")){

			alert('Provide required information');
			//alert(agentactive);
				}else{	

					if(agentactive){
						var agentactive ="true";
					}else{
						var agentactive ="false";
					}

 var xmlrobot = new XMLHttpRequest();
 var url="../portal/agent_save.php?agentforce="+agentforce+"&agentpass="+agentpass+"&agentactive="+agentactive;
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){
			

			document.getElementById("bodyagent").innerHTML=xmlrobot.responseText;

				}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}

}
*/

</script>