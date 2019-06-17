<?php
session_start();
include ("../session.php");


?>


<p style="color:#880000 ; font-size:20px; text-align: center; letter-spacing: 10px; "> PROFILE UPDATE</p><hr/>
 

 <div class="row">                        
                        <div class="col-md-6" id="passport">
                           
                           <div class="registration-title"><strong>Welcome</strong>, Please enter password</div><br>
                          
                            <form  class="form-horizontal" >
                            <div class="form-group">
                                <div class="col-md-12" style="text-align: center;">
                                    <img src="../img/padlock.jpg" alt="lock" height="140" width="90"/>
                                    <br/>
                                    
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                <p id="emptypass" ></p>
                                    <input id="password" type="text" class="form-control" name="password" placeholder="*****************************************************"  required />
                                </div>
                            </div>
                            <div class="form-group push-down-30">
                                <div class="col-md-6">
                                       
                                    
                                </div>
                                <div class="col-md-6">
                                    <a id="verify" class="btn btn-info btn-block">Verify</a>
                                </div>
                            </div>
                            </form> 
                            
                        </div>
                        
                     <div id="profilechange" class="col-md-6">
                            
                         	

                      </div> 
                            
 </div>	


<script>









var pass= document.getElementById('password');
pass.onclick = function(){

	document.getElementById('emptypass').innerHTML="";
	
}


var verify = document.getElementById('verify');

verify.onclick = function(){
	
var pass= document.getElementById('password').value;

//alert(pass);
if(pass ==''){

	document.getElementById('emptypass').innerHTML ="<span style='color:red; font-style:italic'>Please fill the field...</span>";
		return false;
}else{

 var xmlrobot = new XMLHttpRequest();
 var url="../portal/profileset.php?profile="+pass;
 
if(xmlrobot==null){
		alert("Your browser does not support Ajax");
		return false;
	}


xmlrobot.onreadystatechange = function(){
		if(xmlrobot.readyState==4){
			//document.getElementById('passport');
			document.getElementById("profilechange").innerHTML="";

			var fade = xmlrobot.responseText;
			jNode = $(fade);
			jNode.hide();
			$('#profilechange').append(jNode);
						
			jNode.fadeIn(2000);

		}else{

			document.getElementById("profilechange").innerHTML='<center><img  src="../img/loading.gif"></center>';

		}

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}

}
	

	

</script>