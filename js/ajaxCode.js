var xmlHttp;
//method return a XMLHttpRequest Object
function getXMLHttpRequest(){
	var xmlHttp=null;
	try{// Firefox, Opera 8.0+, Safari
		xmlHttp = new XMLHttpRequest();
	}catch(e){
		try{ // Internet Explorer
    		xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
   		 }catch(e){
   			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
   		 }
	}
	return xmlHttp;
}




function cellboard(){
 var xmlrobot = getXMLHttpRequest();
 var url="../portal/cell_board.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){

			document.getElementById("content").innerHTML="";
			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#content').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("content").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}


function form(){
 var xmlrobot = getXMLHttpRequest();
 var url="../portal/form.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){

			document.getElementById("content").innerHTML="";
			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#content').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("content").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}


function casefile(){
 var xmlrobot = getXMLHttpRequest();
 var url="../portal/case.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){

			document.getElementById("content").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#content').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("content").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}



function pm(){


 var xmlrobot = getXMLHttpRequest();
 var url="../portal/pm.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){

			document.getElementById("content").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#content').append(jNode);
						
			jNode.fadeIn(2000);
			pmnotif();

		}else{

			document.getElementById("content").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}


xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}


function agents(){
 var xmlrobot = getXMLHttpRequest();
 var url="../portal/agents.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){

			document.getElementById("content").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#content').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("content").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}


function profile(){
 var xmlrobot = getXMLHttpRequest();
 var url="../portal/profile.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){

			document.getElementById("content").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#content').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("content").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}


function logs(){
 var xmlrobot = getXMLHttpRequest();
 var url="../portal/logs.php";
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){

			document.getElementById("content").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#content').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("content").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}


